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
        $this->view->render('dashboard/index');
    }

    public function useplan($employeeID, $month)
    {
        echo "$employeeID, $month";
    }
}