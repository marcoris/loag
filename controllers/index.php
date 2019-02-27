<?php

class Index extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Call render function for index
     */
    public function index()
    {
        $this->view->render('index/index');
    }

    /**
     * Call render function for error
     */
    public function error()
    {
        $this->view->render('index/error');
    }
}