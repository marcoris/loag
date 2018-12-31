<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Here is the login function to log the user in and sets the usergroup
     * and forward the user on the dashboard or login page
     */
    public function login()
    {
        // $this->db->select();
        $stmt = $this->db->prepare(
            'SELECT
                employeeid,
                login,
                roles.role
            FROM
                employees
                LEFT JOIN roles ON employees.roleid = roles.roleid 
            WHERE
                login = :login AND
                password = :password');

        $stmt->execute(array(
            'login' => $_POST['login'],
            'password' => Hash::create($_POST['password'])
        ));

        $data = $stmt->fetch();
        $count = $stmt->rowCount();

        if ($count > 0) {
            // set usergroup
            switch ($data['role']) {
                case 'admin':
                    $usergroup = 3;
                    break;
                case 'disponent':
                    $usergroup = 2;
                    break;
                default:
                    $usergroup = 1;
                    break;
            }
            Session::init();
            Session::set('usergroup', $usergroup);
            Session::set('login', $data['login']);
            Session::set('loggedIn', true);
            header('location: ../dashboard');
        } else {
            header('location: ../login');
        }
    }

    /**
     * Here is the logout function to destroy the session and forward the user to the login page
     */
    public function logout()
    {
        Session::init();
        Session::destroy();
        header('location: ' . URL . 'login');
        exit;
    }
}
