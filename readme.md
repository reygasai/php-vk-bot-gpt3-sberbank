## 1. Требования
- PHP 7.3, запуск происходит в CLI режиме.
- Composer

## 2. Запуск
- Устанавливаем пакеты: composer install
- Генерируем autoload: composer dump-autoload -o
- Создаем файлик .env в корне проекта, пример файла .env.default. Вставляем свой ключ в API_TOKEN
- Запускаем: php index.php -run
