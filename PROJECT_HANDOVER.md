# ASU PROJECT HANDOVER

## Продолжение работы

Продолжаем разработку ASU.

НЕ НАЧИНАТЬ АНАЛИЗ ПРОЕКТА ЗАНОВО.

Использовать:

- PROJECT_MEMORY.md
- PROJECT_STATE.md
- PROJECT_HANDOVER.md

## Репозиторий

am190620045-afk/ASU

Ветка:
main

## Рабочий процесс

GitHub — единственный источник изменений.

Локальная копия:
C:\Project_ASU\ASU

Open Server runtime:
C:\OSPanel\home\asu.local

## Завершенное расследование Runtime / Payload

В проекте существуют два разных слоя:

1. Runtime

/public

Назначение:

- рабочее приложение ASU;
- Runtime execution.

2. Deployment Payload

/open-server/payload

Назначение:

- validation payload;
- preview deployment;
- проверка структуры Open Server.

## Решение по Installer

Файл:

open-server/install/Install-ASU-OSP.ps1

Использует Runtime источник:

/public

Не переносить установку на:

/open-server/payload/public

без отдельного архитектурного решения.

## Добавленные проверки

Добавлен:

open-server/install/Test-ASU-Architecture.ps1

Проверяет:

- Runtime файлы;
- Payload файлы;
- версии Runtime/Payload.

Installer запускает архитектурную проверку перед установкой.

## Текущая архитектура

ASU Repository

Runtime:
/public

Open Server Toolkit:
/open-server/install
/open-server/lib
/open-server/payload

## Следующие задачи

1. Добавить Open Server Architecture раздел в README.md.
2. Проверить release/package workflow.
3. Рассмотреть CI проверку архитектуры.

## Правила взаимодействия

Если нужны действия пользователя:

1. указать папку;
2. дать команду;
3. описать ожидаемый результат;
4. указать нужный вывод.
