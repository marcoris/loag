<div class="jumbotron jumbotron-fluid bg bg-lok">
    <?php
    echo $this->fromto;
    if (isset($this->getLine[0]) && substr($this->getLine[0]['line'], -1) != '-' && count($this->getLine) > 0) : ?>
        <div class="line-box line-<?php echo substr($this->getLine[0]['line'], -1); ?>"><?php echo substr($this->getLine[0]['line'], -1); ?></div>
        <?php
            echo '<div class="title-box">';
            echo '<p>' . $this->from . ' ab</p>';
            echo '<h2>Richtung ' . $this->to . '</h2>';
            echo '</div>';
        ?>
        <div class="row">
            <div class="col-md">
                <table class="table table-striped">
                    <thead class="line-<?php echo substr($this->getLine[0]['line'], -1); ?>">
                    <?php require 'timetable.html'; ?>
                </tbody>
                </table>
            </div>
            <div class="col-md">
                <table class="table table-striped timetable">
                    <thead class="thead-dark">
                        <tr>
                            <th colspan="2">Ungefähre Reisezeit in Minuten (Wartezeit Station: 2 min. Wartezeit HB 5 min.)</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        echo $this->output;
                    ?>
                    </tbody>
                </table>
            </div>  
        </div>
    <?php else : ?>
    <h2>Ohje ;-(</h2>
    <p>Die Linie existiert leider nicht!</p>
    <a href="javascript:history.back()">Zurück</a>
    <?php endif; ?>
</div>