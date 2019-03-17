<div class="jumbotron jumbotron-fluid loggedin">
    <h2>Einsatzplan bearbeiten</h2>
    <form action="<?php echo URL; ?>dashboard/create" method="post">
        <label for="date">Datum:<span class="required-star">*</span></label>
        <select name="date" id="date">
        <option value="119" disabled>Januar</option>
        <option value="219" disabled>Februar</option>
        <option value="319" selected>März</option>
        <option value="419">April</option>
        <option value="519">Mai</option>
        <option value="619">Juni</option>
        <option value="719">Juli</option>
        <option value="819">August</option>
        <option value="919">September</option>
        <option value="1019">Oktober</option>
        <option value="1119">November</option>
        <option value="1219">Dezember</option>
        </select><br>
        <label for="train_nr">Zugnummer:<span class="required-star">*</span></label><input type="text" id="train_nr" name="train_nr"><br>
        <label for="line">Linie:<span class="required-star">*</span></label>
        <select name="line" id="line">
            <?php
            foreach ($this->lines as $key => $value) {
                echo "<option value='{$value['line_id']}'>{$value['line_name']}</option>";
            }
            ?>
        </select><br>
        <label for="lok">LokführerIn:<span class="required-star">*</span></label>
        <select name="lok" id="lok">
            <?php
            foreach ($this->locdriver as $key => $value) {
                echo "<option value='{$value['employee_id']}'>{$value['firstname']} {$value['lastname']}</option>";
            }
            ?>
        </select><br>
        <label for="kont">KontrolleurIn:<span class="required-star">*</span></label>
        <select name="kont" id="kont">
            <?php
            foreach ($this->controller as $key => $value) {
                echo "<option value='{$value['employee_id']}'>{$value['firstname']} {$value['lastname']}</option>";
            }
            ?>
        </select><br>
        <label for="locomotive">Loknummer:<span class="required-star">*</span></label>
        <select name="locomotive" id="locomotive">
            <?php
            foreach ($this->locomotives as $key => $value) {
                echo "<option value='{$value['rollmaterial_id']}'>{$value['number']}</option>";
            }
            ?>
        </select><br>
        <label for="waggons">Waggons<span class="required-star">*</span></label>
        <select name="waggons[]" id="waggons" multiple size="10">
            <?php
            foreach ($this->waggons as $key => $value) {
                echo "<option value='{$value['rollmaterial_id']}'>{$value['number']}</option>";
            }
            ?>
        </select><br>
        <a class="btn btn-primary" href="javascript:history.back();"><i class="fas fa-chevron-left"></i> Zurück</a>
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
</div>