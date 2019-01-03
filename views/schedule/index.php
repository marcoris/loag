<div class="jumbotron jumbotron-fluid">
    <h1>Fahrplan</h1>
    <?php
    // db abfrage für die von bis stationen
    // SELECT * FROM loag.stations WHERE sequence = 1 OR
    // sequence = (SELECT COUNT(sequence) FROM loag.stations WHERE fk_line = 2) AND fk_line = 2 OR 
    // sequence = (SELECT COUNT(sequence) FROM loag.stations WHERE fk_line = 3) AND fk_line = 3 OR
    // sequence = (SELECT COUNT(sequence) FROM loag.stations WHERE fk_line = 4) AND fk_line = 4 OR
    // sequence = (SELECT COUNT(sequence) FROM loag.stations WHERE fk_line = 5) AND fk_line = 5;
    // echo count($this->getStationCount);
        foreach ($this->getLine as $line => $name) {
            echo "<h4>" . $name['line'] . "</h4>";
            for ($i=0; $i < count($this->getStationCount); $i++) {
                $station = $this->getFirstAndLastStation;
                // echo $name['lineid']."<br>";
                // echo $this->getStationCount[$i]['fk_line']."<br>";
                if ($name['lineid'] == $this->getStationCount[$i]['fk_line']) {
                    echo '<p><a href="schedule/show/' . $this->getStationCount[$i]['fk_line'] . '">' . $station[$i]['station'] . ' -> ' . (isset($station[$i+1]['station']) ? $station[$i+1]['station'] : $station[$i]['station']) . '</a></p>';
                    echo '<p><a href="schedule/show/' . $this->getStationCount[$i]['fk_line'] . '/reverse">' . (isset($station[$i+1]['station']) ? $station[$i+1]['station'] : $station[$i]['station']) . ' -> ' . $station[$i]['station'] . '</a></p>';
                }
            }
        }
        echo "<pre>";
    // print_r($this->getFirstAndLastStation);
    echo "</pre>";
    ?>
</div>