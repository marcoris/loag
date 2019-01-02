<div class="jumbotron jumbotron-fluid">
    <h1><?php echo $this->getLine[0]['line']; ?></h1>
    <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Linie</th>
                    <th>Bearbeiten</th>
                </tr>    
            </thead>
            <tbody>
            <?php if (empty($this->getStations) || empty($this->getRoutes)) : ?>
                <tr>
                    <td><input type="text" name="station_1" value="Solothurn, Allmend"></td>
                    <td><a class="btn btn-primary" id="edit_station_1" href="#">Edit</a></td>
                </tr>
                <tr>
                    <td><input type="text" name="route_1" value="10"></td>
                    <td>
                        <a class="btn btn-primary" id="edit_route_1" href="#">Edit</a>
                        <a class="btn btn-danger" id="delete_route_1" href="#">Del</a>
                        <a class="btn btn-success" id="add_route_1" href="#">Add</a>
                        <a class="btn btn-warning" id="sort_up_route_1" href="#">Up</a>
                        <a class="btn btn-warning" id="sort_down_route_1" href="#">Down</a>
                    </td>
                </tr>
                <tr>
                    <td><input type="text" name="station_2" value="Station 2"></td>
                    <td>
                        <a class="btn btn-primary" id="edit_route_2" href="#">Edit</a>
                        <a class="btn btn-danger" id="delete_route_2" href="#">Del</a>
                        <a class="btn btn-success" id="add_route_2" href="#">Add</a>
                        <a class="btn btn-warning" id="sort_up_route_2" href="#">Up</a>
                        <a class="btn btn-warning" id="sort_down_route_2" href="#">Down</a>
                    </td>
                </tr>
                <tr>
                    <td><input type="text" name="route_2" value="8"></td>
                    <td>
                        <a class="btn btn-primary" id="edit_route_2" href="#">Edit</a>
                        <a class="btn btn-danger" id="delete_route_2" href="#">Del</a>
                        <a class="btn btn-success" id="add_route_2" href="#">Add</a>
                        <a class="btn btn-warning" id="sort_up_route_2" href="#">Up</a>
                        <a class="btn btn-warning" id="sort_down_route_2" href="#">Down</a>
                    </td>
                </tr>
                <tr>
                    <td><input type="text" name="station_x" value="Solothurn, Hauptbahnhof"></td>
                    <td><a class="btn btn-primary" id="edit_x" href="#">Edit</a></td>
                </tr>
            <?php else : ?>
                <tr>
                    <td><?php echo "<pre>"; print_r($this->getStations); echo "</pre>"; ?></td>
                    <td><?php echo "<pre>"; print_r($this->getRoutes); echo "</pre>"; ?></td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
</div>