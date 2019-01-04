<div class="jumbotron jumbotron-fluid">
    <?php
    ($this->reverse == 'reverse') ? $reverse = true : $reverse = false;
    if ($reverse) {
        $from = $this->getStations[count($this->getStations)-1]['station'];
        $to = $this->getStations[0]['station'];
        $link = "../" . $this->getStations[0]['fk_line'];
    } else {
        $from = isset($this->getStations[0]) ? $this->getStations[0]['station'] : '';
        $to = isset($this->getStations[count($this->getStations)-1]) ? $this->getStations[count($this->getStations)-1]['station'] : '';
        $link = isset($this->getStations[0]) ? $this->getStations[0]['fk_line'] . "/reverse" : '';
    }
    if ($from != '') {
        echo "<div class='schedule-top'>
            <span class='from'>" . $from . '</span>
            <a href="' . $link . '"><i class="fas fa-exchange-alt reverse-trigger text-center"></i></a>
            <span class="to">' . $to . "</span>
        </div>";
    }
    if (isset($this->getLine[0]) && substr($this->getLine[0]['line'], -1) != '-' && count($this->getLine) > 0) : ?>
        <div class="line-box line-<?php echo substr($this->getLine[0]['line'], -1); ?>"><?php echo substr($this->getLine[0]['line'], -1); ?></div>
        <?php
            echo '<div class="title-box">';
            echo '<p>' . $from . ' ab</p>';
            echo '<h2>Richtung ' . $to . '</h2>';
            echo '</div>';
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
                <table class="table table-striped timetable">
                    <thead class="thead-dark">
                        <tr>
                            <th>Ungefähre Reisezeit in Minuten</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $stations = $this->getStations;
                    $routes = $this->getRoutes;
                    $time = 0;
                    // reverse the stations on reverse value
                    if ($reverse) {
                        // output the values in table rows
                        for ($i=count($routes); $i > 0; $i--) {
                            echo "<tr>";
                            echo "<td>";
                            echo $stations[$i-1]['station'];
                            // if time is set add station white ball
                            if ($stations[$i-1]['mainstation']) {
                                if (isset($routes[$i-1]['time']) && $stations[$i-1]['sequence'] != count($routes)) {
                                    echo "<td><span class='table-ball table-ball-mainstation'></span>";
                                    echo date('H:i', mktime(0, $time += $routes[$i-1]['time']));
                                } else {
                                    $time += $routes[$i-1]['time'];
                                    echo "<td><span class='table-ball table-ball-mainstation'></span>";
                                }
                                echo "</td></tr>";
                            } else {
                                if (isset($routes[$i-1]['time']) && $stations[$i-1]['sequence'] != count($routes)) {
                                    echo "<td><span class='table-ball'></span>";
                                    echo date('H:i', mktime(0, $time += $routes[$i-1]['time']));
                                } else {
                                    $time += $routes[$i-1]['time'];
                                    echo "<td><span class='table-ball'></span>";
                                }
                                echo "</td></tr>";
                            }
                        }
                    } else {
                        // output the values in table rows
                        for ($i=0; $i < count($stations); $i++) {
                            echo "<tr>";
                            echo "<td>";
                            echo $stations[$i]['station'];
                            // if time is set add station white ball
                            if ($stations[$i]['mainstation']) {
                                if (isset($routes[$i]['time']) && $stations[$i]['sequence'] != 1) {
                                    echo "<td><span class='table-ball table-ball-mainstation'></span>";
                                    echo date('H:i', mktime(0, $time += $routes[$i]['time']));
                                } else {
                                    $time += $routes[$i]['time'];
                                    echo "<td><span class='table-ball table-ball-mainstation'></span>";
                                }
                                echo "</td></tr>";
                            } else {
                                if (isset($routes[$i]['time']) && $stations[$i]['sequence'] != 1) {
                                    echo "<td><span class='table-ball'></span>";
                                    echo date('H:i', mktime(0, $time += $routes[$i]['time']));
                                } else {
                                    $time += $routes[$i]['time'];
                                    echo "<td><span class='table-ball'></span>";
                                }
                                echo "</td></tr>";
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