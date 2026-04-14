# Bluecadet PHPCS CI Tools

A custom [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) report formatter plugin designed for GitHub Actions, rendering code-style violations as rich Markdown tables.

## Supported PHP Versions

- PHP 7.4+
- PHP 8.0+
- PHP 8.1+
- PHP 8.2+
- PHP 8.3+

## Requirements

- **PHP_CodeSniffer 3.x** (`squizlabs/php_codesniffer ^3.0`)
- Composer for installation

## Installation

Install via Composer as a dev dependency:

```bash
composer require --dev bluecadet/bc_composer_ci_tools
```

## Usage

### Report Classes

This package provides three custom PHPCS report classes under `Bluecadet\PHPCS\Report\`:

#### 1. `MarkdownGithub` (Recommended for GitHub Actions)

Formats output specifically for GitHub Actions step summaries using KaTeX math syntax for inline colors. Results render beautifully in the PR checks tab.

```bash
./vendor/bin/phpcs \
  --report=Bluecadet\\PHPCS\\Report\\MarkdownGithub \
  --standard=Drupal \
  --extensions=php,module,inc,install,test,profile,theme,info,txt \
  ./web/modules/custom >> $GITHUB_STEP_SUMMARY
```

**Output includes:**

- Per-file violation tables with color-coded severity levels
- Summary table of error/warning counts across all files
- Total violation count
- Organized details section for easy scanning

#### 2. `Markdown` (Generic Markdown)

Uses inline HTML color spans for generic Markdown renderers that support HTML.

```bash
./vendor/bin/phpcs \
  --report=Bluecadet\\PHPCS\\Report\\Markdown \
  --standard=Drupal \
  ./web/modules/custom
```

#### 3. `MarkdownBase` (Base Class)

Base implementation for custom report extensions. Extend this class to create custom report formats.

```php
use Bluecadet\PHPCS\Report\MarkdownBase;

class CustomReport extends MarkdownBase {
  // Your custom implementation
}
```

### Local Usage (Non-GitHub Actions)

For local code style checking:

```bash
# Drupal standard check
./vendor/bin/phpcs --standard=Drupal ./web/modules/custom

# DrupalPractice standard check
./vendor/bin/phpcs --standard=DrupalPractice ./web/modules/custom

# With Markdown output
./vendor/bin/phpcs \
  --report=Bluecadet\\PHPCS\\Report\\Markdown \
  --standard=Drupal \
  ./web/modules/custom
```

## GitHub Actions Integration

See [`bluecadet/web-gh-actions`](https://github.com/bluecadet/web-gh-actions) for the `ensure-composer-package` action, which manages this package's installation in CI workflows.

Example workflow step:

```yaml
- name: Run PHPCS with Markdown report
  run: |
    ./vendor/bin/phpcs -s \
      --report=Bluecadet\\PHPCS\\Report\\MarkdownGithub \
      --standard=Drupal \
      --extensions=php,module,inc,install,test,profile,theme,info,txt \
      ./web/modules/custom >> $GITHUB_STEP_SUMMARY
```

## Authors

- Pete Inge

## License

GPL-2.0+
