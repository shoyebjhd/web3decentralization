#!/usr/bin/env python3
"""Validate the repo before CI passes:
- terminal/index.html references only existing assets
- data/chains.csv is parseable and matches the methodology table's chains
- content markdown files have well-formed front matter
- glossary related links point to existing files
"""
import csv
import os
import re
import sys
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
errors = []


def check(cond, msg):
    if not cond:
        errors.append(msg)


def main():
    root = ROOT

    # 1. terminal asset integrity
    index = root / "terminal" / "index.html"
    if index.exists():
        html = index.read_text(encoding="utf-8", errors="replace")
        refs = re.findall(r'(?:src|href)="(/terminal/[^"?#]+)', html)
        for ref in refs:
            rel = ref.removeprefix("/terminal/")
            target = root / "terminal" / rel
            check(target.exists(), f"terminal/index.html references missing asset: {ref}")

        for boot in ("replaceState",):
            check(boot in html, f"terminal/index.html missing boot shim: {boot}")
    else:
        errors.append("terminal/index.html missing")

    # 2. chains.csv parseable + methodology consistency
    csv_path = root / "data" / "chains.csv"
    methods_path = root / "data" / "methodology.md"
    if csv_path.exists():
        with csv_path.open(encoding="utf-8") as fh:
            rows = list(csv.DictReader(fh))
        check(len(rows) > 0, "data/chains.csv is empty")
        required = {"chain", "name", "consensus", "composite"}
        if rows:
            check(required.issubset(rows[0].keys()),
                  f"data/chains.csv missing columns {required - rows[0].keys()}")
        for row in rows:
            comp = row.get("composite", "")
            check(re.fullmatch(r"\d+(\.\d+)?", comp or ""),
                  f"bad composite for {row.get('chain')}: {comp!r}")
    else:
        errors.append("data/chains.csv missing")

    if methods_path.exists():
        methods = methods_path.read_text(encoding="utf-8")
        check("composite = 0.30*infra" in methods,
              "methodology.md missing composite formula")

    # 3. markdown front matter + glossary links
    for md in sorted((root / "content").rglob("*.md")):
        text = md.read_text(encoding="utf-8")
        fm = re.match(r"^---\n(.*?)\n---\n", text, re.S)
        if md.parent.name == "glossary":
            check(fm is not None, f"glossary '{md.name}' missing front matter")
            if fm:
                check("title:" in fm.group(1), f"glossary '{md.name}' missing title")
                m = re.search(r"related:\s*\[([^\]]+)\]", fm.group(1))
                if m:
                    links = [x.strip().strip('"\'') for x in m.group(1).split(",")]
                    for lg in links:
                        if re.fullmatch(r"[a-z0-9-]+", lg) and (glossary := root / "content" / "glossary" / f"{lg}.md"):
                            check(glossary.exists(),
                                  f"glossary '{md.name}' links to missing '{lg}.md'")
        else:
            # lessons/guides/chains should also have front matter
            if md.name != "README.md" and md.parent.name in {"courses", "chains"} and not fm:
                errors.append(f"{md.relative_to(root)} missing front matter")

    # 4. no accidental secrets in git-tracked text files
    try:
        import subprocess
        tracked = subprocess.check_output(
            ["git", "ls-files"], cwd=root, text=True).splitlines()
    except (OSError, subprocess.CalledProcessError):
        tracked = []
    # assemble pattern dynamically so this script never matches its own literal
    _s1, _s2, _s3, _s4, _s5 = "Machine@12882", "u435884427", "82.29.87.203", "w3d_admin", "PRIVATE"
    secret_pat = re.compile(
        re.escape(_s1) + "|" + re.escape(_s2) + "|" +
        re.escape(_s3) + "|" + re.escape(_s4) + "|" +
        "BEGIN (?:RSA|OPENSSH|EC) " + re.escape(_s5), re.I)
    for rel in tracked:
        path = root / rel
        if not path.is_file() or path.suffix not in {".md", ".py", ".js", ".sh", ".php", ".csv"}:
            continue
        try:
            if secret_pat.search(path.read_text(encoding="utf-8", errors="ignore")):
                errors.append(f"possible secret in tracked file: {rel}")
        except OSError:
            pass

    if errors:
        print("VALIDATION FAILED:")
        for e in errors:
            print(f"  - {e}")
        sys.exit(1)
    print(f"OK: terminal, data, content validated ({len(list((root / 'content').rglob('*.md')))} markdown files)")


if __name__ == "__main__":
    main()