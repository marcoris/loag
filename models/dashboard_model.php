<?php

class Dashboard_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function editSave($data)
    {
        $updateArray = array(
            'password' => Hash::create($data['password'])
        );

        $this->db->update('employees', $updateArray, "`employeeid`={$data['employeeid']}");
    }

    public function xhrInsert()
    {
        $this->db->insert('data', array('text' => $_POST['text']));

        $data = array('text' => $_POST['text'], 'id' => $this->db->lastInsertId());
        echo json_encode($data);
    }

    public function xhrGetListings()
    {
        echo json_encode($this->db->select(
            'SELECT
                *
            FROM
                `data`
            ORDER BY
                id')
        );
    }

    public function xhrDeleteListing()
    {
        $this->db->delete('data', "id = {$_POST['id']}");
    }
} 