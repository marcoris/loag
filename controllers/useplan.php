<?php

class Useplan extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Auth::check();
    }

    public function index()
    {
        $this->view->render('useplan/index');
    }

    public function getUseplan()
    {
        $this->model->getUseplan();
    }
}