<?php

class Dashboard extends Controller
{
    private $path = 'dashboard';

    public function __construct()
    {
        parent::__construct();
        Auth::check();
    }

    /**
     * Call the render function for the dashboard
     */
    public function index()
    {
        $this->view->render($this->path . '/index');
    }

    /**
     * Call useplan
     *
     * @param int $id The affected employee id
     * @param int $month The affected month
     */
    public function useplan($employeeID, $month, $created = false)
    {
        // define date and train number
        $date = date($month . "y");

        // check if the useplan exists
        if ($created ||
            $this->model->checkUseplan($employeeID, $date)) {
            // get useplan details
            $this->view->month = $month;
            $this->view->trainNr = $this->model->getTrainNr($date);
            $this->view->line = $this->model->getLine($date);
            if ($_SESSION['category'] == 1) {
                $this->view->locDriver = array($_SESSION['firstname'], $_SESSION['lastname']);
                $this->view->controller = $this->model->getTheEmployees($date);
            } else {
                $this->view->locDriver = $this->model->getTheEmployees($date, true);
                $this->view->controller = array($_SESSION['firstname'], $_SESSION['lastname']);
            }
            $this->view->train = $this->model->getTrain($date, $_SESSION['employee_id']);

            $this->view->render($this->path . '/useplan');
        } else {
            // get lines and set the random line
            $lines = $this->model->getLines();
            $lineID = array_rand($lines);
            $theLineID = $lines[$lineID]['line_id'];
            $trainNr = $date . strtoupper(substr(md5(microtime()), rand(0, 26), 3));

            // insert useplan data
            $this->model->insertUseplan($theLineID, $date, $trainNr);

            // get last inserted id from useplan
            $lastUseplanID = $this->model->getLastUseplanID();
            $theUseplanID = $lastUseplanID[0]['useplan_id'];

            // create useplan to line relation
            $this->model->insertUseplanToLine($theLineID, $theUseplanID);

            // get employees
            $employees = $this->model->getEmployees($_SESSION['employee_id'], $_SESSION['category']);
            $employeeID = array_rand($employees);
            $coworkerID = $employees[$employeeID]['employee_id'];

            // create useplan to employee relations
            $this->model->insertUseplanToEmployee($theUseplanID, $_SESSION['employee_id']);
            $this->model->insertUseplanToEmployee($theUseplanID, $coworkerID);

            // get locomotives and set the random locomotive
            $locomotives = $this->model->getRollmaterials(1);
            $locomotiveID = array_rand($locomotives);
            $theLocomotiveID = $locomotives[$locomotiveID]['rollmaterial_id'];
            $theLocomotiveNumber = $locomotives[$locomotiveID]['number'];

            // set train
            $train = array();

            array_push($train, $theLocomotiveNumber);

            // create useplan to rollmaterial relation
            $this->model->insertUseplanToRollmaterial($theUseplanID, $theLocomotiveID);

            // get waggons and set the random waggons
            if ($theLineID == 3 || $theLineID == 4) {
                // get 2 x 1. class waggons
                $waggons = $this->model->getRollmaterials(2, 1);
                $waggonID = array_rand($waggons, 2);
                $theWaggonID1 = $waggons[0]['rollmaterial_id'];
                $theWaggonID2 = $waggons[1]['rollmaterial_id'];
                // create useplan to rollmaterial relations
                $this->model->insertUseplanToRollmaterial($theUseplanID, $theWaggonID1);
                $this->model->insertUseplanToRollmaterial($theUseplanID, $theWaggonID2);

                $theWaggonNumber1 = $waggons[0]['number'];
                $theWaggonNumber2 = $waggons[1]['number'];
                array_push($train, $theWaggonNumber1, $theWaggonNumber2);

                // get 4 x 2. class waggons
                $waggons = $this->model->getRollmaterials(2, 2);
                $waggonID = array_rand($waggons, 4);
                $theWaggonID1 = $waggons[0]['rollmaterial_id'];
                $theWaggonID2 = $waggons[1]['rollmaterial_id'];
                $theWaggonID3 = $waggons[2]['rollmaterial_id'];
                $theWaggonID4 = $waggons[3]['rollmaterial_id'];
                // create useplan to rollmaterial relations
                $this->model->insertUseplanToRollmaterial($theUseplanID, $theWaggonID1);
                $this->model->insertUseplanToRollmaterial($theUseplanID, $theWaggonID2);
                $this->model->insertUseplanToRollmaterial($theUseplanID, $theWaggonID3);
                $this->model->insertUseplanToRollmaterial($theUseplanID, $theWaggonID4);

                $theWaggonNumber1 = $waggons[0]['number'];
                $theWaggonNumber2 = $waggons[1]['number'];
                $theWaggonNumber3 = $waggons[2]['number'];
                $theWaggonNumber4 = $waggons[3]['number'];
                array_push($train, $theWaggonNumber1, $theWaggonNumber2, $theWaggonNumber3, $theWaggonNumber4);

            } else {
                // get 1 x 1. class waggon
                $waggons = $this->model->getRollmaterials(2, 1);
                $waggonID = array_rand($waggons);
                $theWaggonID = $waggons[0]['rollmaterial_id'];
                // create useplan to rollmaterial relation
                $this->model->insertUseplanToRollmaterial($theUseplanID, $theWaggonID);

                $theWaggonNumber = $waggons[0]['number'];
                array_push($train, $theWaggonNumber);

                // 2 x 2. class waggons
                $waggons = $this->model->getRollmaterials(2, 2);
                $waggonID = array_rand($waggons, 2);
                $theWaggonID1 = $waggons[0]['rollmaterial_id'];
                $theWaggonID2 = $waggons[1]['rollmaterial_id'];
                // create useplan to rollmaterial relations
                $this->model->insertUseplanToRollmaterial($theUseplanID, $theWaggonID1);
                $this->model->insertUseplanToRollmaterial($theUseplanID, $theWaggonID2);

                $theWaggonNumber1 = $waggons[0]['number'];
                $theWaggonNumber2 = $waggons[1]['number'];
                array_push($train, $theWaggonNumber1, $theWaggonNumber2);
            }
            
            // call the newly created useplan
            $this->useplan($employeeID, $month, true);
        }
    }
}