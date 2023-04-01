<?php


namespace app\controllers;
use wfm\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        echo 'This is actionIndex method in MainController';
    }

    public function cartAction()
    {
        echo 'Cart:Iphone';
    }
}