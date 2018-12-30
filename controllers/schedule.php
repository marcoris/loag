<?php

class Schedule extends Controller {
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('schedule/index');
    }
}