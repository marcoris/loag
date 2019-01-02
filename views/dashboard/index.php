<div class="jumbotron jumbotron-fluid">
    <h1>Dashboard</h1>
    <p>Willkommen <?php echo Session::get('login'); ?></p>
    <br>
    <h2>Mitarbeiterdaten</h2>
    Hier muss noch die logik für das anzeigen der daten her
    <?php if (Session::get('usergroup') > 1) : ?>
        <form id="randomInsert" action="<?php echo URL; ?>dashboard/xhrInsert" method="post">
            <input id="textfield" type="text" name="text"><br>
            <input type="submit">
        </form>
    <?php endif; ?>
    <br>
    <p>Hier könnte eine Liste mit Mitteilungen an den jeweiligen Mitarbeiter sein, die vom Disponent gesendet worden sind:</p>
    <ul id="listInserts"><ul>
</div>