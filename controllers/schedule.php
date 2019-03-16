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
        // define some variables
        $start_time = 0;
        $end_time = 0;
        $total = 0;
        $this->view->no_entry = false;
        $startingTime = "5:30";
        $this->view->from = $_POST['start_station'];
        $this->view->to = $_POST['end_station'];
        $month = $_POST['month'] . date("y");
        $trainNr = $this->model->getTrainNr($month, $_POST['start_station']);
        $this->view->trainNr = isset($trainNr[0]['useplan_train_nr']) ? $trainNr[0]['useplan_train_nr'] : 'X';

        // get sequences
        $start_sequence = $this->model->getSequence($_POST['start_station']);
        $end_sequence = $this->model->getSequence($_POST['end_station']);
        // get all stations
        $stations = $this->model->getStations($_POST['start_station']);

        // check if station exists
        if (isset($stations[0])) {
            // check if schedule is normal or reverse
            if ($start_sequence[0]['sequence'] < $end_sequence[0]['sequence']) {
                // normal loop throug all stations for calc end time
                for ($i=0; $i<$end_sequence[0]['sequence']; $i++)
                {
                    if ($stations[$i]['station_name'] == $_POST['start_station'] &&
                        $i == 0)
                        {
                        for ($k=$i; $k<$end_sequence[0]['sequence'] - ($start_sequence[0]['sequence']); $k++) {
                            $end_time += $stations[$k]['station_time'];
                            $total += $stations[$k]['station_time'];
                            if ($k+1 < $end_sequence[0]['sequence'] - ($start_sequence[0]['sequence'])) {
                                $end_time += ($stations[$k]['station_status'] == 2 ? 5 : 2);
                                $total += ($stations[$k]['station_status'] == 2 ? 5 : 2);
                            }
                        }
                    }
                    if ($stations[$i]['station_name'] == $_POST['start_station'] &&
                        $i != 0)
                        {
                        // add start and end time
                        for ($j=0; $j<$i;$j++) {
                            if ($j == 0) {
                                $start_time += $stations[0]['station_time'];
                            } else {
                                $start_time += $stations[$j]['station_time'] + ($stations[$j]['station_status'] == 2 ? 5 : 2);
                            }
                        }
                        $start_time += ($stations[$i]['station_status'] == 2 ? 5 : 2);
                        // add end
                        for ($k=$i; $k<=$end_sequence[0]['sequence'] - ($start_sequence[0]['sequence']); $k++) {
                            $end_time += $stations[$k]['station_time'];
                            $total += $stations[$k]['station_time'];
                            if (($k + 1) <= $end_sequence[0]['sequence'] - ($start_sequence[0]['sequence'])) {
                                $end_time += ($stations[$k+1]['station_status'] == 2 ? 5 : 2);
                                $total += ($stations[$k+1]['station_status'] == 2 ? 5 : 2);
                            }
                        }
                        $end_time += $start_time;
                        $total += $start_time;
                    }
                }
            } else if ($start_sequence[0]['sequence'] > $end_sequence[0]['sequence']) {
                // reverse
            } else {
                $this->view->no_entry = true;
            }

            // time calc
            $endTime = strtotime("+ $end_time minutes", strtotime($startingTime));
            $startTime = strtotime("+ $start_time minutes", strtotime($startingTime));
            $this->view->start_time = date("h:i", $startTime);
            $this->view->end_time = date("h:i", $endTime);
            $this->view->total = $total;

            // between start and end stations
            $countStaions = count($stations);
            $betweenStations = $countStaions - 2;
            $output = '';
            for ($i=0; $i<$countStaions; $i++) {
                if ($stations[0]['station_name'] != $_POST['start_station'] &&
                $stations[$countStaions-1]['station_name'] != $_POST['end_station']) {
                // if ($stations[$i]['station_name'] == $_POST['start_station'] &&
                // $i == 0 &&
                // $stations[$i+1]['station_name'] != $_POST['end_station']) {
                    $output .= '<div class="between-station-container">
                    <span class="start-time">';
                    $calcTime = $stations[$i]['station_time'] + ($stations[$i+1]['station_status'] == 2 ? 5 : 2);
                    $output .= date("h:i", strtotime("+ $calcTime minutes", strtotime($startingTime)));
                    $output .= '</span>
                    <span class="station-name">';
                    $output .= $stations[$i]['station_name'];
                    $output .= '</span>
                    </div>';
                }
                // if ($stations[$i]['station_name'] == $_POST['start_station'] &&
                // $i != 0 &&
                // $stations[$i+1]['station_name'] != $_POST['end_station']) {
                //     $output .= '<div class="between-station-container">
                //     <span class="start-time">';
                //     $calcTime = $stations[$i+1]['station_time'] + ($stations[$i+1]['station_status'] == 2 ? 5 : 2);
                //     $output .= date("h:i", strtotime("+ $calcTime minutes", strtotime($startingTime)));
                //     $output .= '</span>
                //     <span class="station-name">';
                //     $output .= $stations[$i+1]['station_name'];
                //     $output .= '</span>
                //     </div>';
                // }
                // if ($stations[$i]['station_name'] == $_POST['start_station'] &&
                // $i == 0 &&
                // $stations[$i+1]['station_name'] != $_POST['end_station']) {

                // }
            }

            $this->view->output = $output;
            $this->view->stations = $stations;








        } else {
            $this->view->no_entry = true;
        }

        $this->view->render($this->path . '/timeboard');
    }
}