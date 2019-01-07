<?php

class Schedule extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $lines = $this->model->getLineId();
        $firstAndLast = array();
        foreach ($lines as $lineids => $line) {
            $firstAndLast[] = $this->model->getFirstAndLastStation($line['lineid']);
        }
        
        $this->view->getLine = $this->model->getLine();
        $this->view->getFirstAndLastStation = $firstAndLast;
        $this->view->render('schedule/index');
    }
    
    public function show($id, $reverse = null)
    {
        $this->view->getLine = $this->model->getLine($id);
        $this->view->getFirstAndLastStation = $this->model->getFirstAndLastStation($id);
        $stations = $this->model->getStations($id);
        $routes = $this->model->getRoutes($id);
        $output = '';
        $time = 0;

        ($reverse == 'reverse') ? $reverse = true : $reverse = false;
        if ($reverse) {
            $from = $stations[count($stations)-1]['station'];
            $to = $stations[0]['station'];
            $link = "../" . $stations[0]['fk_line'];
        } else {
            $from = isset($stations[0]) ? $stations[0]['station'] : '';
            $to = isset($stations[count($stations)-1]) ? $stations[count($stations)-1]['station'] : '';
            $link = isset($stations[0]) ? $stations[0]['fk_line'] . "/reverse" : '';
        }
        if ($from != '') {
            $fromto = "<div class='schedule-top'>
                <span class='from'>" . $from . '</span>
                <a href="' . $link . '"><i class="fas fa-exchange-alt reverse-trigger text-center"></i></a>
                <span class="to">' . $to . "</span>
            </div>";
        }

        // reverse the stations on reverse value
        if ($reverse) {
            // output the values in table rows
            for ($i=count($routes); $i > 0; $i--) {
                $output .= "<tr>";
                $output .= "<td>";
                $output .= $stations[$i-1]['station'];
                // if time is set add station white ball
                if ($stations[$i-1]['mainstation']) {
                    if (isset($routes[$i-1]['time']) && $stations[$i-1]['sequence'] != count($routes)) {
                        $output .= "<td><span class='table-ball table-ball-mainstation'></span>";
                        $output .= date('H:i', mktime(0, $time += $routes[$i-1]['time']+5));
                    } else {
                        $time += $routes[$i-1]['time']+5;
                        $output .= "<td><span class='table-ball table-ball-mainstation'></span>";
                    }
                    $output .= "</td></tr>";
                } else {
                    if (isset($routes[$i-1]['time']) && $stations[$i-1]['sequence'] != count($routes)) {
                        $output .= "<td><span class='table-ball'></span>";
                        $output .= date('H:i', mktime(0, $time += $routes[$i-1]['time']+2));
                    } else {
                        $time += $routes[$i-1]['time']+2;
                        $output .= "<td><span class='table-ball'></span>";
                    }
                    $output .= "</td></tr>";
                }
            }
        } else {
            // output the values in table rows
            for ($i=0; $i < count($stations); $i++) {
                $output .= "<tr>";
                $output .= "<td>";
                $output .= $stations[$i]['station'];
                // if time is set add station white ball
                if ($stations[$i]['mainstation']) {
                    if (isset($routes[$i]['time']) && $stations[$i]['sequence'] != 1) {
                        $output .= "<td><span class='table-ball table-ball-mainstation'></span>";
                        $output .= date('H:i', mktime(0, $time += $routes[$i]['time']+5));
                    } else {
                        $time += $routes[$i]['time']+5;
                        $output .= "<td><span class='table-ball table-ball-mainstation'></span>";
                    }
                    $output .= "</td></tr>";
                } else {
                    if (isset($routes[$i]['time']) && $stations[$i]['sequence'] != 1) {
                        $output .= "<td><span class='table-ball'></span>";
                        $output .= date('H:i', mktime(0, $time += $routes[$i]['time']+2));
                    } else {
                        $time += $routes[$i]['time']+2;
                        $output .= "<td><span class='table-ball'></span>";
                    }
                    $output .= "</td></tr>";
                }
            }
        }

        $this->view->from = $from;
        $this->view->to = $to;
        $this->view->getStations = $stations;
        $this->view->reverse = $reverse;
        $this->view->fromto = $fromto;
        $this->view->output = $output;
        $this->view->render('schedule/timeboard');
    }
}