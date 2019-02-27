<?php

class Contact extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Call the render function for the contact page
     */
    public function index()
    {
        $this->view->render('contact/index');
    }
}