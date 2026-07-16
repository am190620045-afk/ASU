# ASU Open Server Preview Build

## Build order

1. Run package builder:

```powershell
.\tools\Build-ASU-OSP-Package.ps1
```

2. Validate package:

```powershell
.\tests\Test-ASU-Package-Integrity.ps1
```

3. Expected artifacts:

```
release/
├── ASU-v0.2.0-openserver-preview.zip
├── ASU-v0.2.0-openserver-preview.zip.sha256
└── package-test.json
```
