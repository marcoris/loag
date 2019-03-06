<?php

class Line extends Controller
{
    private $path = 'line/';
    private $output = '';

    public function __construct()
    {
        parent::__construct();
        Auth::check();
        $this->view->js = array($this->path . 'js/checkValidation.js');
    }

    /**
     * Get the lines and show them on the index page
     */
    public function index()
    {
        $this->view->getLine = $this->model->getLine();
        $this->view->render($this->path . 'index');
    }

    public function createLine($value)
    {
        // create line
        // if there is an empty field dont call the create function in the model
        if (empty($_POST['line'])) {
            header('location: ' . URL . 'index/error');
        } else {
            $this->model->createLine($_POST['line']);

            // send the user to the page
            header('location: ' . URL . $this->path);
        }
    }

    public function saveLine()
    {
        // save line
        echo "toll";
    }

    /**
     * get Line, Stations and Routes to show them in a table on the show page
     * 
     * @param integer $id The affected line to get data and show
     */
    public function station($id)
    {
        // get line, routes and stations
        $this->view->getLine = $this->model->getLine($id);
        $stations = $this->model->getStations($id);
        $routes =  $this->model->getRoutes($id);

        // output the values in table rows
        for ($i=0; $i < count($stations); $i++) {
            $this->output .= "<tr>";
            $this->output .= "<td><input type='text' name='station_". $stations[$i]['station_id'] ."' id='station_". $stations[$i]['station_id'] ."' value='" . $stations[$i]['station'] . "'></td>";
            
            // check if its not the first station time
            if (isset($routes[$i-1]['time'])) {
                $this->output .= "<td><input type='text' name='time_". $routes[$i-1]['route_id'] ."' id='time_". $routes[$i-1]['route_id'] ."' value='" . $routes[$i-1]['time'] . "'> min.</td>";
                $this->output .= "<td><input type='number' min='1' name='sequence_". $stations[$i]['station_id'] ."' id='sequence_". $stations[$i]['station_id'] ."' value='" . $stations[$i]['sequence'] . "'></td>";
                $this->output .= '<td>';
            if ($i+1 != count($stations)) {
                $this->output .= '<a class="btn btn-danger delete" id="delete_' . $stations[$i]['station_id'] . '" href="#"><i class="fas fa-trash"></i></a>';
            } else {
                $this->output .= '</td>';
            }
            } else {
                $this->output .= "<td><input disabled></td><td></td><td></td>";
            }
            $this->output .= '</tr>';
        }

        $this->view->output = $this->output;
        $this->view->render($this->path . 'station');
    }

    public function createStation()
    {
        // if there is an empty field dont call the create function in the model
        if (empty($_POST['station']) || empty($_POST['time'] || empty($_POST['fk_line']))) {
            header('location: ' . URL . 'index/error');
        } else {
            $data = array();
            $data['station'] = $_POST['station'];
            $data['time'] = $_POST['time'];
            $data['fk_line'] = $_POST['fk_line'];
            $data['station_sequence_id'] = $this->model->getStationSequence($data['fk_line'])[0];
            $data['route_sequence_id'] = $this->model->getRouteSequence($data['fk_line'])[0];
            $data['station_sequence'] = $data['station_sequence_id']['sequence'];
            $data['route_sequence'] = $data['route_sequence_id']['sequence'];

            $stationArray = ['sequence' => $data['station_sequence_id']['sequence']+1];
            $routeArray = ['sequence' => $data['route_sequence_id']['sequence']+1];


            // update sequence from existing station
            $this->model->updateSequenceStation($data['station_sequence_id']['station_id'], $stationArray);
            
            // update sequence from existing route
            $this->model->updateSequenceRoute($data['route_sequence_id']['route_id'], $routeArray);
    
            // call create function
            $this->model->create($data);

            // send the user to the page
            header('location: ' . URL . $this->path . 'station/' . $data['fk_line']);
        }
    }

    public function editSave($id) {
        // @TODO: put your error checking!
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

        // $this->model->editSave($stationArray, $timeArray, $mainStation, $id);
        header('location: ' . URL . $this->path . 'station/' . $id);
    }

    public function saveMainstation()
    {
        $this->model->saveMainstation();
        $this->view->render($this->path . 'station');
    }
}