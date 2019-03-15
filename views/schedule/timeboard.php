<div class="jumbotron jumbotron-fluid bg bg-lok">
    <div class="row">
        <div class="col-md-12 whitebg">    
        <!-- <?php pvd($this->stations); ?> -->
        <?php
        if ($this->no_entry) {
            echo '<h1>Sorry!</h1><p>Station gibt es nicht!</p><a class="btn btn-primary" href="javascript:history.back();"><i class="fa fa-chevron-left"></i> Zurück</a>';
        } else {
            echo $this->start_time;
        }
        ?>
        </div>
    </div>
</div>