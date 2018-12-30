<?php

class Useplan extends Controller
{
    function __construct()
    {
        parent::__construct();
        Auth::checkLoggedIn();
    }

    function index()
    {
        $this->view->render('useplan/index');
    }
}