<?php

class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Call the render function for the login page
     */
    public function index()
    {
        $this->view->render('login/index');
    }

    /**
     * Call the login model function
     */
    public function login()
    {
        $this->model->login();
    }

    /**
     * Call the logout model function
     */
    public function logout()
    {
        $this->model->logout();
    }
}