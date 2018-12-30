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
    public function userList()
    {
        return $this->db->select('SELECT userid, login, role FROM users');
    }

    /**
     * Shows the affected user to edit
     *
     * @param int $id The id of the affected user
     */
    public function userEdit($id)
    {
        return $this->db->select('SELECT userid, login, role FROM users WHERE userid = :id', array(':id' => $id));
    }

    /**
     * Creates a user
     *
     * @param array $data The data
     */
    public function create($data)
    {
        $insertArray = array(
            'login' => $data['login'],
            'password' => Hash::create($data['password']),
            'role' => $data['role']
        );

        $this->db->insert('users', $insertArray);
    }

    /**
     * Saves the edited user data
     *
     * @param array $data The data
     */
    public function editSave($data)
    {
        // if the password was not empty set it with the inserted password
        if (!empty($data['password'])) {
            $updateArray = array(
                'login' => $data['login'],
                'password' => Hash::create($data['password']),
                'role' => $data['role']
            );
        } else {
            $updateArray = array(
                'login' => $data['login'],
                'role' => $data['role']
            );
        }

        $this->db->update('users', $updateArray, "`userid`={$data['userid']}");
    }

    /**
     * Deletes the affected user
     *
     * @param int $id The affected user id
     */
    public function delete($id)
    {
        $result = $this->db->select('SELECT role FROM users WHERE userid = :id', array(':id' => $id));

        if (isset($result[0]) && $result[0]['role'] == 'admin')
        return false;

        $this->db->delete('users', "userid = '$id'");
    }
}
