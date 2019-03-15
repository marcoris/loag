<div class="jumbotron jumbotron-fluid bg bg-lok">
    <div class="row">
        <div class="col-md-12 whitebg">    
        <!-- <?php pvd($this->stations); ?> -->
        <?php
        if ($this->no_entry) : ?>
            <h1>Sorry!</h1><p>Station gibt es nicht!</p>
        <?php
        else : ?>
            <div class="schedule-container">
                <h2><i class='fas fa-subway'></i>R <?= $this->trainNr ?> Richtung <?= $this->to ?></h2>
                <div class="start-end-time-container">
                    <span class="start-time"><?= $this->start_time ?></span>
                    <span class="start-time-circle"></span>
                    <span class="start-time-line"></span>
                    <span class="start-time-circle"></span>
                    <span class="end-time"><?= $this->end_time ?></span>
                    <span class="total-time">TOTAL</span>
                </div>
                <div class="start-station-container">
                    <span class="start-time">start zeit</span>
                    <span class="station-name">station name</span>
                </div>
                <?php
                // alle stationen
                ?>
                <div class="end-station-container">
                    <span class="end-time">END ZEIT</span>
                    <span class="station-name">STATION NAME</span>
                </div>
            </div>
        <?php
        endif;
        ?>
        <div>
        <a class="btn btn-primary" href="javascript:history.back();"><i class="fa fa-chevron-left"></i> Zurück</a>
        </div>
        </div>
    </div>
</div>