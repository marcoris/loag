<?php

class Employee extends Controller
{
    private $path = 'employee';

    public function __construct()
    {
        parent::__construct();
        Auth::check();
        if (Session::get('usergroup') > 1) {
            header('location: ' . URL . 'login');
        }

        $this->view->js = array($this->path . '/js/checkValidation.js');
    }

    /**
     * Shows the employee index page and lists the employee and sets the role in the select box
     *
     */
    public function index()
    {
        $this->view->employeeList = $this->model->employeeList();
        // $this->view->roleData = $this->model->roleData();
        // $this->view->categoryData = $this->model->categoryData();
        // $this->view->absenceData = $this->model->absenceData();
        // $this->view->lineData = $this->model->lineData();
        $this->view->render($this->path . '/index');
    }

    /**
     * Shows the create employee page
     *
     */
    public function create()
    {
        $data = array();
        $data['personalnumber'] = $_POST['personalnumber'];
        $data['name'] = $_POST['name'];
        $data['surname'] = $_POST['surname'];
        $data['category'] = $_POST['category'];
        $data['absence'] = $_POST['absence'];
        $data['line'] = $_POST['line'];
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];

        $this->model->create($data);
        header('location: ' . URL . $this->path);
    }

    /**
     * Shows the edit employee page
     *
     * @param int $id The affected employee id
     */
    public function edit($id)
    {
        $this->view->employee = $this->model->employeeEdit($id);
        // $this->view->categoryData = $this->model->categoryData();
        // $this->view->absenceData = $this->model->absenceData();
        // $this->view->lineData = $this->model->lineData();
        // $this->view->roleData = $this->model->roleData();
        $this->view->render($this->path . '/edit');
        
    }

    /**
     * The edit save function
     *
     * @param int $id The affected employee id
     */
    public function editSave($id)
    {
        $data = array();
        $data['employeeid'] = $id;
        $data['personalnumber'] = $_POST['personalnumber'];
        $data['name'] = $_POST['name'];
        $data['surname'] = $_POST['surname'];
        $data['fk_category'] = $_POST['category'];
        $data['fk_absence'] = $_POST['absence'];
        $data['fk_line'] = $_POST['line'];
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['fk_role'] = $_POST['role'];

        // @TODO: put your error checking!
        $this->model->editSave($data);
        header('location: ' . URL . $this->path);
    }

    /**
     * The employee delete call
     *
     * @param int $id The affected employee id
     */
    public function delete($id)
    {
        $this->model->delete($id);
        header('location: ' . URL . $this->path);
    }
}