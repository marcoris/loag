<?php

class Employee_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Shows the list of users
     *
     * @return data The users list
     */
    public function roleData()
    {
        return $this->db->select(
            'SELECT
                role_id,
                `role`
            FROM
                roles
            ORDER BY
                role_id DESC'
        );
    }
    
    /**
     * Shows the list of users
     *
     * @return data The users list
     */
    public function categoryData()
    {
        return $this->db->select(
            'SELECT
                category_id,
                category
            FROM
                categories'
        );
    }
    
    /**
     * Shows the list of users
     *
     * @return data The users list
     */
    public function absenceData()
    {
        return $this->db->select(
            'SELECT
                absence_id,
                absence
            FROM
                absences'
        );
    }
    
    /**
     * Shows the list of users
     *
     * @return data The users list
     */
    public function lineData()
    {
        return $this->db->select(
            'SELECT
                line_id,
                `line`
            FROM
                `lines`'
        );
    }

    /**
     * Shows the list of users
     *
     * @return data The users list
     */
    public function employeeList()
    {
        return $this->db->select(
            'SELECT
                employee_id,
                personalnumber,
                firstname,
                lastname,
                absence,
                role,
                login
            FROM
                employee'
        );
    }
    
    /**
     * Creates a user
     *
     * @param array $data The data
     */
    public function create($data)
    {
        $insertArray = array(
            'personalnumber' => $data['personalnumber'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'category' => $data['category'],
            'absence' => $data['absence'],
            'login' => $data['login'],
            'password' => Hash::create($data['password']),
            'role' => $data['role']
        );

        $this->db->insert('employee', $insertArray);
    }

    /**
     * Shows the affected user to edit
     *
     * @param int $id The _id of the affected user
     */
    public function employeeEdit($id)
    {
        return $this->db->select(
            'SELECT
                employee_id,
                personalnumber,
                firstname,
                lastname,
                category,
                absence,
                login,
                role
            FROM
                employee
            WHERE
                employee_id = :_id', array(':_id' => $id)
        );
    }

    /**
     * Saves the edited user data
     *
     * @param array $data The data
     */
    public function editSave($data)
    {
        $updateArray = array(
            'personalnumber' => $data['personalnumber'],
            'name' => $data['name'],
            'surname' => $data['surname'],
            'fk_category' => $data['fk_category'],
            'fk_absence' => $data['fk_absence'],
            'fk_line' => $data['fk_line'],
            'login' => $data['login'],
            'password' => Hash::create($data['password']),
            'fk_role' => $data['fk_role']
        );

        $this->db->update('employees', $updateArray, "`employee_id`={$data['employee_id']}");
    }

    /**
     * Deletes the affected user
     *
     * @param int $id The affected user _id
     */
    public function delete($id)
    {
        $result = $this->db->select(
            'SELECT
                role
            FROM
                employee
            WHERE
                employee_id = :_id', array(':_id' => $id)
        );

        // dont delete the admin or when you ar the disponent your selfe
        if (
            isset($result[0]) && $result[0]['role'] == 1 ||
            (isset($result[0]) && $result[0]['role'] == 2 &&
            Session::get('usergroup') == 2)
        )
        return false;

        $this->db->delete('employee', "employee_id = '$id'");
    }
}
