<div class="jumbotron jumbotron-fluid bg bg-lok">
    <div class="wrap">
        <div class="row">
            <?php
            if ($this->no_entry) : ?>
                <h1>Sorry!</h1>
                <p class="sorry">Leider konnte zu Ihrer Anfrage keine Verbindung gefunden werden.<br>
                Möglicherweise möchten Sie Ihre Reise an einem Datum unternehmen, an dem Start oder Ziel gar nicht oder nicht mit dem gewählten Verkehrsmittel angefahren werden (Haltestellen werden z. B. am Wochenende manchmal nicht bedient).<br>
                </p>
                <div class="buttons no-print">
                    <a class="btn btn-primary" href="javascript:history.back();"><i class="fa fa-chevron-left"></i> Zurück</a>
                </div>
            <?php
            else : ?>
                <div class="schedule-container">
                    <h2><i class='fas fa-subway'></i> R <?= $this->trainNr ?> Richtung <?= $this->to ?></h2>
                    <div class="start-end-time-container">
                        <span class="start-time">Abfahrt <strong><?= $this->start_time ?></strong></span>
                        <span class="start-time-circle"></span>
                        <span class="start-time-line"></span>
                        <span class="start-time-circle"></span>
                        <span class="end-time">Ankunft <strong><?= $this->end_time ?></strong></span>
                        <span class="total-time">Dauer <strong><?= $this->total ?> min.</strong></span>
                    </div>
                    <table class="table table-striped">
                        <tr><td><strong><?= $this->start_time ?></strong> <strong><?= $this->from ?></strong></td></tr>
                        <?= $this->output ?>
                        <tr><td><strong><?= $this->end_time ?></strong> <strong><?= $this->to ?></strong></td></tr>
                    </table>
                    <div class="buttons no-print">
                        <a class="btn btn-primary" href="javascript:history.back();"><i class="fa fa-chevron-left"></i> Zurück</a>
                        <a class="btn btn-primary" href="javascript:print();"><i class="fa fa-print"></i> Drucken</a>
                    </div>
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>
</div>