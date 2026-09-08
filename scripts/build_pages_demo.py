#!/usr/bin/env python3
"""Build a GitHub Pages demo of the terminal that works from a sub-path.

Problem: the production index.html uses absolute /terminal/... paths, which
404 on GitHub Pages (served at /<repo>/). This copies terminal -> build/ and
rewrites absolute references to relative ones so the demo boots at any path.

Run:  python scripts/build_pages_demo.py [outdir]   (default: build/demo)
"""
import re
import shutil
import sys
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
SRC = ROOT / "terminal"
OUT = ROOT / (sys.argv[1] if len(sys.argv) > 1 else "build/demo")


def main():
    if not SRC.exists():
        sys.exit("terminal/ not found — nothing to build.")
    if OUT.exists():
        shutil.rmtree(OUT)
    shutil.copytree(SRC, OUT)
    for f in OUT.rglob("*"):
        if f.is_file() and f.suffix in {".html", ".css", ".js", ".webmanifest", ".txt"}:
            try:
                text = f.read_text(encoding="utf-8", errors="ignore")
            except OSError:
                continue
            new = text.replace('"/terminal/', '"./').replace("'/terminal/", "'./")
            if new != text:
                f.write_text(new, encoding="utf-8")
    print(f"terms demo built at {OUT.relative_to(ROOT)} ({sum(1 for _ in OUT.rglob('*') if _.is_file())} files)")


if __name__ == "__main__":
    main()