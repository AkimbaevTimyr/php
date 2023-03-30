<?php

namespace wfm;

class App
{
    public static $app;

    //действие при создании класса апп
    public function __construct()
    {
        //получаем строку запроса, и убераем слеши в конце и в начале строки
        $query = trim(urldecode($_SERVER['QUERY_STRING']), '/');

        new ErrorHandler();
        self::$app = Registry::getInstance();
        $this->getParams();

        //передаем в роутер полученную выше строку запроса
        Router::dispatch($query);
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