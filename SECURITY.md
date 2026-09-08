# Security Policy

## Reporting a vulnerability

Please **do not** open a public issue for security vulnerabilities. Instead,
report privately by opening a
[security advisory](https://github.com/web3decentralization/web3decentralization/security/advisories/new)
or emailing the maintainers via the address on the live site.

You should receive an acknowledgement within 48 hours. We ask that you give us
a reasonable window to fix and release a patch before public disclosure.

## Scope

In scope: the Web3 Decentralization Terminal application, the `w3d` WordPress
theme, and any tooling in this repository.

Out of scope: the hosted WordPress infrastructure itself. If you believe the
hosting infrastructure (server, databases, admin) has a vulnerability, do not
test it — contact the host directly.

## Safe handling of credentials

This repository contains **no secrets**. If you ever see a file that appears to
contain a password, API key, or credential, do not reproduce or commit it —
report it privately so it can be removed and rotated.

## Reporting format

Please include: affected component/version, a description of the issue, steps
to reproduce, and any suggested fix. Proof-of-concept is welcome but never
execute exploits against the live site.
