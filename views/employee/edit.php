<div class="jumbotron jumbotron-fluid">
    <h1>Mitarbeiter <strong><?php echo $this->employee[0]['login']; ?></strong> bearbeiten</h1>
    <form action="<?php echo URL; ?>employee/editSave/<?php echo $this->employee[0]['employeeid']; ?>" method="post">
        <label for="personalnumber">Personalnummer:<span class="required-star">*</span></label><input type="text" id="personalnumber" name="personalnumber" value="<?php echo $this->employee[0]['personalnumber']; ?>"><br>
        <label for="name">Vorname:<span class="required-star">*</span></label><input type="text" id="name" name="name" value="<?php echo $this->employee[0]['firstname']; ?>"><br>
        <label for="surname">Name:<span class="required-star">*</span></label><input type="text" id="surname" name="surname" value="<?php echo $this->employee[0]['lastname']; ?>"><br>
        <label for="category">Kategorie:<span class="required-star">*</span></label>
        <select name="category" id="category">
        <?php
        for ($i=1; $i <= 3; $i++) {
            echo "<option value='$i'";
            if ($this->employee[0]['category'] == $i) {
                echo 'selected';
            }
            echo '>';
            if ($i == 1) {
                echo 'Lokführer';
            } else if ($i == 2) {
                echo 'Kontrolleur';
            } else {
                echo 'Büro';
            }
            echo "</option>";
        }
        ?>
        </select><br>
        <label for="absence">Absenz:<span class="required-star">*</span></label>
        <select name="absence" id="absence">
        <?php
        for ($i=1; $i <= 3; $i++) {
            echo "<option value='$i'";
            if ($this->employee[0]['absence'] == $i) {
                echo 'selected';
            }
            echo '>';
            if ($i == 1) {
                echo 'Arbeit';
            } else if ($i == 2) {
                echo 'Ferien';
            } else {
                echo 'Krank';
            }
            echo "</option>";
        }
        ?>
        </select><br>
        <label for="login">Login:<span class="required-star">*</span></label><input type="text" id="login" name="login" value="<?php echo $this->employee[0]['login']; ?>"><br>
        <label for="password">Passwort:<span class="required-star">*</span></label><input type="text" id="password" name="password"><br>
        <label for="role">Rolle:<span class="required-star">*</span></label>
        <select name="role" id="role">
        <?php
        for ($i=3; $i > 1; $i--) {
            echo "<option value='$i'";
            if ($this->employee[0]['role'] == $i) {
                echo 'selected';
            }
            echo '>';
            if ($i == 3) {
                echo 'Mitarbeiter';
            } else {
                echo 'Disponent';
            }
            echo "</option>";
        }
        ?>
        </select><br>
        <button class="btn btn-primary" onClick="javascript:history.back();"><i class="fas fa-chevron-left"></i> Zurück</button>
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
</div>