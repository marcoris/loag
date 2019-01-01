<div class="jumbotron jumbotron-fluid">
    <h1>Mitarbeiter <strong><?php echo $this->user[0]['login']; ?></strong> bearbeiten</h1>
    <form action="<?php echo URL; ?>user/editSave/<?php echo $this->user[0]['employeeid']; ?>" method="post">
        <label for="personalnumber">Personalnummer</label><span class="required-star">*</span><input type="text" id="personalnumber" name="personalnumber" value="<?php echo $this->user[0]['personalnumber']; ?>"><br>
        <label for="name">Vorname</label><span class="required-star">*</span><input type="text" id="name" name="name" value="<?php echo $this->user[0]['name']; ?>"><br>
        <label for="surname">Name</label><span class="required-star">*</span><input type="text" id="surname" name="surname" value="<?php echo $this->user[0]['surname']; ?>"><br>
        <label for="category">Kategorie</label>
        <select name="category" id="category">
        <?php
        foreach($this->categoryData as $key => $value) {
            echo "<option value='{$value['categoryid']}'";
            if($this->user[0]['category'] == $value['categoryid']) {
                echo 'selected';
            }
            echo '>' . ucfirst($value['category']) . "</option>";
        }
        ?>
        </select><br>
        <label for="absence">Absenz</label>
        <select name="absence" id="absence">
        <?php
        foreach($this->absenceData as $key => $value) {
            echo "<option value='{$value['absenceid']}'";
            if($this->user[0]['absence'] == $value['absenceid']) {
                echo 'selected';
            }
            echo '>' . ucfirst($value['absence']) . "</option>";
        }
        ?>
        </select><br>
        <label for="line">Linie</label>
        <select name="line" id="line">
        <?php
        foreach($this->lineData as $key => $value) {
            echo "<option value='{$value['lineid']}'";
            if($this->user[0]['line'] == $value['lineid']) {
                echo 'selected';
            }
            echo '>' . ucfirst($value['line']) . "</option>";
        }
        ?>
        </select><br>
        <label for="login">Login</label><span class="required-star">*</span><input type="text" id="login" name="login" value="<?php echo $this->user[0]['login']; ?>"><br>
        <label for="password">Passwort</label><span class="required-star">*</span><input type="text" id="password" name="password"><br>
        <label for="role">Rolle</label>
        <select name="role" id="role">
        <?php
        foreach($this->roleData as $key => $value) {
            echo "<option value='{$value['roleid']}'";
            if($this->user[0]['role'] == $value['role']) {
                echo 'selected';
            }
            echo '>' . ucfirst($value['role']) . "</option>";
        }
        ?>
        </select><br>
        <input class="btn btn-success" type="submit">
        <a class="btn btn-primary" href="../">Zurück</a>
    </form>
</div>