<?php
if(php_sapi_name() !== "cli") {
    die("Запуск возможен только в CLI режиме.");
}

require_once "vendor/autoload.php";
require_once "vendor/digitalstars/simplevk/autoload.php";

use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\Dotenv\Exception\PathException;

switch ($argv[1])
{
    case "-run":
        try {
            $dotenv = new Dotenv();
            $dotenv->load(__DIR__ . DIRECTORY_SEPARATOR . '.env');

            $bot = new \Main\Bot();
            $bot->run();
        } catch (PathException $e) {
            die("Ошибка! Для работы необходимо создать .env файл!");
        } catch (Exception $e) {
            die("Ошибка! Что-то пошло не так при запуске бота. Детали:\n" . $e->getTraceAsString());
        }

        break;

    case "-test":
        \DigitalStars\SimpleVK\Diagnostics::run();
        break;

    default:
        die("HELP: Для запуска добавьте аргумент -run. Для тестирования системы аргумент -dev");
}
