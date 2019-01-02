<div class="jumbotron jumbotron-fluid">
    <h1>Fahrplan</h1>
    <?php
        foreach ($this->getLine as $line => $name) {
            echo "<h4>" . $name['line'] . "</h4>";
            $station = $this->getFirstAndLastStation;
            if ($name['lineid'] == $station[0]['fk_line']) {
                echo '<p><a href="schedule/show/' . $name['lineid'] . '">' . $station[0]['station'] . ' -> ' . $station[1]['station'] . '</a></p>';
                echo '<p><a href="schedule/show/' . $name['lineid'] . '/reverse">' . $station[1]['station'] . ' -> ' . $station[0]['station'] . '</a></p>';
            }
        }
    ?>
</div>