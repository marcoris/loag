<div class="jumbotron jumbotron-fluid bg bg-lok">
    <div class="wrap">
        <div class="row">
            <h1 class="col-6">Fahrplan</h1>
        </div>
        <?php
        foreach ($this->getLine as $line => $name) {
            echo "<div class='row'><h4 class='col-6'>" . $name['line'] . "</h4></div>";
            foreach ($this->getFirstAndLastStation as $first => $station) {
                if ($name['lineid'] == $station[0]['fk_line']) {
                    echo '<div class="row">';
                    echo '<a class="col-6 line-' . ($name['lineid']-1) . ' schedule-link" href="schedule/show/' . $name['lineid'] . '">' . $station[0]['station'] . ' <i class="fas fa-arrow-right"></i> ' . $station[1]['station'] . '</a>';
                    echo '</div><div class="row">';
                    echo '<a class="col-6 line-' . ($name['lineid']-1) . ' schedule-link" href="schedule/show/' . $name['lineid'] . '/reverse">' . $station[1]['station'] . ' <i class="fas fa-arrow-right"></i> ' . $station[0]['station'] . '</a>';
                    echo '</div>';
                    break;
                }
            }
        }
        ?>
    </div>
</div>