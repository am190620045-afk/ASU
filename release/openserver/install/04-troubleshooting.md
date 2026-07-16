# Step 04 - Troubleshooting

## Apache 500 error

Check Apache and PHP logs in Open Server Panel.

## Database connection error

Verify:

- MySQL is running
- DB_HOST
- DB_PORT
- DB_DATABASE
- DB_USERNAME
- DB_PASSWORD

## Permission issues

Writable runtime directories only:

- storage
- cache
- logs
- uploads

Do not make the entire project writable.
