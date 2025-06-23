# 1. Running locally

Test PrestaShop installation
is dockered according to the
[official Docs](https://devdocs.prestashop-project.org/8/basics/installation/environments/docker/).

Make sure docker is installed, then use the following commands:

```bash
cd docker
docker compose --file presta-shop.docker-compose.yml up -d --force-recreate
# only once
bash ./tools/restore-db.sh

# Presta admin
# visit: localhost:9461/secure-dashboard 
# use: demo@prestashop.com / lFi4oj3oFdLI

# Presta user
# visit: http://localhost:9461/login
# use procaptcha / procaptcha [email is procaptcha@prestashop.com]

# PHPMyAdmin
# visit: localhost:9385

# to modify installation files or execute any prestashop CLI commands:
docker exec -it prestashop /bin/bash

# to stop
docker compose -f presta-shop.docker-compose.yml down
```

* DB and FS volumes are configured; so the setup is reused between container launches
* DB dump is stored separately and should be restored manually (only once; storing a raw
  MySql volume under GIT is not desired)

# 2. Assets management

```bash
cd prosopoprocaptcha/assets
yarn build
```

# 3. Known issues

* Debug mode - there is a [known issue](https://github.com/PrestaShop/PrestaShop/issues/38771) with the debug mode in
  the dockered PrestaShop, so
  the current setup has the `config/defines_custom.inc.php` file underscored - to avoid inclusion
* `prosopoprocaptcha` module doesn't contain neither dash nor underscore
  as [recommended by the Docs](https://devdocs.prestashop-project.org/8/modules/creation/tutorial/)