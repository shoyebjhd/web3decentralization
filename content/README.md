---
title: 'Content'
description: 'see `LICENSE-content`).'
---

# Content

All learning content is licensed **CC-BY-4.0** (see `LICENSE-content`).
Everything is written for **absolute beginners** â€” plain English, one concept
at a time, jargon always linked to the glossary.

## Structure

```
content/
â”œâ”€â”€ courses/     # Learning paths: each is a folder of ordered lessons
â”œâ”€â”€ glossary/    # One Markdown file per term (cross-linked)
â”œâ”€â”€ guides/      # Longer standalone explainers (how-to guides)
â””â”€â”€ chains/      # Per-chain decentralization audits
```

## Add a glossary term (easiest contribution)

```bash
content/glossary/blockchain.md
```

```markdown
A blockchain is a shared, append-only digital ledger. Instead of one company
holding the record, a network of computers each keeps a copy...

## Why it matters
...plain-English "why it matters" section...
```

## Add a lesson

```bash
content/courses/crypto-fundamentals/01-what-is-a-blockchain.md
```

```markdown
Lesson body â€” one concept, short, with glossary links...
```

## Style guide

- Readability over jargon. Define any unavoidable term via a glossary link.
- 100â€“300 words per glossary term; 200â€“500 words per lesson.
- Neutral, educational tone â€” this is a learning hub, not investment advice.
- Cite the methodology / terminal data where relevant (see `data/`).

