# ASU Security Architecture

## Current state

Authentication foundation is implemented.

Components:

- PasswordHasher
- Session
- Authenticator
- User credentials support

## Dependency direction

HTTP -> Controller -> Authenticator -> UserRepository -> Database

Security services are prepared for dependency container integration.

## Next steps

- register UserRepository in container
- add login routes
- add authentication middleware
- protect administrative routes
