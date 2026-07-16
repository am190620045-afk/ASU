# ASU Runtime Mapping - Open Server Preview

## Confirmed ASU Runtime

ASU v0.2.0-beta-runtime.2 uses:

- PHP runtime
- Apache public document root deployment
- Composer production build
- Runtime web endpoints

## Open Server Mapping

Document root:

```
ASU/public
```

Internal directories must remain outside direct web access:

```
/src
/config
/vendor
/storage
```

## Web endpoints

Expected runtime endpoints:

```
/
/dashboard.php
/health.php
/metrics.php
/modules.php
/status.php
```

## Compatibility

Supported PHP:

- PHP 8.3+

Recommended Open Server runtime:

- PHP 8.5
- Apache
- MySQL 8.4
