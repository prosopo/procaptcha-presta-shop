## Prosopo Procaptcha Integration for PrestaShop

Welcome to the GitHub repository for
the Prosopo Procaptcha Integration for PrestaShop!

We ensure this repository is kept up-to-date with the latest version. Feel free to open issues or submit pull requests
directly here — any changes made will be included in the next official release.

## 1. Installation

Check **for-devs.md** for details.

## 2. Folders Description

This repository includes both the plugin code, and the workflow tools:

- `.github/workflows` - GitHub Actions: (CI/CD) workflows
- `assets` - TypeScript and Sass source files; [ESLint](https://eslint.org/), [Prettifier](https://prettier.io/)
  and [Vite](https://vitejs.dev/) configs
- `data-for-tests` - files involved in GitHub actions
- `php-tools`
-
    * `code-quality`  - composer packages and configs
      for [PHPStan](https://phpstan.org/), [PHPSniffer](https://github.com/squizlabs/PHP_CodeSniffer)
      and [Pest](https://pestphp.com/)
    * `origin-vendors`  - composer dependencies
    * `scoper` - PHP tool for package scoping (as WP doesn't support composer)
- `prosopo-procaptcha` - plugin source code
- `tests` - end-to-end [Cypress](https://cypress.io) tests
- `tools` - bash scripts, used CI/CD or manually.
- `wordpress-org-assets` - images for the WordPress SVN repository

## 3. Related Resources

* [Prosopo Procaptcha Website](https://prosopo.io/)

## 4. Contribution

We would be excited if you decide to contribute 🤝

Please read the [for-devs.md](https://github.com/prosopo/procaptcha-wordpress-plugin/blob/main/for-devs.md) file for
project guidelines and agreements.