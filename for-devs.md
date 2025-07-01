# 1. Running locally

Test PrestaShop installation
is dockered according to the
[official Docs](https://devdocs.prestashop-project.org/8/basics/installation/environments/docker/).

Make sure docker is installed, then use the following commands:

```bash
# 1. install composer dependencies
cd prosopoprocaptcha
composer install

# 2. run docker image
cd ../docker
docker compose --file prestashop.docker-compose.yml up -d --force-recreate

# 2.1) restore the DB - only once
bash ./tools/restore-db.sh

# 2.2) to modify installation files or execute any prestashop CLI commands:
docker exec -it prestashop /bin/bash

# 2.3) to stop
docker compose -f presta-shop.docker-compose.yml down

# 3. access details:

# Presta admin
# visit: localhost:9461/secure-dashboard 
# use: demo@prestashop.com / lFi4oj3oFdLI

# Presta user
# visit: http://localhost:9461/login
# use procaptcha / procaptcha [email is procaptcha@prestashop.com]

# PHPMyAdmin
# visit: localhost:9385
```

* DB and FS volumes are configured; so the setup is reused between container launches
* DB dump is stored separately and should be restored manually (only once; storing a raw
  MySql volume under GIT is not desired)

# 2. Assets management

```bash
cd prosopoprocaptcha/assets
yarn build
```

# 3. Code quality

## 3.1) PHPStan

```bash 
cd prosopoprocaptcha
composer phpstan
```

## 3.2) CodeSniffer Fixer

(php_codesniffer fixer)

```bash
cd prosopoprocaptcha
composer phpcs
```

# 4. Known issues

* Debug mode - there is a [known issue](https://github.com/PrestaShop/PrestaShop/issues/38771) with the debug mode in
  the dockered PrestaShop, so
  the current setup has the `config/defines_custom.inc.php` file underscored - to avoid inclusion
* `prosopoprocaptcha` module doesn't contain neither dash nor underscore
  as [recommended by the Docs](https://devdocs.prestashop-project.org/8/modules/creation/tutorial/)

# 5. Potential integrations

* admin login
* admin reset password
* newsletter subscription (footer)
* `/guest-tracking`
* product reviews (for guests and/or authorized)
* `/order` (checkout for guests)

# 6. Potential improvements

* translations
* e2e tests
* CI/CD
