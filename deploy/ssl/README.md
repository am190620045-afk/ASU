# SSL deployment checklist

Before exposing ASU publicly:

- configure valid TLS certificate
- redirect HTTP to HTTPS
- verify certificate renewal
- keep private keys outside the repository
- test health endpoint through HTTPS

Example checks:

```bash
curl https://example.com/health.php
curl https://example.com/status.php
```
