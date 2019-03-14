<div class="jumbotron jumbotron-fluid loggedin">
    <h1>Dashboard</h1>
    <h2>Willkommen <?php echo Session::get('firstname') . ' ' . Session::get('lastname'); ?></h2>
    <p>Im Dashboard kannst du deine Einsatzpläne anschauen und ausdrucken.<br>Monate in der Vergangenheit können nicht angeschaut werden!</p>
    <hr>
    <?php
    if (Session::get('usergroup') > 2) : ?>
    <h2 style="text-align: center; margin-bottom: 20px;">Einsatzplan</h2>
    <div class="useplan">
        <?php
        $months = array(
            'Januar',
            'Februar',
            'März',
            'April',
            'Mai',
            'Juni',
            'Juli',
            'August',
            'September',
            'Oktober',
            'November',
            'Dezember'
        );
        for ($i = 0; $i < 12; $i++) {
            if ($i+1 >= intval(date("m"))) {
                echo '<div><a href="' . URL . 'dashboard/useplan/' . $_SESSION['employee_id'] . '/' . ($i+1) . '">' . $months[$i] . '</a></div>';
            } else {
                echo '<div>' . $months[$i] . '</div>';
            }
        }
        ?>
    </div>
    <?php
    else : ?>
    <h2>Einsatzplan</h2>
    <p>Den Einsatzplan können nur die Mitarbeiter mit der Rolle <strong>Mitarbeiter</strong> anschauen!</p>
    <?php
    endif;
    ?>
</div>