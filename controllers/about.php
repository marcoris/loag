<?php

class About extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Call the render function for the about page
     */
    public function index()
    {
        $this->view->render('about/index');
    }

    // public function other($arg = false)
    // {
    //     require 'models/about_model.php';
    //     $model = new Help_Model();
    //     $this->view->blah = $model->blah();
    // }
}