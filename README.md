# ASU

## ASU Web Application Foundation

Automated System Unit (ASU) application platform.

## Overview

ASU is a modular PHP application platform that is moving from runtime verification and deployment hardening into functional web application development.

The current milestone delivers the first web application foundation:

- application bootstrap;
- HTTP application flow;
- routing foundation;
- view rendering foundation;
- home page runtime entrypoint.

## Current Status

Completed:

- Runtime Kernel foundation
- Module Lifecycle foundation
- Runtime validation and observability layers
- Web Application Runtime Foundation
- Application bootstrap
- View renderer foundation
- Home controller foundation
- Public web entrypoint

Next development stages:

- Database foundation
- User authentication system
- Registration and login
- Session management
- Administrative panel
- Theme management system

## Development Environment

Development:

- PHP 8.5
- Composer

Minimum supported PHP version:

- PHP 8.3+

Testing environment:

- Open Server Panel 6.5.1
- Apache
- MySQL 8.4

## Development Workflow

GitHub repository is the single source of truth.

Local environment is used only for:

- cloning the repository;
- building;
- testing;
- Open Server Panel verification.

Project deployment testing path:

```
C:\OSPanel\home\asu.local
```

## Architecture Direction

The next functional architecture stage:

```
Database
    |
    v
User System
    |
    v
Authentication
    |
    v
Admin Panel
    |
    v
Theme System
```

## Technology Stack

- PHP 8.5 development
- PHP 8.3+ compatibility target
- Apache
- MySQL 8.4
- Composer
- Open Server Panel 6.5.1

## Versioning

Current development milestone:

`ASU Web Application Foundation`

## License

Project license will be defined during the next development stage.
