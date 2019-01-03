<div class="jumbotron jumbotron-fluid">
    <h1>Neuer Mitarbeiter erfassen</h1>

    <form action="<?php echo URL; ?>user/create" method="post">
        <label for="personalnumber">Personalnummer</label><span class="required-star">*</span><input type="text" id="personalnumber" name="personalnumber"><br>
        <label for="name">Vorname</label><span class="required-star">*</span><input type="text" id="name" name="name"><br>
        <label for="surname">Name</label><span class="required-star">*</span><input type="text" id="surname" name="surname"><br>
        <label for="category">Kategorie</label>
        <select name="category" id="category">
        <?php foreach($this->categoryData as $key => $value) {
                echo "<option value='{$value['categoryid']}'>" . $value['category'] . "</option>";
            }
        ?>
        </select><br>
        <label for="absence">Absenz</label>
        <select name="absence" id="absence">
            <?php
            foreach($this->absenceData as $key => $value) {
                echo "<option value='{$value['absenceid']}'>" . $value['absence'] . "</option>";
            }
            ?>
        </select><br>
        <label for="line">Linie</label>
        <select name="line" id="line">
        <?php foreach($this->lineData as $key => $value) {
                echo "<option value='{$value['lineid']}'>" . $value['line'] . "</option>";
            }
        ?>
        </select><br>
        <label for="login">Login</label><span class="required-star">*</span><input type="text" id="login" name="login"><br>
        <label for="password">Passwort</label><span class="required-star">*</span><input type="text" id="password" name="password"><br>
        <label for="role">Rolle</label>
        <select name="role" id="role">
            <?php
            foreach($this->roleData as $key => $value) {
                    echo "<option value='{$value['roleid']}'>" . ucfirst($value['role']) . "</option>";
            }
            ?>
        </select><br>
        <input class="btn btn-success" type="submit">
    </form>
    <hr>
    <h2>Mitarbeiterliste</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nr.</td>
                <th>Personalnummer</td>
                <th>Vorname</td>
                <th>Name</td>
                <th>Login</td>
                <th>Rolle</td>
                <th>Bearbeiten</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach($this->userList as $key => $value) {
                if (strtolower($value['absence']) == 'krank') {
                    echo '<tr class="krank">';
                } elseif (strtolower($value['absence']) == "ferien") {
                    echo '<tr class="ferien">';
                } else {
                    echo '<tr>';
                }
                echo '<td>' . $i . '.</td>';
                echo '<td>' . $value['personalnumber'] . '</td>';
                echo '<td>' . $value['name'] . '</td>';
                echo '<td>' . $value['surname'] . '</td>';
                echo '<td>' . $value['login'] . '</td>';
                echo '<td>' . $value['role'] . '</td>';
                echo '<td>
                    <a class="btn btn-success" href="' . URL . 'user/edit/' . $value['employeeid'] . '"><i class="fas fa-pen"></i></a>';
                if ($value['role'] == 'mitarbeiter' || ($value['role'] == 'disponent' && Session::get('usergroup') == 1))
                echo '<a class="btn btn-danger delete" href="' . URL . 'user/delete/' . $value['employeeid'] . '"><i class="fas fa-trash"></i></a>';
                echo '</td>';
                echo '</tr>';
                $i++;
            }
            ?>
        </tbody>
    </table>
    <label>Legende</label><br>
    <label class="ferien">Ferien</label>
    <label class="krank">Krank</label>
</div>