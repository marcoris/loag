<?php

class Line extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Auth::check();
    }

    /**
     * GEt the lines and show them on the index page
     */
    public function index()
    {
        $this->view->getLine = $this->model->getLine();
        $this->view->render('line/index');
    }

    /**
     * get Line, Stations and Routes to show them on the show page
     */
    public function show($id)
    {
        $this->view->getLine = $this->model->getLine($id);
        $this->view->getStations = $this->model->getStations($id);
        $this->view->getRoutes = $this->model->getRoutes($id);
        $this->view->render('line/show');
    }
}