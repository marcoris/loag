<?php

class Dashboard_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUser()
    {
        return $this->db->select(
            'SELECT
                employee_id,
                login
            FROM
                employee'
        );
    }
} 