<div class="jumbotron jumbotron-fluid">
    <h1>Mitarbeiter <strong><?php echo $this->user[0]['login']; ?></strong> bearbeiten</h1>
    <form action="<?php echo URL; ?>user/editSave/<?php echo $this->user[0]['employeeid']; ?>" method="post">
        <label for="personalnumber">Personalnummer:<span class="required-star">*</span></label><input type="text" id="personalnumber" name="personalnumber" value="<?php echo $this->user[0]['personalnumber']; ?>"><br>
        <label for="name">Vorname:<span class="required-star">*</span></label><input type="text" id="name" name="name" value="<?php echo $this->user[0]['name']; ?>"><br>
        <label for="surname">Name:<span class="required-star">*</span></label><input type="text" id="surname" name="surname" value="<?php echo $this->user[0]['surname']; ?>"><br>
        <label for="category">Kategorie:<span class="required-star">*</span></label>
        <select name="category" id="category">
        <?php
        foreach($this->categoryData as $key => $value) {
            echo "<option value='{$value['category_id']}'";
            if($this->user[0]['fk_category'] == $value['category_id']) {
                echo 'selected';
            }
            echo '>' . $value['category'] . "</option>";
        }
        ?>
        </select><br>
        <label for="absence">Absenz:<span class="required-star">*</span></label>
        <select name="absence" id="absence">
        <?php
        foreach($this->absenceData as $key => $value) {
            echo "<option value='{$value['absence_id']}'";
            if($this->user[0]['fk_absence'] == $value['absence_id']) {
                echo 'selected';
            }
            echo '>' . ucfirst($value['absence']) . "</option>";
        }
        ?>
        </select><br>
        <label for="line">Linie:<span class="required-star">*</span></label>
        <select name="line" id="line">
        <?php
        foreach($this->lineData as $key => $value) {
            echo "<option value='{$value['line_id']}'";
            if($this->user[0]['fk_line'] == $value['line_id']) {
                echo 'selected';
            }
            echo '>' . ucfirst($value['line']) . "</option>";
        }
        ?>
        </select><br>
        <label for="login">Login:<span class="required-star">*</span></label><input type="text" id="login" name="login" value="<?php echo $this->user[0]['login']; ?>"><br>
        <label for="password">Passwort:<span class="required-star">*</span></label><input type="text" id="password" name="password"><br>
        <label for="role">Rolle:<span class="required-star">*</span></label>
        <select name="role" id="role">
        <?php
        foreach($this->roleData as $key => $value) {
            echo "<option value='{$value['role_id']}'";
            if($this->user[0]['fk_role'] == $value['role_id']) {
                echo 'selected';
            }
            echo '>' . ucfirst($value['role']) . "</option>";
        }
        ?>
        </select><br>
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
</div>