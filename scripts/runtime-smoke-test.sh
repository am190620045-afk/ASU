#!/usr/bin/env bash

set -e

BASE_URL="${1:-http://localhost:8080}"

ENDPOINTS=(
  "/"
  "/health.php"
  "/status.php"
  "/metrics.php"
  "/modules.php"
  "/dashboard.php"
)

for endpoint in "${ENDPOINTS[@]}"; do
  echo "Checking ${BASE_URL}${endpoint}"
  curl --fail --silent --show-error "${BASE_URL}${endpoint}" > /dev/null
done

echo "ASU runtime smoke test passed"
