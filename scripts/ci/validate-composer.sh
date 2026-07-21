#!/usr/bin/env bash
set -euo pipefail

if [ -f composer.json ]; then
  if command -v composer >/dev/null 2>&1; then
    composer validate --no-check-publish
  else
    echo "Composer is not installed"
    exit 1
  fi
else
  echo "composer.json not found, skipping"
fi
