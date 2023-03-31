<?php

namespace wfm;

class Router
{
    // routes будет содержать все маршруты
    // route будет содержать конкретный маршрут по которому мы перешли
    protected static array $routes = [];
    protected static array $route = [];

    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes(): array
    {
        return self::$routes;
    }

    public static function getRoute(): array
    {
        return self::$route;
    }

    public static function dispatch($url)
    {
        if(self::matchRoute($url))
        {
            echo 'Okey';
        } else {
            echo 'No';
        }
    }
    public static function matchRoute($url): bool
    {
        //в pattern попадает шаблон регулярного выражения
        //в route попадает массив в путям
        //флаг i делет шаблон регистро независемым
        foreach (self::$routes as $pattern => $route)
        {
            if(preg_match("#{$pattern}#", $url, $matches)){
                //получили массив matcher, перебираем его и пути добавляем в массив route
                foreach ($matches as $key => $value){
                    if(is_string($key)) {
                        $route[$key] = $value;
                    }
                }
                //если у нас нет action в запросе то мы добавляем дефолтный action
                if(empty($route['action'])){
                    $route['action'] = 'index';
                }
                if(!isset($route['admin_prefix'])){
                    $route['admin_prefix'] = "";
                }else{
                    $route['admin_prefix'] = '\\';
                }
                $route['controller']  = self::upperCamelCase($route['controller']);
                debug($route);
                return true;
            }
        }
        return false;
    }

    //приводит строку к CamelCase
    protected static function upperCamelCase($name): string
    {
        //new-product => new product
        $name = str_replace('-', ' ', $name);
        //new product => New Product
        $name = ucwords($name);
        //New Product => NewProduct
        $name = str_replace(' ', '', $name);
        return $name;
    }

    //return camelCase
    protected static function lowerCamelCase($name): string
    {
        return lcfirst(self::upperCamelCase($name));
    }
}