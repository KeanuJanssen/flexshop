<?php

class AuthController extends Controller
{
    public static function login()
    {
        self::view('auth/login', '');
    }
}