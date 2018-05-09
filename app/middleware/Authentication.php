<?php

class Authentication
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) 
        {
            require_once 'public/views/welcome.php';
            exit;
        }
    }

}