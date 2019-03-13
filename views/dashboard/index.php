<div class="jumbotron jumbotron-fluid loggedin">
    <h1>Dashboard</h1>
    <p>Willkommen <?php echo Session::get('login'); ?></p>
    <hr>
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
                echo '<div><a href="">' . $months[$i] . '</a></div>';
            } else {
                echo '<div>' . $months[$i] . '</div>';
            }
        }
        ?>
    </div>
</div>