<div class="jumbotron jumbotron-fluid">
    <?php
    ($this->reverse == 'reverse') ? $reverse = true : $reverse = false;
    if ($reverse) {
        $from = $this->getStations[count($this->getStations)-1]['station'];
        $to = $this->getStations[0]['station'];
        $link = "../" . $this->getStations[0]['fk_line'];
    } else {
        $from = $this->getStations[0]['station'];
        $to = $this->getStations[count($this->getStations)-1]['station'];
        $link = $this->getStations[0]['fk_line'] . "/reverse";
    }
    echo "<div class='schedule-top'>" . $from . '<a href="' . $link . '"><i class="fas fa-exchange-alt reverse-trigger text-center"></i></a>' . $to . "</div>";
    if (isset($this->getLine[0]) && substr($this->getLine[0]['line'], -1) != '-' && count($this->getLine) > 0) : ?>
        <div class="line-box line-<?php echo substr($this->getLine[0]['line'], -1); ?>"><?php echo substr($this->getLine[0]['line'], -1); ?></div>
        <?php
            foreach ($this->getLine as $line => $name) {
                $station = $this->getFirstAndLastStation;
                if ($name['lineid'] == $station[0]['fk_line']) {
                    echo '<div class="title-box">';
                    echo '<p>' . $station[0]['station'] . ' ab</p>';
                    echo '<h2>Richtung ' . $station[1]['station'] . '</h2>';
                    echo '</div>';
                }
            }
        ?>
        <div class="row">
            <div class="col-md">
                <table class="table table-striped">
                    <thead class="line-<?php echo substr($this->getLine[0]['line'], -1); ?>">
                    <?php require 'timetable.html'; ?>
                </tbody>
                </table>
            </div>
            <div class="col-md">
                <table class="table timetable">
                    <thead>
                        <tr>
                            <th>Ungefähre Reisezeit in Minuten</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $stations = $this->getStations;
                    $routes = $this->getRoutes;
                    // reverse the stations on reverse value
                    if ($reverse) {
                        rsort($stations);
                        rsort($routes);
                    }
                    // output the values in table rows
                    for ($i=0; $i < count($stations); $i++) {
                        echo "<tr class='short-tablerow'>";
                        echo "<td>";
                        echo $stations[$i]['station'];
                        // if time is set add station white ball
                        if ($stations[$i]['mainstation']) {
                            echo "<td><span class='table-ball table-ball-mainstation'></span>";
                            echo $routes[$i]['time'];
                            echo "</td>";
                            if($i+1 < count($stations)) {
                                echo "<tr class='short-tablerow'><td></td><td class='table-padding'>|</td></tr>";
                            }
                        } else {
                            if (isset($routes[$i-1]['time'])) {
                                echo "<td><span class='table-ball'></span>";
                                echo $routes[$i-1]['time'];
                            } else {
                                echo "<td><span class='table-ball table-start-ball'></span>";
                            }
                            echo "</td></tr>";
                            if($i+1 < count($stations)) {
                                echo "<tr class='short-tablerow'><td></td><td class='table-padding'>|</td></tr>";
                            }
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>  
        </div>
    <?php else : ?>
    <h2>Ohje ;-(</h2>
    <p>Die Linie existiert leider nicht!</p>
    <a href="javascript:history.back()">Zurück</a>
    <?php endif; ?>
</div>