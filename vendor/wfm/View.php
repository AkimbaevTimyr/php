<?php

namespace wfm;

class View
{

    public $content = "";

    public function __construct(
        public $route,
        public $layout = "",
        public $view = "",
        public $meta = []
    )
    {
        //проверяем если мы передали layout то берем его
        //иначе берем базовый layout
        if(false !== $this->layout) {
            $this->layout = $this->layout ?: LAYOUT;
        }
    }

    //функция по рендеру views
    public function render($data)
    {
        if(is_array($data)) {
           extract($data);
        }
        // admin\ => admin/
        $prefix = str_replace('\\', '/', $this->route['admin_prefix']);
        //формируем пусть к файлу
        $view_file = APP . "/views/{$prefix}{$this->route['controller']}/{$this->view}.php";
        if(is_file($view_file)){
            ob_start(); //включаем буфер , все выполненное после этой строки попадет в буфер и не выполняется
            require_once $view_file; //вызываем view
            $this->content = ob_get_clean(); //берем из буфера содержимое , пушим его в content
            //$this->content вызываем в базовом layout
        }else {
            throw new \Exception("Не найден вид {$view_file}", 500);
        }

        //проверяем есть ли layout
        if(false !== $this->layout) {
            //формируем путь к базовому layout
            $layout_file = APP . "/views/layouts/{$this->layout}.php";
            //если такой файл есть
            if(is_file($layout_file)) {
                //вызываем базовый layout
                require_once $layout_file;
            }else {
                throw new \Exception(" Не найден шаблон {$layout_file}",500);
            }
        }
    }
}