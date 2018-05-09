<?php

class Controller
{
    //load model
    public static function getModel($model)
    {
        require_once 'app/models/' . $model .'.php';
        return new $model;
    }

    public static function view( $view, $data = array() )
    {
        require_once 'public/views/' . $view . '.php';
    }
}