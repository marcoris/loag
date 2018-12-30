<?php

class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->render('login/index');
    }

    public function login()
    {
        $this->model->login();
    }

    public function logout()
    {
       $this->model->logout();
    }
}