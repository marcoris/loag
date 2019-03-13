<?php

class Line extends Controller
{
    private $path = 'line';

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
     * Shows the line index page and lists the line and sets the role in the select box
     *
     */
    public function index()
    {
        $this->view->lineList = $this->model->lineList();
        $this->view->render($this->path . '/index');
    }

    /**
     * Shows the create line page
     *
     */
    public function create()
    {
        $data = array();
        $data['line_name'] = $_POST['line_name'];

        $this->model->create($data);
        header('location: ' . URL . $this->path);
    }

    /**
     * Shows the edit line page
     *
     * @param int $id The affected line id
     */
    public function edit($id)
    {
        $this->view->line = $this->model->edit($id);
        $this->view->render($this->path . '/edit');
        
    }

    /**
     * The edit save function
     *
     * @param int $id The affected line id
     */
    public function editSave($id)
    {
        $data = array();
        $data['line_id'] = $id;
        $data['line_name'] = $_POST['line_name'];

        $this->model->editSave($data);
        header('location: ' . URL . $this->path);
    }

    /**
     * The line delete call
     *
     * @param int $id The affected line id
     */
    public function delete($id)
    {
        $this->model->delete($id);
        header('location: ' . URL . $this->path);
    }
}