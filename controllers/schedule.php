<?php

class Schedule extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->getLine = $this->model->getLine();
        $this->view->getFirstAndLastStation = $this->model->getFirstAndLastStation();
        $this->view->render('schedule/index');
    }
    
    public function show($id, $reverse = null)
    {
        $this->view->getLine = $this->model->getLine($id);
        $this->view->getFirstAndLastStation = $this->model->getFirstAndLastStation();
        $this->view->getStations = $this->model->getStations($id);
        $this->view->getRoutes = $this->model->getRoutes($id);
        $this->view->reverse = $reverse;
        $this->view->render('schedule/timeboard');
    }
}