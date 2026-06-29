# patchpump

> Self-hosted vulnerability management system for small-to-mid infrastructures.

---

## Overview

Patchpump is a project that aims to provide a framework for implementing a vulnerability management process for organizations or individuals running IT infrastructure with up to 512 assets; larger deployments are outside the current scope of testing.

We designed the system in accordance with the following principles:

- **fully modular infrastructure** - each component can be replaced with a custom-developed alternative, provided it implements the required interface or specification;
- **fully open-source** - all components are developed under terms of OSI-approved licenses;
- **fully free** - no licensing fees; you are responsible for hosting, setup, configuration, and ongoing support of your instance;
- **comprehensive** - every component includes a default, production-ready implementation developed by us.

Our ultimate vision is to evolve patchpump into a system that automates the full lifecycle, including patch management, thereby closing the loop on vulnerability remediation - though this remains a long-term objective.

---

## Components

| Component        | Description                     | Link                                                                                               |
|------------------|---------------------------------|----------------------------------------------------------------------------------------------------|
| `operational-ui` | Operational web interface       | [`github.com/chop1k/patchpump-operational-ui`](https://github.com/chop1k/patchpump-operational-ui) |
| `admin-ui`       | Admin web interface             | [`github.com/chop1k/patchpump-admin-ui`](https://github.com/chop1k/patchpump-admin-ui)             |
| `core`           | Core data processing component  | [`github.com/chop1k/patchpump`](https://github.com/chop1k/patchpump)                               |
| `agent`          | Core data gathering component   | [`github.com/chop1k/patchpump-agent`](https://github.com/chop1k/patchpump-agent)                   |

---

## Core

### Platform Support

| OS                   | Architecture          | Supported         |
|----------------------|-----------------------|-------------------|
| docker:alpine        | x86_64                | yes               |
| docker:debian        | x86_64                | yes               |

---

### Version History

| Version  | Status          | Released   | End of Life |
|----------|-----------------|------------|-------------|
| `v0.0.0` | `latest`        | 2025-03-01 | —           |
| `v0.0.0` | `LTS`           | 2024-09-15 | 2026-09-15  |
| `v0.0.0` | `security-only` | 2024-01-10 | 2025-06-01  |
| `v0.0.0` | `deprecated`    | 2023-06-20 | 2024-06-20  |
| `v0.0.0` | `end-of-life`   | 2023-01-05 | 2024-01-05  |

**Status legend:**
- `latest` — current stable release, actively developed
- `LTS` — long-term support, receives bug and security fixes
- `security-only` — no new features, critical security patches only
- `deprecated` — no longer recommended, migrate away
- `end-of-life` — no support, no updates

---

## Contributing

Read [`CONTRIBUTING.md`](CONTRIBUTING.md) for details about contributing.

---

## License

Licensed under terms of AGPL license. Read [`LICENSE`](LICENSE) for details.