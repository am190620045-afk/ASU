# ASU

## ASU Web Application Foundation

Automated System Unit (ASU) application platform.

## Overview

ASU is a modular PHP application platform moving from runtime verification and deployment hardening into functional web application development.

Current foundation includes:

- application bootstrap;
- HTTP application flow;
- routing foundation;
- view rendering foundation;
- runtime bridge;
- runtime context;
- middleware pipeline;
- authentication middleware;
- security middleware;
- database foundation;
- runtime diagnostics.

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
- Authentication system foundation
- Session management foundation
- RuntimeContext foundation
- Middleware pipeline foundation
- Runtime context middleware
- Request ID middleware
- Security headers middleware
- Authentication middleware
- Dashboard authorization moved to middleware layer
- Runtime diagnostics endpoint
- Database configuration foundation
- Database connection foundation
- Database diagnostics endpoint

Next development stages:

- Database-backed user authentication
- Administrative panel expansion
- Theme management system
- Module management interface

## Runtime Request Flow

Current HTTP processing pipeline:

```
HTTP Request
    |
    v
WebApplicationRuntime
    |
    v
MiddlewarePipeline
    |
    +--> RequestIdMiddleware
    |
    +--> RuntimeContextMiddleware
    |
    +--> SecurityHeadersMiddleware
    |
    +--> AuthMiddleware
    |
    v
Application Bootstrap
    |
    v
Router
    |
    v
Controller
    |
    v
Response
```

## Runtime Diagnostics

Available diagnostic endpoint:

```
GET /status/runtime
```

Returns:

- runtime status;
- request metadata;
- request identifier;
- active runtime context values.

## Database Foundation

Database layer provides a unified access abstraction:

```
Application
    |
    v
DatabaseInterface
    |
    v
DatabaseConnection
    |
    v
PDO
    |
    v
MySQL
```

Configuration source:

```
config/database.ini.example
```

Database diagnostics endpoint:

```
GET /status/database
```

Returns:

- database connection state;
- availability status;
- connection errors when unavailable.

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
