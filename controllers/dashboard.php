<?php

class Dashboard extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // Session::init();
        Auth::check();

        // $this->view->js = array('dashboard/js/default.js');
    }

    public function index()
    {
        $this->view->render('dashboard/index');
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