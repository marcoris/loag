<?php

class ErrorHandler extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index($msg)
    {
        $this->view->message = $msg;
        $this->view->render('error/index');
        exit;
    }
}