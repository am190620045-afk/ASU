# ASU PROJECT STATE

Дата обновления:
2026-07-20

## Репозиторий

GitHub:
am190620045-afk/ASU

Branch:
main

## Выполнено

Завершено сравнение дополнительных веток с main.

Проверены:
- develop;
- ci/v0.2.0-github-actions;
- release/v0.2.0-beta-runtime.2;
- chore/v0.2.0-runtime-hardening;
- feature/open-server-deployment-kit-v0.2.0;
- feature/v0.2.0-beta.

## Подтвержденная архитектура

Runtime:
/public

Deployment Payload:
/open-server/payload

Installer:
open-server/install/Install-ASU-OSP.ps1

Источник Runtime:
/public

## Результаты анализа

Готово к интеграции:

Runtime Hardening:
- public/health.php;
- public/status.php;
- public/metrics.php;
- apache/asu.conf.

Release Validation:
- runtime smoke tests;
- release documentation;
- release gate.

CI:
- PHP validation;
- Composer validation;
- Security checks;
- Nginx validation.

## Open Server Toolkit

Кандидаты:
- ASU-Checksum.ps1;
- ASU-Version.ps1;
- ASU-Diagnostics.ps1 после адаптации.

## Отложено

- новый Installer;
- Migration Engine;
- Rollback Engine;
- feature/v0.2.0-beta прямой merge.

## Следующий этап

Проверка конфликтов:
- VERSION.json;
- Dockerfile;
- .github/workflows/*;
- apache/*;
- open-server/*.
