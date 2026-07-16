# ASU Open Server Preview Release Checklist

## Pre-build

- [ ] Run Preflight-ASU-OSP.ps1
- [ ] Verify payload files
- [ ] Generate manifest

## Build

- [ ] Run Build-ASU-Release.ps1
- [ ] Generate ZIP package
- [ ] Generate SHA256 checksum

## Validation

- [ ] Run Test-ASU-Package-Integrity.ps1
- [ ] Verify package-test.json

## Open Server Test

- [ ] Copy ZIP to test machine
- [ ] Extract package
- [ ] Run START-ASU-INSTALL.ps1
- [ ] Execute installation
- [ ] Verify generated report

Release target:

ASU-v0.2.0-openserver-preview
