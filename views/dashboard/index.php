<div class="jumbotron jumbotron-fluid">
    <h1>Dashboard</h1>
    <p>Willkommen <?php echo Session::get('login'); ?></p>
    <hr>
    <h2>Logindaten</h2>
    <p>Hier kannst du dein Passwort ändern:</p>
    <form action="<?php echo URL; ?>dashboard/editSave/<?php echo Session::get('employeeid'); ?>" method="post">
        <label for="login">Login: </label><input disabled value="<?php echo Session::get('login'); ?>"><br>
        <label for="password">Passwort: </label><span class="required-star">*</span><input type="text" id="password" name="password"><br>
        <input class="btn btn-primary" type="submit" value="Speichern">
    </form>
    <hr>
    <h2>Einsatzplan</h2>
</div>