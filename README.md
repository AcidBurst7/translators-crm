# Тестовое задание: доработка CRM для переводчиков

## 1. Установка зависимостей

```bash
docker-compose run --rm backend composer install
```

## 2. Инициализация приложения

```bash
docker-compose run --rm backend php /app/init
```

## 3 Запуск приложения

```bash
docker-compose up -d
```

## 5. Применение миграций
```bash
docker-compose run --rm backend yii migrate
```

## 6. Добавление тестовых данных (опционально)

```bash
php yii seed
```

## 7. API

Endpoint: /index.php?r=translator/list&date=YYYY-MM-DD

Пример ответа JSON:

```json
{
    "message": "Список переводчиков готов",
    "data": [
      { "id": 1, "name": "Иван Иванов" }
    ]
}
```

Если переводчиков нет:

```json
{
"message": "Нет свободных переводчиков",
"data": []
}
```

## 8. Доступ в браузере

Frontend: http://127.0.0.1:20080
Backend: http://127.0.0.1:21080



