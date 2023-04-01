<?php

namespace wfm;

abstract class Controller
{
    public $data  = [];
    public $meta = ['title' => '', 'description' => '', 'keywords' => ''];
    public false|string $layout = "";
    public $view = "";
    public object $model;


    public function __construct(public $route = [])
    {

    }

    public function getModel()
    {
        $model = 'app\models\\' . $this->route['admin_prefix'] . $this->route['controller'];
        if(class_exists($model)){
            $this->model = new $model();
        }
    }

    public function getView()
    {
        //проверяем если есть у нас view то отсавляем его
        //если view нет то устанавливаем значение action
        $this->view = $this->view ?: $this->route['action'];
    }

    public function set($data)
    {
        $this->data = $data;
    }

    public function setMeta($title = "", $description = "", $keywords = "")
    {
        $this->meta = [
            'title' => $title, 'description' => $description, 'keywords' => $keywords
        ];
    }

}