<?php

namespace wfm;

class Registry
{
    //получаем экземпляр класса TSingleton
    use TSingleton;

    protected static $properies = [];

    public function setProperty($name, $value)
    {
        self::$properies[$name]  = $value;
    }

    public function getProperty($name)
    {
        return self::$properies[$name] ?? null;
    }

    public function getProperties()
    {
        return self::$properies;
    }

}