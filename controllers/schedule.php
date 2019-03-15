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
        $start_time = 0;
        $end_time = 0;
        $this->view->no_entry = false;

        // get all stations
        $stations = $this->model->getStations($_POST['start_station']);

        // check if station exists
        if (isset($stations[0])) {
            // check if schedule is normal or reverse
            if ($stations[0]['sequence'] < $stations[count($stations)-1]['sequence']) {
                // normal
                for ($i=0; $i<count($stations); $i++)
                {
                    // set starting time
                    if ($stations[$i]['station_name'] == $_POST['start_station'] &&
                        $stations[$i]['station_status'] == 1) {
                        $start_time = 0;
                        break;
                    } else if ($stations[$i]['station_name'] == $_POST['start_station'] &&
                        $stations[$i]['station_name'] == 2) {
                        $start_time += $stations[$i-1]['station_time'] + ($stations[$i]['station_status'] == 2 ? 5 : ($stations[$i]['station_status'] == 1 ? 0 : 2));
                        break;
                    }
                    else {
                        // add waiting time
                        if ($i == 0) {
                            $start_time = 0;
                        } else {
                            $start_time += $stations[$i-1]['station_time'] + ($stations[$i]['station_status'] == 2 ? 5 : ($stations[$i]['station_status'] == 1 ? 0 : 2));
                        }
                    }
                }
            } else {
                // reverse
            }
    
            $this->view->start_time = $start_time;
        } else {
            $this->view->no_entry = true;
        }

        $this->view->render($this->path . '/timeboard');
    }
}