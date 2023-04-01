<?php


namespace app\controllers;
use app\models\Main;
use RedBeanPHP\R;
use wfm\Controller;

/** @property Main $model */

class MainController extends Controller
{
    public function indexAction()
    {
        //получаем из бд имена
        $names = $this->model->getNames();
        $this->setMeta('Главная страница', 'Description', 'Keywords');
        $this->set(compact('names'));
    }

    public function cartAction()
    {
        echo 'Cart:Iphone';
    }
}