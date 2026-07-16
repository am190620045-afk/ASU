# ASU Runtime Discovery

Confirmed from project documentation:

## Runtime

- ASU v0.2.0-beta-runtime.2
- PHP runtime platform
- Apache public document root deployment
- Composer production build

## Web endpoints

Expected endpoints:

- /
- /dashboard.php
- /health.php
- /metrics.php
- /modules.php
- /status.php

## Protected directories

The following directories must not be publicly exposed:

- /src
- /config
- /vendor
- /storage

## Open Server target

- Open Server Panel 6.5.1
- Apache
- PHP 8.5
- MySQL 8.4

## Next verification

Confirm filesystem layout and run the Open Server smoke test.
