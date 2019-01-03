<?php

class Dashboard extends Controller
{
    private $path = 'dashboard';

    public function __construct()
    {
        parent::__construct();
        // Session::init();
        Auth::check();

        $this->view->js = array('dashboard/js/default.js');
    }

    public function index()
    {
        $this->view->render('dashboard/index');
    }

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