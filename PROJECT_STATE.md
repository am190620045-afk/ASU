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
- Install-ASU-OSP.ps1 VERIFY;
- история создания open-server/payload;
- назначение Runtime и Deployment Payload.

## Завершенное расследование

Подтверждено разделение:

Runtime:

/public

Назначение:

- рабочее приложение ASU;
- Runtime Kernel;
- web endpoints.

Deployment Payload:

/open-server/payload

Назначение:

- validation payload;
- preview deployment;
- проверка структуры установки.

## Решение по Installer

Файл:

open-server/install/Install-ASU-OSP.ps1

Оставлен без изменения источника Runtime.

Установка использует:

/public

Payload используется для проверки и не является заменой Runtime.

## Выполненные изменения

Добавлено:

open-server/ARCHITECTURE.md

Назначение:

- документирование Runtime/Payload разделения.

Добавлено:

open-server/install/Test-ASU-Architecture.ps1

Назначение:

- проверка структуры Runtime;
- проверка Payload;
- проверка версий.

Обновлен:

open-server/install/Install-ASU-OSP.ps1

Добавлен запуск архитектурной проверки перед установкой.

## Следующий этап

Проверить:

1. Добавление Open Server раздела в README.md.
2. Проверку release/package процесса.
3. Возможность автоматического запуска архитектурного теста в CI.
