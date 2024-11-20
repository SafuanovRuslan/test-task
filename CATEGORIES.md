# API категорий

[Назад](/README.md)

### Получение списка категорий

Для получения списка категорий задач необходимо отправить GET-запрос на адрес:
`/api/categories`.

Ответ `200`:
```json
[
  {
    "id": 1,
    "name": "Баг"
  },
  {
    "id": 2,
    "name": "Фича"
  }
]
```

Неверный метод `405`:
```json
{
  "message": "The DELETE method is not supported for route api/tasks. Supported methods: GET, PUT."
}
```
Ошибка сервера `500`:
```json
{
  "message": "Unknown error. Contact the administrator."
}
```