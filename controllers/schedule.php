<?php

class Schedule extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->render('schedule/index');
    }
}