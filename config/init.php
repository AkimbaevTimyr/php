<?php


//константы для работы нашего приложения

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/wfm');
define("HELPERS", ROOT . '/vendor/wfm/helpers');
define("CACHE", ROOT . '/tmp/cache');
define("LOGS", ROOT . '/tmp/logs');
define("CONFIG", ROOT . '/config');
define("LAYOUT", 'shop');
define("PATH", 'http://shop');
define("ADMIN", "http://shop/admin");
define("NO_IMAGE", "uploads/no_image.jpg");

//подключили автозагрузчик
require_once ROOT . "/vendor/autoload.php";