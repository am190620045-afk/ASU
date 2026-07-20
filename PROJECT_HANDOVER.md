# ASU PROJECT HANDOVER

Продолжать разработку ASU.

НЕ НАЧИНАТЬ АНАЛИЗ ПРОЕКТА ЗАНОВО.

Использовать:
- PROJECT_MEMORY.md;
- PROJECT_STATE.md;
- PROJECT_HANDOVER.md;
- _ASU_ANALYSIS_EXPORT/.

## Репозиторий

am190620045-afk/ASU

Ветка:
main

## Текущее состояние

Завершен анализ дополнительных веток относительно main.

Подтверждено:

Runtime:
/public

Deployment Payload:
/open-server/payload

Installer сохраняет Runtime источник /public.

## Следующая задача

Подготовить безопасную интеграцию в main.

Порядок:

1. Runtime Hardening
2. Runtime Release Validation
3. CI Quality Gates
4. Open Server Toolkit helpers
5. Docker и package workflow адаптация

## Конфликтные зоны

Проверить вручную:
- VERSION.json;
- Dockerfile;
- .github/workflows/*;
- apache/*;
- open-server/*.

## Не делать

Не выполнять полный merge всех веток.

Не заменять Installer новой схемой Deployment Kit.

## Если нужны действия пользователя

Указать:
1. папку;
2. полную команду;
3. ожидаемый результат;
4. что вернуть в analysis/reports.
