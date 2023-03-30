<?php

if (PHP_MAJOR_VERSION < 8){
    die('Необходима версия PHP >= 7');
}

//подключили файл конфигурации
require_once dirname(__DIR__) . '/config/init.php';

new \wfm\App();


echo 'hello';


//
//var_dump(\wfm\App::$app->getProperty('pagination'));
