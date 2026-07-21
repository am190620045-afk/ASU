#!/usr/bin/env bash
set -euo pipefail

forbidden_paths=(
  "public"
  "open-server"
  "deploy"
  "Dockerfile"
  "VERSION.json"
)

changed_files=$(git diff --name-only origin/main...HEAD || true)

for path in "${forbidden_paths[@]}"; do
  if echo "$changed_files" | grep -q "^${path}"; then
    echo "Forbidden path changed: ${path}"
    exit 1
  fi
done

echo "Forbidden path check passed"
