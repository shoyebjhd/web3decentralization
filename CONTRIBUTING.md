# Contributing to Web3Decentralization

Thanks for helping build the open-source Web3 learning hub! No crypto
experience is required — if you can write a clear explanation, you can
contribute.

## Ways to contribute

1. **Write a lesson or glossary term** (easiest) — see `content/README.md`.
2. **Add/improve a chain audit** — see `data/README.md`.
3. **Contribute to the terminal app** — issues labeled `good first issue`.
4. **Report bugs / suggest features** — open an issue.
5. **Review others' PRs** — most valuable of all.

## Content contribution (CC-BY-4.0)

All learning content is licensed **CC-BY-4.0**. By submitting a PR with content
changes, you agree to license your contribution under CC-BY-4.0.

### Adding a glossary term

1. Create `content/glossary/<term>.md` (use the lowercase slug, hyphens for
   spaces).
2. Front matter:
   ```markdown
   ---
   title: "Term Name"
   related: [term-one, term-two]
   ---
   ```
3. One clear definition paragraph, then a short "Why it matters" section.
   Keep it plain-English, one concept, 100–300 words.

### Adding a lesson

1. Pick the path under `content/courses/<course-slug>/`.
2. Front matter with `title`, `order`, `quiz` (optional).
3. Short lesson, one concept at a time, link related glossary terms.

## Code contribution (MIT)

- Keep changes focused; one PR = one logical change.
- Run the terminal's lint/tests before submitting.
- Match the existing code style.
- Code is licensed **MIT** — by contributing you agree to MIT.

## Code of conduct

Read [`CODE_OF_CONDUCT.md`](CODE_OF_CONDUCT.md). Be kind, be specific, and
assume good faith.

## Getting help

Open a discussion or an issue and a maintainer will respond.

## Recognition

Contributors are credited in `contributors.md` and may earn badges on the live
site. Thank you for helping make crypto education free and open!
