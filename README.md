# Bluecadet Composer CI Tools

A set of Composer-installed tools to help automate code quality checks and reporting for PHP projects, especially in CI/CD environments and local development.

## Features

- **PHPCS Markdown Reporting:** Generates Markdown reports from PHPCS output, ideal for use in GitHub Actions.
- **Git Hook Sync:** Easily install or update git hooks (e.g., `pre-push`, `pre-commit`) to enforce code standards and static analysis before pushing code.
- **Customizable Checks:** Includes support for PHPCS, PHPStan, and Drupal Check out of the box.
- **Composer Integration:** Tools are installed via Composer and run from your project's `vendor/bin` directory.

## Installation

In typical Pantheon Drupal sites this should be included in your upstream.

If you need to manually add, add to your project via Composer:

```bash
composer require --dev bluecadet/bc_composer_ci_tools
```

## Usage

### PHPCS Markdown Report

Run PHPCS with the custom wrapper to generate Markdown output:

```bash
./vendor/bin/bc-run-phpcs --standard=PSR12 src/
```

### Git Hook Sync

Install or update a git hook (defaults to `pre-push`):

```bash
./vendor/bin/bc-githook-sync
```

Or specify a different hook:

```bash
./vendor/bin/bc-githook-sync pre-commit
```

This will copy the appropriate hook file from the package, or append the code checks if the hook already exists.

### Custom Hooks

You can customize the checks by editing the hook files in `vendor/bluecadet/bc_composer_ci_tools/files/`.

## Example Checks

The default hooks run:

- **PHPCS** for code standards
- **PHPStan** for static analysis
- **Drupal Check** for Drupal-specific code validation

## Contributing

Pull requests and issues are welcome! Please open an issue for bugs or feature requests.

## License

MIT

---

*Bluecadet Composer CI Tools is maintained by [Bluecadet](https://www.bluecadet.com/).*
