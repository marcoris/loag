<div class="jumbotron jumbotron-fluid">
    <h1>Fahrplan</h1>
    <?php
        foreach ($this->getLine as $line => $name) {
            echo "<h4>" . $name['line'] . "</h4>";
            foreach ($this->getFirstAndLastStation as $first => $station) {
                if ($name['lineid'] == $station[0]['fk_line']) {
                    echo '<p><a class="schedule-link" href="schedule/show/' . $name['lineid'] . '">' . $station[0]['station'] . ' <i class="fas fa-arrow-right"></i> ' . $station[1]['station'] . '</a></p>';
                    echo '<p><a class="schedule-link" href="schedule/show/' . $name['lineid'] . '/reverse">' . $station[1]['station'] . ' <i class="fas fa-arrow-right"></i> ' . $station[0]['station'] . '</a></p>';
                    break;
                }
            }
        }
    ?>
</div>