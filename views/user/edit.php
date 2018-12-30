<div class="jumbotron jumbotron-fluid">
    <h1>User edit: <?php echo $this->user[0]['login']; ?></h1>

    <form action="<?php echo URL; ?>user/editSave/<?php echo $this->user[0]['userid']; ?>" method="post">
        <label for="login">Login</label><input type="text" id="login" name="login" value="<?php echo $this->user[0]['login']; ?>"><br>
        <label for="password">Password</label><input type="text" id="password" name="password"><br>
        <label for="role">Role</label>
        <select name="role" id="role">
            <option value="mitarbeiter" <?php if($this->user[0]['role'] == 'mitarbeiter') echo 'selected'; ?>>Mitarbeiter</option>
            <option value="disponent" <?php if($this->user[0]['role'] == 'disponent') echo 'selected'; ?>>Disponent</option>
            <option value="admin" <?php if($this->user[0]['role'] == 'admin') echo 'selected'; ?>>Admin</option>
        </select><br>
        <input type="submit">
    </form>
</div>