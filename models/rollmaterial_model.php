<?php

class Rollmaterial_Model extends Model
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
    public function typeData()
    {
        return $this->db->select(
            'SELECT
                type_id,
                `type`
            FROM
                types'
        );
    }
    
    /**
     * Shows the list of users
     *
     * @return data The users list
     */
    public function classData()
    {
        return $this->db->select(
            'SELECT
                class_id,
                class
            FROM
                classes'
        );
    }
    
    /**
     * Shows the list of users
     *
     * @return data The users list
     */
    public function rollmaterialList()
    {
        return $this->db->select(
            'SELECT
                rollmaterial_id,
                `number`,
                types.type AS `type`,
                date_of_commissioning,
                date_of_last_revision,
                date_of_next_revision,
                classes.class AS class,
                seating,
                `availability`
            FROM
                loag.rollmaterials
                LEFT JOIN loag.types ON types.type_id = rollmaterials.fk_type
                LEFT JOIN loag.classes ON classes.class_id = rollmaterials.fk_class'
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
            'number' => $data['number'],
            'type' => $data['type'],
            'date_of_commissioning' => $data['date_of_commissioning'],
            'date_of_last_revision' => $data['date_of_last_revision'],
            'date_of_next_revision' => $data['date_of_next_revision'],
            'class' => $data['class'],
            'seating' => $data['seating'],
            'availability' => $data['availability']
        );

        $this->db->insert('rollmaterials', $insertArray);
    }

    /**
     * Shows the affected user to edit
     *
     * @param int $id The id of the affected user
     */
    public function rollmaterialEdit($id)
    {
        return $this->db->select(
            'SELECT
                rollmaterial_id,
                `number`,
                fk_type,
                date_of_commissioning,
                date_of_last_revision,
                date_of_next_revision,
                fk_class,
                seating,
                `availability`
            FROM
                loag.rollmaterials
            WHERE
                rollmaterial_id = :id', array(':id' => $id)
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
            'number' => $data['number'],
            'type' => $data['type'],
            'date_of_commissioning' => $data['date_of_commissioning'],
            'date_of_last_revision' => $data['date_of_last_revision'],
            'date_of_next_revision' => $data['date_of_next_revision'],
            'class' => $data['class'],
            'seating' => $data['seating'],
            'availability' => $data['availability']
        );

        $this->db->update('rollmaterials', $updateArray, "`rollmaterial_id`={$data['rollmaterial_id']}");
    }

    /**
     * Deletes the affected user
     *
     * @param int $id The affected user id
     */
    public function delete($id)
    {
        $this->db->delete('rollmaterials', "rollmaterial_id = '$id'");
    }
}
