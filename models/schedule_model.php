<?php
/**
 * The Schedule model class
 *
 */
class Schedule_Model extends Model
{
    /**
     * Class constructor
     *
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Shows the list of users
     *
     * @return data The users list
     */
    public function getLine($start)
    {
        return $this->db->select(
            'SELECT
            l.line_name
        FROM
            station AS s
            LEFT JOIN station_to_line AS stl ON (stl.station_id = s.station_id)
            LEFT JOIN line AS l ON (l.line_id = stl.line_id)
        WHERE
            s.station_name = :start',
            array(':start' => $start)
        );
    }
    
    /**
     * Shows the list of users
     *
     * @return data The users list
     */
    public function getStationTimes($start, $end)
    {
        return $this->db->select(
            'SELECT
            l.line_name
        FROM
            station AS s
            LEFT JOIN station_to_line AS stl ON (stl.station_id = s.station_id)
            LEFT JOIN line AS l ON (l.line_id = stl.line_id)
        WHERE
            s.station_name = :start',
            array(':start' => $start)
        );
    }
}
