<?php

class Schedule_Model extends Model
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
    public function getLine($id = null)
    {
        if ($id) {
            return $this->db->select('SELECT line_id, line FROM loag.lines WHERE line_id = :id', array(':id' => $id));
        } else {
            return $this->db->select('SELECT line_id, line FROM loag.lines WHERE line != "-"');
        }
    }
   
    /**
     * Shows the list of users
     *
     * @return data The users list
     */
    public function getLineId()
    {
        return $this->db->select('SELECT line_id FROM loag.lines WHERE line != "-"');
    }

    /**
     * Shows the list of users
     *
     * @return data The users list
     */
    public function getFirstAndLastStation($id)
    {
        return $this->db->select(
            'SELECT * FROM loag.stations WHERE sequence = 1 AND fk_line = :id OR
            sequence = (SELECT COUNT(sequence) FROM loag.stations WHERE fk_line = :id) AND fk_line = :id', array(':id' => $id));
    }
    
    /**
     * Shows the list of users
     *
     * @return data The users list
     */
    public function getStations($id)
    {
        return $this->db->select('SELECT station_id, station, mainstation, fk_line, sequence FROM loag.stations WHERE fk_line = :id ORDER BY sequence ASC', array(':id' => $id));
    }
    
    /**
     * Shows the list of users
     *
     * @return data The users list
     */
    public function getRoutes($id)
    {
        return $this->db->select('SELECT route_id, time, sequence FROM loag.routes WHERE fk_line = :id ORDER BY sequence ASC', array(':id' => $id));
    }
}
