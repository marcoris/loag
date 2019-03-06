<div class="jumbotron jumbotron-fluid">
    <h1>Linien</h1>
    <h2>Linie einfügen</h2>
    <form id="lineForm" action="<?php echo URL; ?>line/createLine" method="post">
        <label for="line">Linie:<span class="required-star">*</span></label><input type="text" id="line" name="line"><br>
        <button id="createLine" class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
    <hr>
    <form id="line" action="/line/saveLine/<?php echo $this->getLine[0]['line_id'] ?>" method="post">
        <table class="table table-striped timetable">
            <thead class="thead-dark">
                <tr>
                    <th>Linien bearbeiten</th>
                    <th>Öffnen</th>
                    <th>Löschen</th>
                </tr>    
            </thead>
            <tbody>
                <?php
                foreach ($this->getLine as $lineid => $line) {
                    echo '<tr>
                        <td><input type="text" name="station_' . $line['line_id'] . '" id="' . $line['line_id'] . '" value="' . $line['line'] . '">
                        </td>
                        <td>
                            <a class="btn btn-primary" href="/line/station/' . $line['line_id'] . '"><i class="fas fa-link"></i></a>
                        </td>
                        <td>
                        <a class="btn btn-danger delete" id="delete_' . $line['line_id'] . '" href="#"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
        <button id="submitLine" class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
</div>