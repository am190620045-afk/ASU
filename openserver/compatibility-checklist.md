# ASU Runtime Compatibility Checklist

## Target runtime

- Open Server Panel 6.5.1
- Apache
- PHP 8.5
- MySQL 8.4

## PHP support

Minimum supported:

- PHP 8.3+

Primary development:

- PHP 8.5

## Application checks

Before first launch verify:

- composer.json PHP constraint supports PHP 8.3+
- dependencies install successfully on PHP 8.5
- application entry point is configured
- public directory is used as web root
- environment variables are configured

## Server checks

Apache:

- VirtualHost configured
- rewrite enabled
- .env is not publicly accessible

MySQL:

- MySQL 8.4 running
- UTF-8 database created
- PDO MySQL enabled

## Preview acceptance criteria

ASU starts locally through Open Server Panel without runtime errors.
