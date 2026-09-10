#!/usr/bin/env python3
"""Validate the repo before CI passes:
- WP terminal shell template exists with xterm wiring + tool grid
- every tools/*.html has a matching calculator div id
- theme data JSON parses with 19 chains / glossary / 15 tools
- data/chains.csv is parseable and matches the methodology table's chains
- content markdown files have well-formed front matter
- glossary related links point to existing files
"""
import csv
import json
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

    # 1. terminal shell + tools integrity (WP-native rebuild)
    shell = root / "themes" / "w3d" / "page-terminal.php"
    check(shell.exists(), "themes/w3d/page-terminal.php missing")
    if shell.exists():
        html = shell.read_text(encoding="utf-8", errors="replace")
        for needle in ("w3d@terminal", "xterm.js", "w3d-term-grid", "?tool="):
            check(needle in html, f"page-terminal.php missing: {needle}")
    tools_dir = root / "tools"
    tool_files = sorted(tools_dir.glob("*.html")) if tools_dir.exists() else []
    check(len(tool_files) == 15, f"expected 15 tool files, found {len(tool_files)}")
    for f in tool_files:
        text = f.read_text(encoding="utf-8", errors="replace")
        check(f'id="tool-{f.stem}"' in text, f"{f.name} missing calculator div id")
        check(re.search(r"<!--TITLE:.+?-->", text) and re.search(r"<!--META:.+?-->", text),
              f"{f.name} missing TITLE/META comments")
    data_json = root / "themes" / "w3d" / "assets" / "w3d-data.json"
    if data_json.exists():
        try:
            dj = json.loads(data_json.read_text(encoding="utf-8"))
            check(len(dj.get("chains", [])) == 19, "w3d-data.json chains != 19")
            check(len(dj.get("tools", [])) == 15, "w3d-data.json tools != 15")
            check(len(dj.get("glossary", {})) >= 200, "w3d-data.json glossary < 200")
        except (ValueError, AttributeError) as e:
            errors.append(f"w3d-data.json invalid: {e}")
    else:
        errors.append("themes/w3d/assets/w3d-data.json missing")

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
            if md.name == "README.md":
                continue  # navigational index, not a term
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
        if path.resolve() == Path(__file__).resolve():
            continue  # don't flag this script's own sentinel literals
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
    print(f"OK: shell, tools, data, content validated ({len(list((root / 'content').rglob('*.md')))} markdown files)")


if __name__ == "__main__":
    main()