<div class="jumbotron jumbotron-fluid">
    <h1>Neues Rollmaterial erfassen</h1>
    <form action="<?php echo URL; ?>rollmaterial/create" method="post">
        <label for="number">Nummer</label><span class="required-star">*</span><input type="text" id="number" name="number"><br>
        <label for="type">Typ<span class="required-star">*</span></label>
        <select name="type" id="type">
        <?php foreach($this->typeData as $key => $value) {
                echo "<option value='{$value['typeid']}'>" . $value['type'] . "</option>";
            }
        ?>
        </select><br>
        <label for="date_of_commissioning">Erste Inbetriebnahme<span class="required-star">*</span></label><input type="text" id="date_of_commissioning" name="date_of_commissioning"><br>
        <label for="date_of_last_revision">Letzte Revision<span class="required-star">*</span></label><input type="text" id="date_of_last_revision" name="date_of_last_revision"><br>
        <label for="date_of_next_revision">Nächste Revision<span class="required-star">*</span></label><input type="text" id="date_of_next_revision" name="date_of_next_revision"><br>
        <label for="class">Klasse</label>
        <select name="class" id="class">
            <?php foreach($this->classData as $key => $value) {
                echo "<option value='{$value['classid']}'>" . $value['class'] . "</option>";
            }
            ?>
        </select><br>
        <label for="seating">Sitzplätze<span class="required-star">*</span></label><input type="number" id="seating" name="seating" value="0"><br>
        <label for="availability">Verfügbar</label>
        <select name="availability" id="availability">
            <option value="1">Ja</option>
            <option value="0">Nein</option>
        </select><br>
        <input class="btn btn-success" type="submit">
    </form>
    <hr>
    <h2>Rollmaterial</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nr.</td>
                <th>Nummer</td>
                <th>Typ</td>
                <th>Erste Inbetriebnahme</td>
                <th>Letzte Revision</td>
                <th>Nächste Revision</td>
                <th>Klasse</td>
                <th>Verfügbar</td>
                <th>Bearbeiten</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach($this->rollmaterialList as $key => $value) {
                echo '<tr>';
                echo '<td>' . $i . '.</td>';
                echo '<td>' . $value['number'] . '</td>';
                echo '<td>' . $value['type'] . '</td>';
                echo '<td>' . $value['date_of_commissioning'] . '</td>';
                echo '<td>' . $value['date_of_last_revision'] . '</td>';
                echo '<td>' . $value['date_of_next_revision'] . '</td>';
                echo '<td>' . $value['class'] . '</td>';
                echo '<td>' . ($value['availability'] ? 'Ja' : 'Nein') . '</td>';
                echo '<td><a class="btn btn-success" href="' . URL . 'rollmaterial/edit/' . $value['rollmaterialid'] . '"><i class="fas fa-pen"></i></a>';
                echo '<a class="btn btn-danger delete" href="' . URL . 'rollmaterial/delete/' . $value['rollmaterialid'] . '"><i class="fas fa-trash"></i></a>';
                echo '</td>';
                echo '</tr>';
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>