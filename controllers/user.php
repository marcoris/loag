<?php

class User extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Auth::checkLoggedIn();
        $usergroup = Session::get('usergroup');

        if ($usergroup < 2) {
            header('location: ' . URL . 'login');
        }
    }

    /**
     * Shows the user index page
     *
     */
    public function index()
    {
        $this->view->userList = $this->model->userList();
        $this->view->render('user/index');
    }

    /**
     * Shows the create user page
     *
     */
    public function create()
    {
        $data = array();
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];

        // @TODO: put your error checking!
        $this->model->create($data);
        header('location: ' . URL . 'user');
    }

    /**
     * Shows the edit user page
     *
     * @param int $id The affected user id
     */
    public function edit($id)
    {
        $this->view->user = $this->model->userEdit($id);
        $this->view->render('user/edit');
        
    }

    /**
     * The edit save function
     *
     * @param int $id The affected user id
     */
    public function editSave($id)
    {
        $data = array();
        $data['userid'] = $id;
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];

        // @TODO: put your error checking!
        $this->model->editSave($data);
        header('location: ' . URL . 'user');
    }

    /**
     * The user delete call
     *
     * @param int $id The affected user id
     */
    public function delete($id)
    {
        $this->model->delete($id);
        header('location: ' . URL . 'user');
    }
}