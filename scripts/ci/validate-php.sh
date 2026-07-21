#!/usr/bin/env bash
set -euo pipefail

if ! command -v php >/dev/null 2>&1; then
  echo "PHP is not installed"
  exit 1
fi

php --version

if find . -name '*.php' -print0 | xargs -0 -r -n1 php -l; then
  echo "PHP validation passed"
else
  exit 1
fi
