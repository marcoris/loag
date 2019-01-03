<?php

class Line extends Controller
{
    private $path = 'line/';

    public function __construct()
    {
        parent::__construct();
        Auth::check();
        $this->view->js = array('line/js/checkValidation.js');
    }

    /**
     * GEt the lines and show them on the index page
     */
    public function index()
    {
        $this->view->getLine = $this->model->getLine();
        $this->view->render($this->path . 'index');
    }

    /**
     * get Line, Stations and Routes to show them on the show page
     */
    public function show($id)
    {
        $this->view->getLine = $this->model->getLine($id);
        $this->view->getStations = $this->model->getStations($id);
        $this->view->getRoutes = $this->model->getRoutes($id);
        $this->view->render($this->path . 'show');
    }

    public function editSave($id) {
        echo "<pre>";
        // print_r($_POST);die;
        echo "</pre>";
        // loop through all fields
        $stationArray = array();
        $timeArray = array();
        foreach ($_POST as $key => $value) {
            $station = explode('station_', $key);
            $time = explode('time_', $key);
            // $mainstation = explode('mainStation');
            if (isset($station[1])) {
                $stationArray[] = [$station[1] => $value];
            }
            if (isset($time[1])) {
                $timeArray[] = [$time[1] => $value];
            }
            if ($key == 'mainStation') {
                $mainStation = $value;
            }
        }

        // echo "<pre>";
        // print_r($stationArray);
        // echo "</pre>";
        // echo "<pre>";
        // print_r($timeArray);
        // echo "</pre>";
        // echo $mainStation."<br>";
        // echo $id;
        // die;

        // @TODO: put your error checking!
        $this->model->editSave($stationArray, $timeArray, $mainStation, $id);
        header('location: ' . URL . $this->path . 'show/' . $id);
    }

    public function saveMainstation()
    {
        $this->model->saveMainstation();
        $this->view->render($this->path . 'show');
    }
}