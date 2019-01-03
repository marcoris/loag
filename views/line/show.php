<div class="jumbotron jumbotron-fluid">
    <h1><?php echo $this->getLine[0]['line']; ?></h1>
    <form id="line" action="/line/editSave/<?php echo $this->getLine[0]['lineid'] ?>" method="post">
        <table class="table table-striped timetable">
            <thead class="thead-dark">
                <tr>
                    <th>Stationen</th>
                    <th>Zeiten</th>
                    <th>Bearbeiten</th>
                </tr>    
            </thead>
            <tbody>
                <?php
                $stations = $this->getStations;
                $routes = $this->getRoutes;
                // output the values in table rows
                for ($i=0; $i < count($stations); $i++) {
                    echo "<tr>";
                    echo "<td>";
                    echo "<input type='text' name='station_". $stations[$i]['stationid'] ."' id='station_". $stations[$i]['stationid'] ."' value='" . $stations[$i]['station'] . "'>";
                    // check if its not the first station time
                    if (isset($routes[$i-1]['time'])) {
                        echo "<td><input type='text' name='time_". $routes[$i-1]['routeid'] ."' id='time_". $routes[$i-1]['routeid'] ."' value='" . $routes[$i-1]['time'] . "'></td>";
                        echo '<td>
                    <label><input type="radio" name="mainStation" class="set_mainstation" value="' . $stations[$i]['stationid'] . '"';
                    if ($stations[$i]['mainstation']) {
                        echo "checked";
                    }
                    echo '>HB</label>';
                    if ($i+1 != count($stations)) {
                        echo '<a class="btn btn-warning sort_up" id="sort_up_' . $stations[$i]['stationid'] . '" href="#"><i class="fas fa-angle-up"></i></a>
                            <a class="btn btn-warning sort_down" id="sort_down_' . $stations[$i]['stationid'] . '" href="#"><i class="fas fa-angle-down"></i></a>
                            <a class="btn btn-danger delete" id="delete_' . $stations[$i]['stationid'] . '" href="#"><i class="fas fa-trash"></i></a>
                            <a class="btn btn-success add" id="add_' . $stations[$i]['stationid'] . '" href="#"><i class="fas fa-plus"></i></a>';
                    } else {
                        echo '</td>';
                    }
                } else {
                    echo "<td><input disabled></td><td></td>";
                }
                echo '</tr>';
            }
                ?>
            </tbody>
        </table>
        <input class="btn btn-primary btn-save" type="submit" value="Speichern">
    </form>
</div>