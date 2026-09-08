#!/usr/bin/env python3
"""Submit Web3Decentralization to Awesome lists via fork + PR.

For each target repo:
  1. gh repo fork <repo> --clone      (creates fork + shallow clone into temp)
  2. insert our line under the best-matching README section
  3. commit, push, open PR
"""
import os
import re
import subprocess
import sys
from pathlib import Path

TMP = Path(os.environ.get("TEMP", "/tmp")) / "opencode" / "awesome"
LINE = ("- [Web3Decentralization](https://web3decentralization.com) - "
        "Free, open-source Web3 learning hub (courses, glossary, certificates) "
        "with a live Nakamoto-Coefficient terminal ranking 12 L1 chains; "
        "code MIT, content CC-BY-4.0, data CC0.")

# repo -> keyword groups; first section whose heading matches wins
TARGETS = [
    ("ahmet/awesome-web3", ["Tools", "Learning", "Education", "Links & More", "Resources", "Awesome Web3"]),
    ("openblockchains/awesome-blockchains", ["Applications", "Tools", "Learning", "Resources", "Altcoins", "Blockchain"]),
    ("igorbarinov/awesome-bitcoin", ["Learning", "Education", "Use cases", "Resources", "Documentation", "Blogs", "Websites"]),
    ("bekatom/awesome-ethereum", ["Tools", "Resources", "Learning", "Education", "Projects", "Dapps"]),
]

HEADING_RE = re.compile(r"^#{2,4}\s+(.*?)\s*$", re.M)


def sh(cmd, cwd=None, check=True):
    r = subprocess.run(cmd, cwd=cwd, text=True, capture_output=True, shell=True,
                       encoding="utf-8", errors="replace")
    if r.returncode != 0 and check:
        print(f"  !! failed: {cmd}\n  {r.stdout[-800:]}\n  {r.stderr[-800:]}")
        sys.exit(1)
    return r


def best_section(readme, keywords):
    for m in HEADING_RE.finditer(readme):
        text = m.group(1).strip()
        for kw in keywords:
            if kw.lower() in text.lower():
                return m.group(1).strip(), kw
    return None, None


def main():
    TMP.mkdir(parents=True, exist_ok=True)
    for repo, keywords in TARGETS:
        name = repo.split("/")[1]
        print(f"\n=== {repo} ===")
        fork = TMP / name
        if not fork.exists():
            print("  forking + cloning...")
            sh(["gh", "repo", "fork", repo, "--clone"], cwd=TMP)
        readme_path = fork / "README.md"
        if not readme_path.exists():
            print("  ! no README.md, skipping")
            continue
        readme = readme_path.read_text(encoding="utf-8", errors="replace")
        if "web3decentralization" in readme.lower():
            print("  already listed, skipping")
            continue

        section, kw = best_section(readme, keywords)
        if section:
            # locate heading line start for this section
            head_idx = readme.index(section)
            line_start = readme.rfind("\n", 0, head_idx) + 1
            heading_end = readme.find("\n", line_start) + 1
            insert_at = heading_end
            # skip a blank line after heading
            skip = 0
            while insert_at < len(readme) and readme[insert_at] in "\r\n":
                skip += 1
                insert_at += 1
            new_readme = readme[:heading_end] + LINE + "\n" + readme[heading_end+skip:]
            print(f"  inserted under: '{section}'")
        else:
            print("  no matching section; appending new section")
            new_readme = readme.rstrip() + "\n\n## Web3 Learning\n\n" + LINE + "\n"

        readme_path.write_text(new_readme, encoding="utf-8")
        branch = "add-web3decentralization"
        sh(["git", "checkout", "-B", branch], cwd=fork)
        sh(["git", "add", "README.md"], cwd=fork)
        sh(["git", "-c", "user.name=w3d-bot", "-c", "user.email=web3decentralization@gmail.com",
            "commit", "-m", "Add Web3Decentralization: open-source Web3 learning hub + live decentralization terminal"], cwd=fork)
        r = sh(["git", "push", "-u", "origin", branch], cwd=fork, check=False)
        if r.returncode != 0:
            print("  push failed; trying gh auth-assisted push")
            sh(["gh", "repo", "set-default", repo, "--repo", "shoyebjhd/" + name], cwd=fork, check=False)
            r = sh(["git", "push", "-u", "origin", branch], cwd=fork, check=False)
            if r.returncode != 0:
                print("  push still failing, skipping PR for", repo)
                continue
        pr = sh(["gh", "pr", "create", "--repo", repo,
                 "--head", f"shoyebjhd:{branch}",
                 "--title", "Add Web3Decentralization (open-source Web3 learning hub)",
                 "--body",
                 "Adds the open-source Web3 learning hub [web3decentralization.com](https://web3decentralization.com) "
                 "(courses, glossary, certificates) and its live Nakamoto-Coefficient terminal ranking 12 L1 "
                 "blockchains. Code MIT, learning content CC-BY-4.0, datasets CC0, methodology public. "
                 "Nice addition under a Tools/Learning section."], check=False)
        if pr.returncode == 0:
            print("  PR:", pr.stdout.strip() or pr.stderr.strip())
        else:
            print("  PR create failed:", pr.stderr[-400:])


if __name__ == "__main__":
    main()