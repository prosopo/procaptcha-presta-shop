#!/bin/bash

parentPath=$(
    cd "$(dirname "${BASH_SOURCE[0]}")" || exit
    pwd -P
  )

cd "$parentPath"/.. || exit

if [ -f "prosopoprocaptcha.zip" ]; then
    rm "prosopoprocaptcha.zip"
fi

7z a prosopoprocaptcha.zip prosopoprocaptcha '-xr!assets' '-xr!tests' '-xr!.*'

# add .htaccess afterwards, as this hidden file should be present in the archive
7z u prosopoprocaptcha.zip prosopoprocaptcha/.htaccess
