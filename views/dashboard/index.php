<div class="jumbotron jumbotron-fluid">
    <h1>Dashboard</h1>
    <p>Willkommen <?php echo Session::get('login'); ?></p>
    <hr>
    <h2>Logindaten</h2>
    <p>Hier kannst du dein Passwort ändern:</p>
    <form action="<?php echo URL; ?>dashboard/editSave/<?php echo Session::get('employeeid'); ?>" method="post">
        <label for="login">Login:<span class="required-star">*</span></label><input disabled value="<?php echo Session::get('login'); ?>"><br>
        <label for="password">Passwort:<span class="required-star">*</span></label><input type="text" id="password" name="password"><br>
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
    <?php pvd($_SESSION); ?>
    <hr>
    <h2>Einsatzplan</h2>
    <div class="useplan">
        <div>Januar</div>
        <div>Februar</div>
        <div>Januar</div>
        <div>Februar</div>
        <div>Januar</div>
        <div>Februar</div>
        <div>Januar</div>
        <div>Februar</div>
        <div>Januar</div>
        <div>Februar</div>
        <div>Januar</div>
        <div>Februar</div>
    </div>
</div>