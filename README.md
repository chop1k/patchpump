# patchpump

> Self-hosted vulnerability management framework for small-to-mid infrastructures.

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

## Packages

| Package                                                  | Description                                   | Version |
|----------------------------------------------------------|-----------------------------------------------|---------|
| [`packages/ui-operational-plugin`](packages/core-plugin) | Plugin API for operational ui`s plugin system | v0.0.0  |
| [`packages/core-plugin`](packages/core-plugin)           | Plugin API for core`s plugin system           | v0.0.0  |
| [`packages/agent-plugin`](packages/agent-plugin)         | Plugin API for agent`s plugin system          | v0.0.0  |

## Apps

| App              | Description                   | Path                                         |
|------------------|-------------------------------|----------------------------------------------|
| `ui/operational` | Operational web interface     | [`apps/ui/operational`](apps/ui/operational) |
| `ui/admin`       | Admin web interface           | [`apps/ui/admin`](apps/ui/admin)             |
| `core/core`      | Core data aggregation service | [`apps/core/core`](apps/core/core)           |
| `core/agent`     | Core data gathering service   | [`apps/core/agent`](apps/core/agent)         |

> Each package and app has its own `README.md` with specific setup and usage details.

---

## Platform Support

### `ui/operational` — Browser support

| Browser                  | Min. Version | Supported |
|--------------------------|--------------|-----------|
| some-supported-browser   | 112+         | yes       |
| some-unsupported-browser | 11           | no        |

### `ui/admin` — Browser support

| Browser                  | Min. Version | Supported |
|--------------------------|--------------|-----------|
| some-supported-browser   | 112+         | yes       |
| some-unsupported-browser | 11           | no        |

### `core/core` — OS support

| OS                   | Architecture          | Supported         |
|----------------------|-----------------------|-------------------|
| some-supported-os    | x86_64                | yes               |
| some-unsupported-os  | x86_64                | no                |
| some-experimental-os | x86_64                | experimental      |
| some-restricted-os   | x86_64                | yes (docker-only) |


### `core/agent` — OS support

| OS                   | Architecture | Supported         |
|----------------------|--------------|-------------------|
| some-supported-os    | x86_64       | yes               |
| some-unsupported-os  | x86_64       | no                |
| some-experimental-os | x86_64       | experimental      |
| some-restricted-os   | x86_64       | yes (docker-only) |

---

## Version History

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

## Todo

- [ ] Implement some feature blah
- [ ] Implement some feature blah blah
- [ ] Implement some feature blah blah blah

---

## Roadmap

### v0.0.0
- blah blah blah
- blah blah blah blah
- blah blah blah

---

## Contributing

Read [`CONTRIBUTING.md`](CONTRIBUTING.md) for details about contributing.

---

## License

Licensed under terms of MIT license. Read [`LICENSE`](LICENSE) for details.