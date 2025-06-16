#!/bin/bash

parentPath=$(
    cd "$(dirname "${BASH_SOURCE[0]}")" || exit
    pwd -P
  )

docker exec prestashop-mysql mysqldump -u root -p"jru5R4393Ffk" prestashop > "$parentPath"/../docker/dumps/prestashop.sql