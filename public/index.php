<?php

if (PHP_MAJOR_VERSION < 7){
    die('Необходима версия PHP >= 7');
}

//подключили файл конфигурации
require_once dirname(__DIR__) . '/config/init.php';


echo 123;