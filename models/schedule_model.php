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
            return $this->db->select('SELECT lineid, line FROM loag.lines WHERE lineid = :id', array(':id' => $id));
        } else {
            return $this->db->select('SELECT lineid, line FROM loag.lines WHERE line != "-"');
        }
    }
   
    /**
     * Shows the list of users
     *
     * @return data The users list
     */
    public function getLineId()
    {
        return $this->db->select('SELECT lineid FROM loag.lines WHERE line != "-"');
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
        return $this->db->select('SELECT stationid, station, mainstation, fk_line, sequence FROM loag.stations WHERE fk_line = :id ORDER BY sequence ASC', array(':id' => $id));
    }
    
    /**
     * Shows the list of users
     *
     * @return data The users list
     */
    public function getRoutes($id)
    {
        return $this->db->select('SELECT routeid, time, sequence FROM loag.routes WHERE fk_line = :id ORDER BY sequence ASC', array(':id' => $id));
    }
}
