# Запуск

[Назад](/README.md)

1. Создать файл конфигурации `.env` с помощью команды
```
cp .env.example .env
```
Если есть необходимость, значения переменных окружения можно поменять (опционально).

2. Запустить контейнер при помощи команды:
```
docker compose up -d --build
```

3. Перейти в контейнер сервиса пользователей и последовательно запустить указанные команды:
```
docker compose exec user-management-php bash
```
```
composer install
chmod -R 777 storage/
php artisan migrate
exit
```
4. Перейти в контейнер сервиса задач и также выполнить ряд команд:
```
docker compose exec task-management-php bash
```
```
composer install
chmod -R 777 storage/
php artisan migrate --seed
php artisan queue:work
```
Последняя команда запускает обработку события создания пользователя, можно пропустить
и запустить отдельно, когда будет необходимость 