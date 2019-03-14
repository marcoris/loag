<?php

class Dashboard_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * check if useplan exists
     *
     * @param int $id The affected employee id
     * @param int $month The affected month
     * 
     * @return bool row count
     */
    public function checkUseplan($employeeID, $date)
    {
        return $this->db->select(
            'SELECT
                ute.useplan_id
            FROM
                useplan AS up
                LEFT JOIN useplan_to_employee AS ute ON (ute.useplan_id = up.useplan_id)
                LEFT JOIN employee AS e ON (e.employee_id = ute.employee_id)
            WHERE
                e.employee_id = :employeeID AND
                up.useplan_date = :date',
            array(
                ':employeeID' => $employeeID,
                ':date' => $date
            )
        );
    }

    /**
     * Get lines
     */
    public function getLines()
    {
        return $this->db->select(
            'SELECT
                line_id
            FROM
                line
            WHERE
                line_id > 1'
        );
    }
    
    /**
     * Insert the line ID
     * 
     * @param int $lineID The affected line id
     * @param int $date The affected date
     * @param int $trainNr The affected train number
     */
    public function insertUseplan($lineID, $date, $trainNr)
    {
        $insertArray = array(
            'useplan_line_id' => $lineID,
            'useplan_date' => $date,
            'useplan_train_nr' => $trainNr
        );

        $this->db->insert('useplan', $insertArray);
    }

    /**
     * Get last inserted useplan id
     */
    public function getLastUseplanID()
    {
        return $this->db->select(
            'SELECT
                useplan_id
            FROM
                useplan
            ORDER BY
                useplan_id DESC
            LIMIT 1'
        );
    }

    /**
     * Insert the line ID
     * 
     * @param int $lineID The affected line id
     * @param int $useplanID The affected useplan id
     */
    public function insertUseplanToLine($lineID, $useplanID)
    {
        $insertArray = array(
            'line_id' => $lineID,
            'useplan_id' => $useplanID
        );

        $this->db->insert('useplan_to_line', $insertArray);
    }

    /**
     * Get lines
     */
    public function getEmployees($employeeID, $category)
    {
        return $this->db->select(
            'SELECT
                employee_id
            FROM
                employee
            WHERE
                employee_id != :employeeID AND
                category != 3 AND
                category != :cat AND
                absence = 1',
            array(
                ':employeeID' => $employeeID,
                ':cat' => $category
            )
        );
    }
    
    /**
     * Insert the useplan to employee relation
     * 
     * @param int $useplanID The affected useplan id
     * @param int $employeeID The affected employee id
     */
    public function insertUseplanToEmployee($useplanID, $employeeID)
    {
        $insertEmployee = array(
            'useplan_id' => $useplanID,
            'employee_id' => $employeeID
        );

        $this->db->insert('useplan_to_employee', $insertEmployee);
    }

    /**
     * Get rollmaterials
     * 
     * @param int $type The affected type
     * @param int $class The affected class
     * 
     * @return rollmaterial_id and number
     */
    public function getRollmaterials($type, $class = null)
    {
        if ($class) {
            return $this->db->select(
                'SELECT
                    rollmaterial_id,
                    number
                FROM
                    rollmaterial
                WHERE
                    type = :type AND
                    class = :class AND
                    availability = 1',
                array(
                    ':type' => $type,
                    ':class' => $class
                )
            );
        } else {
            return $this->db->select(
                'SELECT
                    rollmaterial_id,
                    number
                FROM
                    rollmaterial
                WHERE
                    type = :type AND
                    availability = 1',
                array(
                    ':type' => $type
                )
            );
        }
    }

    /**
     * Insert useplan to rollmaterial relation
     * 
     * @param int $type The affected type
     * @param int $class The affected class
     * 
     * @return array
     */
    public function insertUseplanToRollmaterial($useplanID, $waggonID)
    {
        $insertArray = array(
            'useplan_id' => $useplanID,
            'rollmaterial_id' => $waggonID,
        );

        $this->db->insert('useplan_to_rollmaterial', $insertArray);
    }

    /**
     * Get useplan details
     * 
     * @param int $date The affected date
     * 
     * @return array
     */
    public function getTrainNr($date)
    {
        return $this->db->select(
            'SELECT
                useplan_train_nr
            FROM
                useplan
            WHERE
                useplan_date = :useplanDate',
            array(
                ':useplanDate' => $date
            )
        );
    }
    
    /**
     * Get useplan details
     * 
     * @param int $date The affected date
     * 
     * @return array
     */
    public function getLine($date)
    {
        return $this->db->select(
            'SELECT
            l.line_name
            FROM
                useplan AS up
                LEFT JOIN useplan_to_line AS utl ON (utl.useplan_id = up.useplan_id)
                LEFT JOIN line AS l ON (l.line_id = utl.line_id)
            WHERE
                up.useplan_date = :useplanDate',
            array(
                ':useplanDate' => $date
            )
        );
    }
    
    /**
     * Get useplan details
     * 
     * @param int $date The affected date
     * 
     * @return array
     */
    public function getTheEmployees($date, $loc = false)
    {
        if ($loc) {
            $cat = 1;
        } else {
            $cat = 2;
        }
        return $this->db->select(
            'SELECT DISTINCT
            e.firstname,
            e.lastname
        FROM
            useplan AS up
            LEFT JOIN useplan_to_employee AS ute ON (ute.useplan_id = up.useplan_id)
            LEFT JOIN employee AS e ON (e.employee_id = ute.employee_id)
        WHERE
            up.useplan_date = :useplanDate AND
            e.category = :cat',
            array(
                ':useplanDate' => $date,
                ':cat' => $cat
            )
        );
    }
    
    /**
     * Get useplan details
     * 
     * @param int $date The affected date
     * 
     * @return array
     */
    public function getTrain($date, $employeeID)
    {
        return $this->db->select(
            'SELECT
            r.number
        FROM
            useplan AS up
            LEFT JOIN useplan_to_rollmaterial AS utr ON (utr.useplan_id = up.useplan_id)
            LEFT JOIN rollmaterial AS r ON (r.rollmaterial_id = utr.rollmaterial_id)
            LEFT JOIN useplan_to_employee AS ute ON (ute.useplan_id = up.useplan_id)
            LEFT JOIN employee AS e ON (e.employee_id = ute.employee_id)
        WHERE
            up.useplan_date = :useplanDate AND
            e.employee_id = :employeeID
        ORDER BY
            r.type',
            array(
                ':useplanDate' => $date,
                ':employeeID' => $employeeID
            )
        );
    }
} 