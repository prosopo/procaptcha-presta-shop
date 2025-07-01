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
