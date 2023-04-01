<?php

namespace wfm;

use RedBeanPHP\R;

class Db
{
    use TSingleton;

    private function __construct()
    {
        //импортируем файл с настройками бд
        $db = require_once CONFIG . '/config_db.php';
        //подключаемся к бд
        R::setup($db['dsn'], $db['user'], $db['password']);
        if(!R::testConnection()){
            throw new \Exception('No connection to DB', 500);
        }
        R::freeze(true);
        if(DEBUG) {
            //позволяет собирать sql запросы и смотреть их
            R::debug(true, 3);
        }
    }

}