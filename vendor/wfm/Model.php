<?php

namespace wfm;

abstract class Model
{
    //для автозаполнения модели данными
    public $attributes = [];
    public $errors = [];
    public $rules = [];
    //тут будем указывать какое поле не прошло валидацию
    public $labels = [];

    public function __construct()
    {
        Db::getInstance();
    }

}