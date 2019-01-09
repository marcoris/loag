<?php

class User_Model extends Model
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
                roleid,
                `role`
            FROM
                roles
            ORDER BY
                roleid DESC'
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
                categoryid,
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
                absenceid,
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
                lineid,
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
    public function userList()
    {
        return $this->db->select(
            'SELECT
                employeeid,
                personalnumber,
                `name`,
                surname,
                absences.absence AS absence,
                `login`,
                roles.role
            FROM
                employees
                LEFT JOIN absences ON fk_absence = absenceid
                LEFT JOIN roles ON roles.roleid = employees.fk_role'
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
            'name' => $data['name'],
            'surname' => $data['surname'],
            'fk_category' => $data['category'],
            'fk_absence' => $data['absence'],
            'fk_line' => $data['line'],
            'login' => $data['login'],
            'password' => Hash::create($data['password']),
            'fk_role' => $data['role']
        );

        $this->db->insert('employees', $insertArray);
    }

    /**
     * Shows the affected user to edit
     *
     * @param int $id The id of the affected user
     */
    public function userEdit($id)
    {
        return $this->db->select(
            'SELECT
                employeeid,
                personalnumber,
                `name`,
                surname,
                fk_category,
                fk_absence,
                fk_line,
                `login`,
                fk_role,
                roles.role
            FROM
                employees
                LEFT JOIN roles ON (fk_role = roles.roleid)
            WHERE
                employeeid = :id', array(':id' => $id)
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

        $this->db->update('employees', $updateArray, "`employeeid`={$data['employeeid']}");
    }

    /**
     * Deletes the affected user
     *
     * @param int $id The affected user id
     */
    public function delete($id)
    {
        $result = $this->db->select(
            'SELECT
                employees.fk_role,
                roles.role
            FROM
                employees
                LEFT JOIN roles ON (employees.fk_role = roles.roleid)
            WHERE
                employeeid = :id', array(':id' => $id)
        );

        // dont delete the admin or when you ar the disponent your selfe
        if (
            isset($result[0]) && $result[0]['role'] == 'admin' ||
            (isset($result[0]) && $result[0]['role'] == 'disponent' &&
            Session::get('usergroup') == 2)
        )
        return false;

        $this->db->delete('employees', "employeeid = '$id'");
    }
}
