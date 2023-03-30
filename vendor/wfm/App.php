<?php

namespace wfm;

class App
{
    public static $app;

    //действие при создании класса апп
    public function __construct()
    {
        self::$app = Registry::getInstance();
        $this->getParams();
    }

    protected function getParams()
    {
        // получаем параметры через константу
        $params = require_once CONFIG . '/params.php';
        if(!empty($params)){
            foreach ($params as $key => $value){
                self::$app->setProperty($key, $value);
            }
        }
    }

}