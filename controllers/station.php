<?php

class Station extends Controller
{
    private $path = 'station';

    public function __construct()
    {
        parent::__construct();
        Auth::check();
        if (Session::get('usergroup') > 2) {
            header('location: ' . URL . 'login');
        }

        $this->view->js = array($this->path . '/js/checkValidation.js');
    }

    /**
     * Shows the station index page and lists the station and sets the role in the select box
     *
     */
    public function index()
    {
        $this->view->stationList = $this->model->stationList();
        $this->view->getLines = $this->model->getLines();
        $this->view->render($this->path . '/index');
    }

    /**
     * Shows the create station page
     *
     */
    public function create()
    {
        $data = array();
        $data['station_name'] = $_POST['station_name'];
        $data['station_time'] = $_POST['station_time'];
        $data['station_sequence'] = $_POST['station_sequence'];
        $data['station_to_line'] = $_POST['station_to_line'];
        $data['station_status'] = $_POST['station_status'];

        $this->model->create($data);
        header('location: ' . URL . $this->path);
    }

    /**
     * Shows the edit station page
     *
     * @param int $id The affected station id
     */
    public function edit($id)
    {
        $this->view->station = $this->model->edit($id);
        $this->view->getLines = $this->model->getLines();
        $this->view->render($this->path . '/edit');
        
    }

    /**
     * The edit save function
     *
     * @param int $id The affected station id
     */
    public function editSave($id)
    {
        $data = array();
        $data['station_id'] = $id;
        $data['personalnumber'] = $_POST['personalnumber'];
        $data['firstname'] = $_POST['firstname'];
        $data['lastname'] = $_POST['lastname'];
        $data['category'] = $_POST['category'];
        $data['absence'] = $_POST['absence'];
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];

        $this->model->editSave($data);
        header('location: ' . URL . $this->path);
    }

    /**
     * The station delete call
     *
     * @param int $id The affected station id
     */
    public function delete($id)
    {
        $this->model->delete($id);
        header('location: ' . URL . $this->path);
    }
}