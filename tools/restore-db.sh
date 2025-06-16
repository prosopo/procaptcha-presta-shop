#!/bin/bash

parentPath=$(
    cd "$(dirname "${BASH_SOURCE[0]}")" || exit
    pwd -P
  )

docker exec -i prestashop-mysql mysql -u root -p"jru5R4393Ffk" prestashop < "$parentPath"/../docker/dumps/prestashop.sql