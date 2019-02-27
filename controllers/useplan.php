<?php

class Useplan extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Auth::check();
    }

    /**
     * Call the render function to show the useplan
     */
    public function index()
    {
        $this->view->render('useplan/index');
    }

    /**
     * Call the use plan model to get the useplan
     */
    public function getUseplan()
    {
        $this->model->getUseplan();
    }
}