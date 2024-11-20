# API пользователей

[Назад](/README.md)

### Получение списка пользователей

Для получения списка пользователей необходимо отправить GET-запрос на адрес:
`/api/users`.

Ответ `200`:
```json
[
  {
    "id": 5,
    "name": "testName",
    "email": "test3@email.com"
  },
  {
    "id": 6,
    "name": "testName",
    "email": "test2@email.com"
  }
]
```

Неверный метод `405`:
```json
{
  "message": "The DELETE method is not supported for route api/users. Supported methods: GET, PUT."
}
```
Ошибка сервера `500`:
```json
{
  "message": "Unknown error. Contact the administrator."
}
```

### Получение пользователя по id

Для получения пользователя необходимо отправить GET-запрос на адрес:
`/api/users/<id>`.

Ответ `200`:
```json
{
  "id": 5,
  "name": "testName",
  "email": "test3@email.com"
}
```

Пользователь не найден `404`:
```json
{
  "message": "User not found."
}
```
Неверный метод `405`:
```json
{
  "message": "The POST method is not supported for route api/users. Supported methods: GET, PUT."
}
```
Ошибка сервера `500`:
```json
{
  "message": "Unknown error. Contact the administrator."
}
```

### Создание пользователя

Для создания пользователя необходимо отправить POST-запрос на адрес:
`/api/users` со следующими параметрами:

1. `name` - string (обязательный)
2. `email` - string (обязательный)

Ответ `201`:
```json
{
    "id": 2,
    "name": "testName",
    "email": "test@email.com"
}
```

Неверный метод `405`:
```json
{
  "message": "The PUT method is not supported for route api/users. Supported methods: GET, HEAD, POST."
}
```
Ошибка валидации `422`:
```json
{
    "email": [
        "The email has already been taken."
    ]
}
```
Ошибка сервера `500`:
```json
{
  "message": "Unknown error. Contact the administrator."
}
```

### Обновление пользователя

Для обновления пользователя необходимо отправить PUT-запрос на адрес:
`/api/users/<id>` со следующим параметром:

1. `name` - string

Ответ `201`:
```json
{
    "name": "testName"
}
```

Пользователь не найден `404`:
```json
{
  "message": "User not found."
}
```
Неверный метод `405`:
```json
{
  "message": "The POST method is not supported for route api/users. Supported methods: GET, PUT."
}
```
Ошибка валидации `422`:
```json
{
    "email": [
        "The email has already been taken."
    ]
}
```
Ошибка сервера `500`:
```json
{
  "message": "Unknown error. Contact the administrator."
}
```

### Удаление пользователя

Для удаления пользователя необходимо отправить DELETE-запрос на адрес:
`/api/users/<id>`.

Ответ `200`:
```json
{
  "message": "OK"
}
```

Пользователь не найден `404`:
```json
{
  "message": "User not found."
}
```
Неверный метод `405`:
```json
{
  "message": "The POST method is not supported for route api/users. Supported methods: GET, PUT."
}
```
Ошибка сервера `500`:
```json
{
  "message": "Unknown error. Contact the administrator."
}
```