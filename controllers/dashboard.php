<?php

class Dashboard extends Controller
{
    private $path = 'dashboard';

    public function __construct()
    {
        parent::__construct();
        Auth::check();

        // $this->view->js = array('dashboard/js/default.js');
    }

    /**
     * Call the render function for the dashboard
     */
    public function index()
    {
        $this->view->render('dashboard/index');
    }

    /**
     * Call the function to show the use plan
     */

    
    public function editSave($id)
    {
        $data = array();
        $data['employeeid'] = $id;
        $data['password'] = $_POST['password'];

        // @TODO: put your error checking!
        $this->model->editSave($data);
        header('location: ' . URL . $this->path);
    }

    // function xhrInsert()
    // {
    //     $this->model->xhrInsert();
    // }

    // function xhrGetListings()
    // {
    //     $this->model->xhrGetListings();
    // }
    
    // function xhrDeleteListing()
    // {
    //     $this->model->xhrDeleteListing();
    // }
}