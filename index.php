<?php

// Общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT . '/source/components/Autoload.php');

//Установка соединения с БД

//Вызов Router
$router = new Router();
$router->run();

// Data Base olredy create check php My admin/