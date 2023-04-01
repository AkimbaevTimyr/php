<?php

namespace app\models;

use RedBeanPHP\R;
use wfm\Model;

class Main extends Model
{
    public function getNames()
    {
        //берем из базы имена
        return $names = R::findAll('name');
    }
}