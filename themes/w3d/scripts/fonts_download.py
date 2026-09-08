import re, os, urllib.request, sys, json
sys.stdout.reconfigure(encoding='utf8', errors='replace')

OUT = r"C:\Users\NTTC Driving\Desktop\Web3-Decentralization\themes\w3d\assets\fonts"
os.makedirs(OUT, exist_ok=True)

UA = ("Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 "
      "(KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36")
URL = ("https://fonts.googleapis.com/css2?"
       "family=Inter:wght@400;500;600;700&"
       "family=JetBrains+Mono:wght@400;500;700&"
       "family=Space+Grotesk:wght@400;500;600;700&display=swap")

req = urllib.request.Request(URL, headers={"User-Agent": UA})
css = urllib.request.urlopen(req, timeout=60).read().decode("utf8")

# Parse @font-face blocks
blocks = re.findall(r"@font-face\s*{(.*?)}", css, re.S)
seen = {}
for b in blocks:
    fam = re.search(r"font-family:\s*'([^']+)'", b).group(1)
    weight = re.search(r"font-weight:\s*(\d+)", b).group(1)
    style = re.search(r"font-style:\s*(\w+)", b).group(1)
    urange = re.search(r"unicode-range:\s*([^;]+)", b).group(1)
    src = re.search(r"url\((https://[^)]+\.woff2)\)", b).group(1)
    key = (fam, weight, style)
    # prefer latin subset (already filtered by gfonts by subset order); gfonts css2 returns one @font-face per subset range.
    # Keep only latin-range faces to save weight.
    latin = any(sub in urange for sub in ["U+0000-00FF", "U+0000-00FF,", "U+0100-024F"])
    prev = seen.get(key)
    if prev is None and latin:
        seen[key] = src

fname_map = {
    "Inter": "inter",
    "JetBrains Mono": "jetbrains-mono",
    "Space Grotesk": "space-grotesk",
}
manifest = []
for (fam, weight, style), url in sorted(seen.items()):
    slug = fname_map[fam]
    fn = "%s-%s%s.woff2" % (slug, weight, "-i" if style == "italic" else "")
    dest = os.path.join(OUT, fn)
    req = urllib.request.Request(url, headers={"User-Agent": UA})
    data = urllib.request.urlopen(req, timeout=60).read()
    open(dest, "wb").write(data)
    manifest.append({"family": fam, "weight": weight, "style": style, "file": fn, "bytes": len(data)})
    print(f"{fn:28s} {len(data):7d} bytes")

json.dump(manifest, open(os.path.join(OUT, "..", "fonts.json"), "w"), indent=1)
print("DONE", len(manifest), "files")