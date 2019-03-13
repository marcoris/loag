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
    public function getLine($id = null)
    {
        if ($id) {
            return $this->db->select(
                'SELECT
                    line_id,
                    line_name
                FROM
                    line
                WHERE
                    line_id = :id', array(':id' => $id)
            );
        } else {
            return $this->db->select(
                'SELECT
                    line_id,
                    line_name
                FROM
                    line
                WHERE `line` != "-"'
            );
        }
    }

    /**
     * Shows the list of users
     *
     * @return data The users list
     */
    public function getStations($id)
    {
        return $this->db->select(
            'SELECT
                station_id,
                station,
                fk_line,
                mainstation,
                `sequence`
            FROM
                loag.stations
            WHERE
                fk_line = :id
            ORDER BY
                `sequence` ASC', array(':id' => $id)
        );
    }
    
    /**
     * Shows the list of users
     *
     * @return data The users list
     */
    public function getRoutes($id)
    {
        return $this->db->select(
            'SELECT
                route_id,
                `time`,
                `sequence`
            FROM
                loag.routes
            WHERE
                fk_line = :id
            ORDER BY
                `sequence` ASC', array(':id' => $id)
        );
    }
   
    /**
     * Shows the list of users
     *
     * @return data The users list
     */
    public function getRouteSequence($id)
    {
        return $this->db->select(
            'SELECT
                route_id,
                `sequence`
            FROM
                loag.routes
            WHERE
                fk_line = :id
            ORDER BY
                `sequence` DESC LIMIT 1', array(':id' => $id)
        );
    }
    
    /**
     * Shows the list of users
     *
     * @return data The users list
     */
    public function getStationSequence($id)
    {
        return $this->db->select(
            'SELECT
                station_id,
                `sequence`
            FROM
                loag.stations
            WHERE
                fk_line = :id
            ORDER BY
                `sequence` DESC LIMIT 1', array(':id' => $id)
        );
    }
    
    /**
     * Shows the list of users
     *
     * @return data The users list
     */
    public function updateSequenceStation($id, $data)
    {
        return $this->db->update('stations', $data, "`station_id`={$id}");
    }

    /**
     * Shows the list of users
     *
     * @return data The users list
     */
    public function updateSequenceRoute($id, $data)
    {
        return $this->db->update('routes', $data, "`route_id`={$id}");
    }
    
    /**
     * Creates a user
     *
     * @param array $data The data
     */
    public function createLine($data)
    {
        $insertLine = array(
            'line' => $data
        );
       
        $this->db->insert('lines', $insertLine);
    }
    
    /**
     * Creates a user
     *
     * @param array $data The data
     */
    public function create($data)
    {
        $insertStation = array(
            'station' => $data['station'],
            'sequence' => $data['station_sequence'],
            'fk_line' => $data['fk_line']
        );
        $insertRoute = array(
            'time' => $data['time'],
            'sequence' => $data['route_sequence'],
            'fk_line' => $data['fk_line']
        );

        $this->db->insert('stations', $insertStation);
        $this->db->insert('routes', $insertRoute);
    }

    /**
     * Saves the edited user data
     *
     * @param array $data The data
     */
    public function editSave($stationArray, $timeArray, $mainStation, $id)
    {
        echo "<pre>";
        print_r($stationArray);
        echo "</pre>";
        echo "<pre>";
        print_r($timeArray);
        echo "</pre>";
        echo $mainStation."<br>";
        echo $id;
        die;
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // echo $id;die;
        // $updateArray = array(
            // 'personalnumber' => $data['personalnumber'],
            // 'name' => $data['name'],
            // 'surname' => $data['surname'],
            // 'fk_category' => $data['fk_category'],
            // 'fk_absence' => $data['fk_absence'],
            // 'fk_line' => $data['fk_line'],
            // 'login' => $data['login'],
            // 'password' => Hash::create($data['password']),
            // 'fk_role' => $data['fk_role']
        // );

        // update station names
        $this->db->update('stations', $stationArray, "`fk_line`={$data['fk_line']}");
        // update station mainstation
        $this->db->update('stations', $updateArray, "`fk_line`={$data['fk_line']}");
        $this->db->update('stations', $updateArray, "`fk_line`={$data['fk_line']}");
        // update route times
        $this->db->update('routes', $timeArray, "`fk_line`={$data['fk_line']}");
    }

    public function sortUp($sortPosition, $id)
    {

    }
    
    public function sortDown($sortPosition, $id)
    {

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
        if (isset($result[0]) && $result[0]['role'] == 'admin' || (isset($result[0]) && $result[0]['role'] == 'disponent' && Session::get('usergroup') == 2))
        return false;

        $this->db->delete('employees', "employeeid = '$id'");
    }
}
