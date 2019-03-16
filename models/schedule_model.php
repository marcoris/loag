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
     * @param string $start The start station
     * 
     * @return data The users list
     */
    public function getStations($start)
    {
        $station_id = $this->db->select(
            'SELECT
                station_id
            FROM
                station
            WHERE
                station_name = :stationName',
                array(
                    ':stationName' => $start
                )
        );

        if (isset($station_id[0])) {
            $line_id = $this->db->select(
                'SELECT
                    line_id
                FROM
                    station_to_line
                WHERE
                    station_id = :stationID',
                    array(
                        ':stationID' => $station_id[0]['station_id']
                    )
            );
    
            $getStationIDs = $this->db->select(
                'SELECT
                    station_id
                FROM
                    station_to_line
                WHERE
                    line_id = :lineID',
                    array(
                        ':lineID' => $line_id[0]['line_id']
                    )
            );
            $stationIDs = '';
            for ($i=0; $i<count($getStationIDs); $i++)
            {
                $stationIDs .= "station_id = {$getStationIDs[$i]['station_id']} OR ";
            }
    
            $where = substr($stationIDs, 0, -4);
    
            return $this->db->select(
                "SELECT
                    station_id,
                    station_name,
                    station_time,
                    `sequence`,
                    station_status
                FROM
                    station
                WHERE
                    $where"
            );
        } else {
            return false;
        }
    }

    /**
     * Shows the list of users
     *
     * @param string $month The useplan date
     * 
     * @return data The users list
     */
    public function getTrainNr($month, $start)
    {
        $station_id = $this->db->select(
            'SELECT
                station_id
            FROM
                station
            WHERE
                station_name = :stationName',
                array(
                    ':stationName' => $start
                )
        );

        if (isset($station_id[0])) {
            $line_id = $this->db->select(
                'SELECT
                    line_id
                FROM
                    station_to_line
                WHERE
                    station_id = :stationID',
                    array(
                        ':stationID' => $station_id[0]['station_id']
                    )
            );

            return $this->db->select(
                "SELECT
                    useplan_train_nr
                FROM
                    `useplan`
                WHERE
                    useplan_date = $month AND
                    useplan_line_id = " . $line_id[0]['line_id']
            );
        } else {
            return false;
        }
    }

    /**
     * Shows the list of users
     *
     * @param string $start The start station
     * 
     * @return data The users list
     */
    public function getSequence($start)
    {
        return $this->db->select(
            "SELECT
                `sequence`
            FROM
                station
            WHERE
                station_name = '$start'"
        );
    }
}
