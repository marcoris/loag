<div class="jumbotron jumbotron-fluid bg bg-lok">
    <div class="wrap">
        <div class="row">
            <h1 class="col-6">Fahrplan</h1>
        </div>
        <div class="row">
            <form action="<?php echo URL; ?>schedule/showschedule" method="post">
                <label for="start_station">Start-Station:<span class="required-star">*</span></label><input type="text" id="start_station" name="start_station"><br>
                <label for="end_station">End-Station:<span class="required-star">*</span></label><input type="text" id="end_station" name="end_station"><br>
                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Verbindung suchen</button>
            </form>
        </div>
    </div>
</div>