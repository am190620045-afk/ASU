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

## Текущее расследование

В проекте есть два слоя:

1. Runtime

/public

2. Deployment Payload

/open-server/payload

## Проблема для проверки

Файл:

open-server/install/Install-ASU-OSP.ps1

Нужно определить, должен ли он использовать:

/public

или:

/open-server/payload/public

## Следующие действия

Сравнить:

- public/index.php
- open-server/payload/public/index.php
- public/health.php
- open-server/payload/public/health.php
- open-server/install/Install-ASU-OSP.ps1

После анализа принять решение по архитектуре установки.

## Правила взаимодействия

Если нужны действия пользователя:

1. указать папку;
2. дать команду;
3. описать ожидаемый результат;
4. указать нужный вывод.
