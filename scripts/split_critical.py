#!/usr/bin/env python3
"""Extract above-the-fold critical CSS blocks from style.css into critical.css."""
import re, sys, os

SRC = os.path.join("themes", "w3d", "style.css")
OUT = os.path.join("themes", "w3d", "assets", "critical.css")

CRITICAL = re.compile(
    r"^(:root|\*|html\s*\{|body|img\s*\{|h\d,|p\s*\{|ul,ol|a\s*\{|::selection|::-webkit-scrollbar|:focus-visible|\.screen-reader-text|\.skip-link|\.w3d-wrap\s*\{|\.w3d-container|\.align|\.w3d-header|\.w3d-site-branding|\.w3d-nav|\.w3d-burger|\.w3d-masthead|\.w3d-main|\.w3d-single-hero|\.w3d-hero-inner|\.w3d-sec-label|\.w3d-post-title|\.w3d-crumbs|\.w3d-single-body|\.w3d-single-|\.w3d-content|\.w3d-post-body|\.w3d-ring|\.w3d-toc|\.w3d-aside|\.w3d-grid|\.w3d-card|\.w3d-badge|\.w3d-btn|\.w3d-lede|\.w3d-pagination|\.chain-title|\.chain-logo|\.chain-ticker|\.chain-name|\.chain-total|\.chain-pillar|\.chain-dash|\.w3d-foot|\.w3d-terminal|\.w3d-tool-|\.w3d-term-|\.w3d-sidebar|\.w3d-arch|\.w3d-rel|\.w3d-cta|\.w3d-table-wrap|table\s*\{|td|th|\.w3d-why-pill|\.w3d-deploy)",
    re.M | re.I,
)

def blocks(lines):
    depth = 0
    cur = None
    for ln in lines:
        stripped = ln.strip()
        if cur is None:
            if not stripped or stripped.startswith("/*") or stripped.startswith("*"):
                continue
            cur = []
        cur.append(ln)
        depth += stripped.count("{") - stripped.count("}")
        if depth <= 0:
            yield "".join(cur)
            cur = None
            depth = 0

def is_media(b):
    first = b.lstrip().split("\n", 1)[0]
    return first.lstrip().startswith("@media")

def select(b):
    lines = [l.strip() for l in b.split("\n") if l.strip() and not l.strip().startswith("/*") and not l.strip().startswith("*")]
    first = lines[0] if lines else ""
    if first.startswith("@media"):
        return CRITICAL.search(b) is not None
    return CRITICAL.match(first) is not None

with open(SRC, "r", encoding="utf-8") as f:
    text = f.read()

out = []
header = "/* W3D critical (above-the-fold) subset auto-extracted from style.css */\n"
for b in blocks(text.splitlines(keepends=True)):
    if select(b):
        out.append(b)

final = header + "\n" + "\n".join(out)
with open(OUT, "w", encoding="utf-8") as f:
    f.write(final)

print(f"critical.css: {len(final.encode())} bytes, {len(out)} blocks")
print(f"style.css:    {len(text.encode())} bytes")
print(f"ratio:        {len(final.encode())/len(text.encode())*100:.1f}%")