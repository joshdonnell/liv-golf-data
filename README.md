<picture>
    <source media="(prefers-color-scheme: dark)" srcset="art/header-dark.png">
    <img alt="Logo for Laravel Starter Kit" src="art/header-light.png">
</picture>

<br/>

<p>
    <a href="https://github.com/joshdonnell/liv-golf-data/actions"><img src="https://github.com/joshdonnell/liv-golf-data/actions/workflows/tests.yml/badge.svg" alt="Build Status"></a>
</p>

A simple Laravel application for showing results from the [LIV golf tour](https://www.livgolf.com/). All results are pulled via from [The Sports DB](https://www.thesportsdb.com). Currently the results are set to run via a overnight command. Future developments could include live scoring, player/team profiles, and enhanced statistics.

I decided to use this API as in my free time you will often find me playing/practicing/watching golf, it's been a long term hobby and I have a real passion for it.

As a starter kit I used my own [Laravel Starter Kit](https://github.com/joshdonnell/laravel-starter-kit-vue) to ensure I had a solid foundation to build upon including tooling such as PHPStan, Rector and ESLint. I have included some elements of my Starter Kit's README to showcase the stack at a glance.

## Tech Stack

**Backend:** PHP 8.4+, Laravel 12, Inertia.js, Spatie Laravel Data

**Frontend:** Vue 3, Nuxt UI, TypeScript

**Type Generation:** Laravel Wayfinder (auto-generated route & action types), Spatie Laravel Data (auto-generated DTO types)

**DX Tooling:** unplugin-auto-import (Nuxt-style auto imports for Vue APIs and composables)

**Code Quality:** PHPStan (level 9), Rector, Pint, ESLint, Prettier, Pest (100% coverage)

## Local Development

> **Requires [PHP 8.4+](https://php.net/releases/), [pnpm](https://pnpm.io/), and a code coverage driver like [Xdebug](https://xdebug.org/docs/install).**

### Installation

```bash
composer create-project joshdonnell/laravel-starter-kit-vue --prefer-dist example-app
cd example-app
```

### Setup

```bash
# Install dependencies and configure the project
composer setup

# Start the development server (Laravel, queue, logs, and Vite)
composer dev
```

### Optional: Browser Testing

If you plan to use Pest's browser testing capabilities:

```bash
pnpm add playwright
pnpx playwright install
```

### Verify Installation

```bash
composer test
```

You should see 100% test coverage and all quality checks passing.

## Available Commands

### LIV Golf Data

- `php artisan app:get-events` — Fetchs the latest evemts from The Sports DB and stores them in the database
- `php artisan app:get-results` — Fetchs the latest results from The Sports DB and stores them in the database

### Development

- `composer dev` — Starts Laravel server, queue worker, log monitoring, and Vite dev server concurrently

### Code Quality

- `composer lint` — Runs Rector (refactoring), Pint (PHP formatting), and Prettier (JS/TS formatting)
- `composer test:lint` — Dry-run mode for CI/CD pipelines

### Testing

- `composer test:type-coverage` — Ensures 100% type coverage with Pest
- `composer test:types` — Runs PHPStan at level 9 (maximum strictness)
- `composer test:unit` — Runs Pest tests with 100% code coverage requirement
- `composer test` — Runs the complete suite (type coverage, unit tests, linting, static analysis)

### Maintenance

- `composer update:requirements` — Updates all PHP and NPM dependencies to latest versions

## Code Style

This project enforces a strict, automated code style across both PHP and JavaScript/TypeScript:

- **PHP:** Laravel Pint for formatting, Rector for automated refactoring and modernisation
- **JS/TS/Vue:** ESLint for linting, Prettier for formatting
- **Types:** 100% type coverage enforced on both PHP (PHPStan level 9) and TypeScript (strict mode)

Run `composer lint` to auto-fix formatting across the entire codebase.

## Code Standards

- **Actions-Oriented Architecture:** Every operation is encapsulated in a single-action class
- **Cruddy by Design:** Standardised CRUD operations for all controllers, actions, and Inertia pages
- **Immutable-First:** Data structures favour immutability to prevent unexpected mutations
- **Fail-Fast:** Errors are caught at compile-time through strict static analysis, not at runtime
- **Strict Laravel Defaults:** Strict models, auto eager loading, immutable dates via [Essentials](https://github.com/nunomaduro/essentials)
- **AI Guidelines:** Integrated AI guidelines to assist in maintaining code quality and consistency

## Testing

The project uses [Pest](https://pestphp.com) with a full testing suite of 150+ tests. The following standards are enforced:

- **100% code coverage** — the test suite will fail if coverage drops below 100%
- **100% type coverage** — every method, property, and parameter must be explicitly typed
- **Static analysis** — PHPStan at level 9 (maximum strictness)

Run the full suite with:

```bash
composer test
```

Or run individual checks:

```bash
composer test:unit            # Unit & feature tests
composer test:types           # PHPStan static analysis
composer test:type-coverage   # Type coverage check
composer test:lint            # Linting dry-run
```
