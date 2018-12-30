<?php

class Auth
{
    public static function checkLoggedIn()
    {
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false) {
            header('location: ' . URL . 'login');
            exit;
        }

        return true;
    }
}