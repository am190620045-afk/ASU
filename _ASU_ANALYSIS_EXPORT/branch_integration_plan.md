# ASU Branch Integration Plan

Дата анализа: 2026-07-20

## Цель
Сравнение дополнительных веток с main без изменения архитектуры Runtime/Payload.

## Основной вывод
Полный merge всех веток в main не рекомендуется. Основная линия main уже содержит Runtime/Payload архитектуру и текущий Installer.

## Рекомендуемый порядок интеграции

### Высокий приоритет

1. runtime hardening
- health/status/metrics improvements
- runtime security improvements

2. release preparation
- release documentation
- release gate
- runtime smoke validation

3. CI integration
Перенести после проверки YAML:
- PHP validation
- Composer validation
- Security checks
- Nginx validation

### Open Server preview
Переносить:
- документацию
- compatibility checks
- примеры конфигурации

Не переносить напрямую:
- release payload
- альтернативный Installer

### Deployment Kit
Не выполнять полный merge.
Использовать как источник отдельных модулей:
- checksum
- version handling
- diagnostics

Требуют адаптации:
- migration
- rollback
- release engine

### Feature beta
Не выполнять прямой merge.
Причина:
затрагивает ядро приложения:
- HTTP kernel
- Router
- Module system
- Admin subsystem

## Архитектурное правило
Сохранять разделение:

Runtime:
/public

Deployment Payload:
/open-server/payload

Installer не должен быть переведен на payload.

## Следующий этап
Проверка конкретных файлов перед переносом и подготовка отдельных cherry-pick/PR изменений.