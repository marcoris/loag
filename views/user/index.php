<div class="jumbotron jumbotron-fluid">
    <h1>Neuer Mitarbeiter erfassen</h1>

    <form action="<?php echo URL; ?>user/create" method="post">
        <label for="personalnumber">Personalnummer<span class="required-star">*</span></label><input type="text" id="personalnumber" name="personalnumber"><br>
        <label for="name">Vorname<span class="required-star">*</span></label><input type="text" id="name" name="name"><br>
        <label for="surname">Name<span class="required-star">*</span></label><input type="text" id="surname" name="surname"><br>
        <label for="category">Kategorie</label>
        <select name="category" id="category">
        <?php foreach($this->categoryData as $key => $value) {
                echo "<option value='{$value['categoryid']}'>" . $value['category'] . "</option>";
            }
        ?>
        </select><br>
        <label for="absence">Absenz</label>
        <select name="absence" id="absence">
        <?php foreach($this->absenceData as $key => $value) {
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
        <label for="login">Login<span class="required-star">*</span></label><input type="text" id="login" name="login"><br>
        <label for="password">Passwort</label><input type="text" id="password" name="password"><br>
        <label for="role">Rolle</label>
        <select name="role" id="role">
        <?php foreach($this->roleData as $key => $value) {
                echo "<option value='{$value['roleid']}'>" . ucfirst($value['role']) . "</option>";
            }
        ?>
        </select><br>
        <input type="submit">
    </form>
    <hr>
    <h2>Mitarbeiterliste</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</td>
                <th>Login</td>
                <th>Rolle</td>
                <th>Vorname</td>
                <th>Name</td>
                <th>Bearbeiten</td>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($this->userList as $key => $value) {
                    echo '<tr>';
                    echo '<td>' . $value['employeeid'] . '</td>';
                    echo '<td>' . $value['login'] . '</td>';
                    echo '<td>' . ucfirst($value['role']) . '</td>';
                    echo '<td>' . $value['name'] . '</td>';
                    echo '<td>' . $value['surname'] . '</td>';
                    echo '<td>
                        <a class="btn btn-success" href="' . URL . 'user/edit/' . $value['employeeid'] . '">Edit</a>';
                    if ($value['role'] == 'mitarbeiter' || ($value['role'] == 'disponent' && Session::get('usergroup') == 3))
                    echo '<a class="btn btn-danger" href="' . URL . 'user/delete/' . $value['employeeid'] . '">Delete</a></td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</div>