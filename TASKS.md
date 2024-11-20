# API задач

[Назад](/TASKS.md)

### Получение списка задач

Для получения списка задач необходимо отправить GET-запрос на адрес:
`/api/tasks`.

Ответ `200`:
```json
[
  {
    "id": 1,
    "user_id": 6,
    "title": "test",
    "category_id": 2,
    "description": "",
    "status": 1
  },
  {
    "id": 2,
    "user_id": 6,
    "title": "test",
    "category_id": 2,
    "description": "",
    "status": 1
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

### Получение задачи по id

Для получения задачи необходимо отправить GET-запрос на адрес:
`/api/tasks/<id>`.

Ответ `200`:
```json
{
  "id": 1,
  "user_id": 6,
  "title": "test",
  "category_id": 2,
  "description": "",
  "status": 1
}
```

Задача не найдена `404`:
```json
{
  "message": "Task not found."
}
```
Неверный метод `405`:
```json
{
  "message": "The POST method is not supported for route api/tasks. Supported methods: GET, PUT."
}
```
Ошибка сервера `500`:
```json
{
  "message": "Unknown error. Contact the administrator."
}
```

### Создание задачи

Для создания задачи необходимо отправить POST-запрос на адрес:
`/api/tasks` со следующими параметрами:

1. `user_id` - int (обязательный)
2. `title` - string (обязательный)
3. `category_id` - int (обязательный)
4. `description` - string

Ответ `201`:
```json
{
  "id": 1,
  "user_id": 6,
  "title": "test",
  "category_id": 2,
  "description": "",
  "status": 1
}
```

Неверный метод `405`:
```json
{
  "message": "The PUT method is not supported for route api/tasks. Supported methods: GET, HEAD, POST."
}
```
Ошибка валидации `422`:
```json
{
  "category_id": [
    "The category id field is required."
  ]
}
```
Ошибка сервера `500`:
```json
{
  "message": "Unknown error. Contact the administrator."
}
```

### Обновление задачи

Для обновления задачи необходимо отправить PUT-запрос на адрес:
`/api/tasks/<id>` со следующими параметрами:

1. `user_id` - int
2. `title` - string
3. `category_id` - int
4. `description` - string
5. `status` - int

Ответ `201`:
```json
{
  "id": 1,
  "user_id": 6,
  "title": "test",
  "category_id": 2,
  "description": "",
  "status": 1
}
```

Задача не найдена `404`:
```json
{
  "message": "Task not found."
}
```
Неверный метод `405`:
```json
{
  "message": "The POST method is not supported for route api/tasks. Supported methods: GET, PUT."
}
```
Ошибка валидации `422`:
```json
{
  "category_id": [
    "The category id field must be an integer."
  ]
}
```
Ошибка сервера `500`:
```json
{
  "message": "Unknown error. Contact the administrator."
}
```

### Удаление задачи

Для удаления задачи необходимо отправить DELETE-запрос на адрес:
`/api/tasks/<id>`.

Ответ `200`:
```json
{
  "message": "OK"
}
```

зЗадача не найдена `404`:
```json
{
  "message": "Task not found."
}
```
Неверный метод `405`:
```json
{
  "message": "The POST method is not supported for route api/tasks. Supported methods: GET, PUT."
}
```
Ошибка сервера `500`:
```json
{
  "message": "Unknown error. Contact the administrator."
}
```