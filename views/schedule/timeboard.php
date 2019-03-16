<div class="jumbotron jumbotron-fluid bg bg-lok">
    <div class="row">
        <div class="col-md-12 whitebg">    
        <?php
        if ($this->no_entry) : ?>
            <h1>Sorry!</h1>
            <p class="sorry">Leider konnte zu Ihrer Anfrage keine Verbindung gefunden werden.<br>
            Möglicherweise möchten Sie Ihre Reise an einem Datum unternehmen, an dem Start oder Ziel gar nicht oder nicht mit dem gewählten Verkehrsmittel angefahren werden (Haltestellen werden z. B. am Wochenende manchmal nicht bedient).<br>
            </p>
        <?php
        else : ?>
            <div class="schedule-container">
                <h2><i class='fas fa-subway'></i>R <?= $this->trainNr ?> Richtung <?= $this->to ?></h2>
                <div class="start-end-time-container">
                    <span class="start-time">Abfahrt <?= $this->start_time ?></span>
                    <span class="start-time-circle">O</span>
                    <span class="start-time-line">----------------------</span>
                    <span class="start-time-circle">O</span>
                    <span class="end-time">Ankunft <?= $this->end_time ?></span>
                    <span class="total-time">Dauer <?= $this->total ?> min.</span>
                </div>
                <div class="start-station-container">
                    <span class="start-time"><?= $this->start_time ?></span>
                    <span class="station-name"><?= $this->from ?></span>
                </div>
                <?= $this->output ?>
                <div class="end-station-container">
                    <span class="end-time"><?= $this->end_time ?></span>
                    <span class="station-name"><?= $this->to?></span>
                </div>
            </div>
        <?php
        endif;
        ?>
        <div>
        <a class="btn btn-primary no-print" href="javascript:history.back();"><i class="fa fa-chevron-left"></i> Zurück</a>
        <a class="btn btn-primary no-print" href="javascript:print();"><i class="fa fa-print"></i> Drucken</a>
        </div>
        </div>
    </div>
</div>