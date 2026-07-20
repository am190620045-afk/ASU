# ASU Open Server Architecture

## Назначение документа

Документ фиксирует разделение между ASU Runtime и Open Server Deployment Toolkit.

## ASU Runtime

Основной рабочий слой приложения.

Расположение:

```
/public
```

Назначение:

- запуск приложения ASU;
- обработка web-запросов;
- работа Runtime Kernel;
- выполнение health и runtime endpoint.

Связанные каталоги:

```
/src
/config
/vendor
/storage
```

## Open Server Deployment Toolkit

Расположение:

```
/open-server
```

Назначение:

- установка через Open Server;
- проверка окружения;
- управление deployment состоянием;
- создание отчетов и backup.

Структура:

```
open-server/
├── install/
│   └── Install-ASU-OSP.ps1
├── lib/
│   └── ASU-Common.ps1
└── payload/
```

## Deployment Payload

Расположение:

```
/open-server/payload
```

Назначение:

- validation payload;
- preview deployment структуры;
- проверка готовности установки.

Payload не является заменой Runtime public directory.

## Installer behavior

Installer:

1. Проверяет наличие и структуру payload.
2. Выполняет подготовку deployment.
3. Развертывает Runtime слой ASU.

Источник рабочего приложения:

```
/public
```

## Важное правило

Не объединять:

```
/public
```

и

```
/open-server/payload/public
```

Они имеют разные назначения:

- public — Runtime Application;
- payload/public — Deployment Validation Preview.
