<div class="jumbotron jumbotron-fluid">
    <h1><?php echo $this->getLine[0]['line']; ?></h1>
    <h2>Station einfügen</h2>
    <form id="station" action="<?php echo URL; ?>line/create" method="post">
        <label for="station">Station:<span class="required-star">*</span></label><input type="text" id="station" name="station"><br>
        <label for="time">Zeit in Minuten:<span class="required-star">*</span></label><input type="number" min="1" id="time" name="time"><br>
        <input type="hidden" id="fk_line" name="fk_line" value="<?php echo $this->getLine[0]['line_id'] ?>">
        <button id="submitStation" class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
    <hr>
    <form id="line" action="/line/editSave/<?php echo $this->getLine[0]['line_id'] ?>" method="post">
        <table class="table table-striped timetable">
            <thead class="thead-dark">
                <tr>
                    <th>Stationen</th>
                    <th>Zeiten</th>
                    <th>Reihenfolge</th>
                    <th>Löschen</th>
                </tr>    
            </thead>
            <tbody>
                <?php
                // output the table with the data
                echo $this->output;
                ?>
            </tbody>
        </table>
        <button id="submitLine" class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
</div>