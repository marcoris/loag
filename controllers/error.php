<?php

class ErrorHandler extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Call the render function to show the error message
     */
    public function index($msg)
    {
        $this->view->message = $msg;
        $this->view->render('error/index');
        exit;
    }
}