# ASU PROJECT STATE

Дата обновления:
2026-07-20

## Репозиторий

GitHub:
am190620045-afk/ASU

Branch:
main

## Рабочий процесс

GitHub — единственный источник изменений.

Локальная копия:
C:\Project_ASU\ASU

Используется только для сборки, запуска и тестирования.

## Выполнено

Проверено:

- доступ GitHub Connector;
- структура проекта;
- Open Server deployment;
- работоспособность asu.local;
- health.php;
- Install-ASU-OSP.ps1 VERIFY.

## Текущее расследование

Проверяется разделение:

Runtime:
/public

Deployment Payload:
/open-server/payload

## Главная задача

Определить корректный источник файлов для Install-ASU-OSP.ps1.

Проверить:

1. public/index.php
2. open-server/payload/public/index.php
3. public/health.php
4. open-server/payload/public/health.php
5. open-server/install/Install-ASU-OSP.ps1

После сравнения принять решение по архитектуре установки.

## Следующий этап

Не изменять установщик до завершения анализа источников файлов.
