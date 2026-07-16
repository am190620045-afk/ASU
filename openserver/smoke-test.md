# ASU Open Server Smoke Test

Target:

- Open Server Panel 6.5.1
- Apache
- PHP 8.5
- MySQL 8.4

## Startup

- [ ] Apache starts
- [ ] MySQL starts
- [ ] ASU local domain resolves

## Runtime

- [ ] Homepage loads
- [ ] health endpoint responds
- [ ] status endpoint responds
- [ ] metrics endpoint responds
- [ ] dashboard endpoint responds

## Security

- [ ] .env is not public
- [ ] internal directories are not exposed
- [ ] Apache document root points to public runtime directory

## Acceptance

ASU runs locally through Open Server without runtime errors.
