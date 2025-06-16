# 1. Running locally

Test PrestaShop installation
is dockered according to the
[official Docs](https://devdocs.prestashop-project.org/8/basics/installation/environments/docker/).

Make sure docker is installed, then use the following commands:

```bash
cd docker
docker compose --file presta-shop.docker-compose.yml up -d --force-recreate

# once
bash ./tools/restore-db.sh

# Presta
# visit: localhost:9461/secure-dashboard 
# use: demo@prestashop.com / lFi4oj3oFdLI

# PHPMyAdmin
# visit: localhost:9385

# to stop
docker compose -f presta-shop.docker-compose.yml down
```

* DB and FS volumes are configured; so the setup is reused between container launches
* DB dump is stored separately and should be restored manually (only once; storing a raw
  MySql volume under GIT is not desired)