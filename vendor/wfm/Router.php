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
        var_dump($url);
    }

}