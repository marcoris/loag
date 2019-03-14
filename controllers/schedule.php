<?php
/**
 * The schedule controller class
 *
 */
class Schedule extends Controller
{
    private $path = 'schedule';

    /**
     * Class constructor
     *
     */
    public function __construct()
    {
        parent::__construct();

        $this->view->js = array($this->path . '/js/checkValidation.js');
    }

    /**
     * Index
     *
     */
    public function index()
    {
        $this->view->render($this->path . '/index');
    }

    public function showschedule()
    {
        // get line
        $this->view->line = $this->model->getLine($_POST['start_station']);

        $this->view->from = $_POST['start_station'];
        $this->view->to = $_POST['end_station'];

        $stationTimes = $this->model->getStationTimes($_POST['start_station'], $_POST['end_station']);

        // set output with data
        $this->view->output = '<tr>
        <td class="bold text-center">05</td>
        <td><span>30</span><span>45</span></td>
        <td class="bold text-center">05</td>
        <td><span>30</span></td>
    </tr>';

        $this->view->render($this->path . '/timeboard');
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
        $this->view->render($this->path . '/timeboard');
    }
}