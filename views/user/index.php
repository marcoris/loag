<h1>Users</h1>

<form action="<?php echo URL; ?>user/create" method="post">
    <label for="login">Login</label><input type="text" id="login" name="login"><br>
    <label for="password">Password</label><input type="text" id="password" name="password"><br>
    <label for="role">Role</label>
    <select name="role" id="role">
        <option value="mitarbeiter">Mitarbeiter</option>
        <option value="disponent">Disponent</option>
        <option value="admin">Admin</option>
    </select><br>
    <input type="submit">
</form>
<hr>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</td>
            <th>Login</td>
            <th>Role</td>
            <th>Modify</td>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($this->userList as $key => $value) {
                echo '<tr>';
                echo '<td>' . $value['userid'] . '</td>';
                echo '<td>' . $value['login'] . '</td>';
                echo '<td>' . $value['role'] . '</td>';
                echo '<td>
                    <a href="' . URL . 'user/edit/' . $value['userid'] . '">Edit</a>';
                if ($value['role'] != 'admin')
                echo ' | 
                    <a href="' . URL . 'user/delete/' . $value['userid'] . '">Delete</a></td>';
                echo '</tr>';
            }
        ?>
    </tbody>
</table>