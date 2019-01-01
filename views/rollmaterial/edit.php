<div class="jumbotron jumbotron-fluid">
    <h1>Rollmaterial <strong><?php echo $this->rollmaterial[0]['number']; ?></strong> bearbeiten</h1>
    <form action="<?php echo URL; ?>rollmaterial/editSave/<?php echo $this->rollmaterial[0]['rollmaterialid']; ?>" method="post">
    <label for="number">Nummer</label><span class="required-star">*</span><input type="text" id="number" name="number" value="<?php echo $this->rollmaterial[0]['number']; ?>"><br>
        <label for="type">Typ<span class="required-star">*</span></label>
        <select name="type" id="type">
        <?php
        foreach($this->typeData as $key => $value) {
            echo "<option value='{$value['typeid']}'";
            if ($this->rollmaterial[0]['type'] == $value['typeid']) {
                echo 'selected';
            }
            echo ">" . $value['type'] . "</option>";
        }
        ?>
        </select><br>
        <label for="date_of_commissioning">Erste Inbetriebnahme<span class="required-star">*</span></label><input type="text" id="date_of_commissioning" name="date_of_commissioning" value="<?php echo $this->rollmaterial[0]['date_of_commissioning']; ?>"><br>
        <label for="date_of_last_revision">Letzte Revision<span class="required-star">*</span></label><input type="text" id="date_of_last_revision" name="date_of_last_revision" value="<?php echo $this->rollmaterial[0]['date_of_last_revision']; ?>"><br>
        <label for="date_of_next_revision">Nächste Revision<span class="required-star">*</span></label><input type="text" id="date_of_next_revision" name="date_of_next_revision" value="<?php echo $this->rollmaterial[0]['date_of_next_revision']; ?>"><br>
        <label for="class">Klasse</label>
        <select name="class" id="class">
            <?php
            foreach($this->classData as $key => $value) {
                echo "<option value='{$value['classid']}'";
                if ($this->rollmaterial[0]['class'] == $value['classid']) {
                    echo 'selected';
                }
                echo ">" . $value['class'] . "</option>";
            }
            ?>
        </select><br>
        <label for="seating">Sitzplätze<span class="required-star">*</span></label><input type="number" id="seating" name="seating" value="<?php echo $this->rollmaterial[0]['seating']; ?>"><br>
        <label for="availability">Verfügbar</label>
        <select name="availability" id="availability">
            <option value="1" <?php echo ($this->rollmaterial[0]['availability'] == 1) ? 'selected' : '' ?>>Ja</option>
            <option value="0" <?php echo ($this->rollmaterial[0]['availability'] == 0) ? 'selected' : '' ?>>Nein</option>
        </select><br>
        <input class="btn btn-success" type="submit">
        <a class="btn btn-primary" href="../">Zurück</a>
    </form>
</div>