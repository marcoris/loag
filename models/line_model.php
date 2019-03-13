<?php

class Line_Model extends Model
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
    public function lineList()
    {
        return $this->db->select(
            'SELECT
                line_id,
                line_name
            FROM
                line'
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
            'line_name' => $data['line_name']
        );

        $this->db->insert('line', $insertArray);
    }

    /**
     * Shows the affected user to edit
     *
     * @param int $id The _id of the affected user
     */
    public function lineEdit($id)
    {
        return $this->db->select(
            'SELECT
                line_id,
                line_name
            FROM
                line
            WHERE
                line_id = :_id', array(':_id' => $id)
        );
    }

    /**
     * Saves the edited user data
     *
     * @param array $data The data
     */
    public function editSave($data)
    {
        // update line with password if there is a new set
        $updateArray = array(
            'line_name' => $data['line_name']
        );
        $this->db->update('line', $updateArray, "`line_id`={$data['line_id']}");
    }

    /**
     * Deletes the affected user
     *
     * @param int $id The affected user _id
     */
    public function delete($id)
    {
        // just to prevent the lines 1 - 4 to delete
        if ($id > 5)
        $this->db->delete('line', "line_id = '$id'");
    }
}
