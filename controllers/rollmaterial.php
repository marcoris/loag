<?php
/**
 * The Rollmaterial controller class
 *
 */
class Rollmaterial extends Controller
{
    private $path = 'rollmaterial';

    /**
     * Class constructor
     *
     */
    public function __construct()
    {
        parent::__construct();
        Auth::check();
        $usergroup = Session::get('usergroup');

        if ($usergroup > 2) {
            header('location: ' . URL . 'login');
        }

        $this->view->js = array($this->path . '/js/checkValidation.js');
    }

    /**
     * Shows the user index page and lists the user and sets the role in the select box
     *
     */
    public function index()
    {
        $this->view->rollmaterialList = $this->model->rollmaterialList();
        $this->view->render($this->path . '/index');
    }

    /**
     * Shows the create user page
     *
     */
    public function create()
    {
        $data = array();
        $data['number'] = $_POST['number'];
        $data['type'] = $_POST['type'];
        $data['date_of_commissioning'] = $_POST['date_of_commissioning'];
        $data['date_of_last_revision'] = $_POST['date_of_last_revision'];
        $data['date_of_next_revision'] = $_POST['date_of_next_revision'];
        $data['class'] = $_POST['class'];
        $data['seating'] = $_POST['seating'];
        $data['availability'] = $_POST['availability'];

        $this->model->create($data);
        header('location: ' . URL . $this->path);
    }

    /**
     * Shows the edit user page
     *
     * @param int $id The affected user id
     */
    public function edit($id)
    {
        $this->view->rollmaterial = $this->model->edit($id);
        $this->view->render($this->path . '/edit');
        
    }

    /**
     * The edit save function
     *
     * @param int $id The affected user id
     */
    public function editSave($id)
    {
        $data = array();
        $data['rollmaterial_id'] = $id;
        $data['number'] = $_POST['number'];
        $data['type'] = $_POST['type'];
        $data['date_of_commissioning'] = $_POST['date_of_commissioning'];
        $data['date_of_last_revision'] = $_POST['date_of_last_revision'];
        $data['date_of_next_revision'] = $_POST['date_of_next_revision'];
        $data['class'] = $_POST['class'];
        $data['seating'] = $_POST['seating'];
        $data['availability'] = $_POST['availability'];

        // @TODO: put your error checking!
        $this->model->editSave($data);
        header('location: ' . URL . $this->path);
    }

    /**
     * The user delete call
     *
     * @param int $id The affected user id
     */
    public function delete($id)
    {
        $this->model->delete($id);
        header('location: ' . URL . $this->path);
    }
}