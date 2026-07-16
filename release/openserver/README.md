# ASU v0.2.0 Open Server Preview

Target:

- Open Server Panel 6.5.1
- Apache
- PHP 8.5
- MySQL 8.4

Package purpose:

Local deployment preview of ASU outside Docker.

Installation order:

1. Copy ASU project into Open Server domains.
2. Configure project domain.
3. Set DocumentRoot to public directory.
4. Configure .env.
5. Create MySQL database.
6. Run composer install.
7. Run runtime checks.

PHP compatibility:

- Minimum PHP: 8.3
- Recommended: PHP 8.5
