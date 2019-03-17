<div class="jumbotron jumbotron-fluid loggedin">
    <h1>Dashboard</h1>
    <h2>Willkommen <?php echo Session::get('firstname') . ' ' . Session::get('lastname'); ?></h2>
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
    // check if the user is an employee or stuff
    if (Session::get('usergroup') > 2) : ?>
    <p>Im Dashboard kannst du deine Einsatzpläne anschauen und ausdrucken.<br>Monate in der Vergangenheit können nicht angeschaut werden!</p>
    <?php else : ?>
    <p>Im Dashboard kannst du die generierten Einsatzpläne bearbeiten, oder neue erstellen.</p>
    <?php endif; ?>
    <hr>
    <?php
    if (Session::get('usergroup') > 2) : ?>
    <h2 style="text-align: center; margin-bottom: 20px;">Einsatzplan</h2>
    <div class="useplan">
        <?php
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
    <h1>Neuen Einsatzplan erfassen</h1>
    <form action="<?php echo URL; ?>rollmaterial/create" method="post">
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
    <hr>
    <h2>Einsatzpläne</h2>
    <!-- <?php pvd($this->useplans); ?> -->
    <table class="table table-striped useplantable">
        <thead class="thead-dark">
            <tr>
                <th>Nr.</td>
                <th>Datum</td>
                <th>Zugnummer</td>
                <th>Linie</td>
                <th>LokführerIn</td>
                <th>KontrolleurIn</td>
                <th>Loknummer</td>
                <th>Waggonnummer</td>
                <th>Bearbeiten</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $j = 1;
            foreach ($this->useplans as $key => $value) {
                echo "<tr>
                    <td>$j</td>
                    <td>{$months[substr($value['useplan_date'], 0, -2)-1]} 20";
                    echo substr($value['useplan_date'], -2);
                    echo "</td>
                    <td>{$value['useplan_train_nr']}</td>
                    <td>{$value['line_name']}</td>
                    <td>{$value['lok']['firstname']} {$value['lok']['lastname']}</td>
                    <td>{$value['kont']['firstname']} {$value['kont']['lastname']}</td>
                    <td>{$value['lok']['number']}</td><td>";
                    for ($i=0; $i < count($value['waggons']); $i++) {
                        echo isset($value['waggons'][$i+1]) ? "<div class='useplandivs'>{$value['waggons'][$i+1]}</div>" : '';
                    }
                    echo "</td>
                    <td>";
                    echo '<a class="btn btn-success" href="' . URL . 'dashboard/edit/' . $key . '"><i class="fas fa-pen"></i></a>
                        <a class="btn btn-danger delete" href="' . URL . 'dashboard/delete/' . $key . '"><i class="fas fa-trash"></i></a>
                    </td>
                    </tr>';
                $j++;
            }
            ?>
        </tbody>
    </table>
    <?php
    endif;
    ?>
</div>