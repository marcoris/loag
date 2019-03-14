<div class="jumbotron jumbotron-fluid bg bg-lok">
    <div class="row">
        <div class="col-md-10 whitebg">    
        <div class="line-box line-<?php echo substr($this->line[0]['line_name'], -1); ?>"><?php echo substr($this->line[0]['line_name'], -1); ?></div>
            <?php
                echo '<div class="title-box">';
                echo '<p>' . $this->from . ' ab</p>';
                echo '<h2>Richtung ' . $this->to . '</h2>';
                echo '</div>';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <table class="table table-striped">
            <thead class="line-<?php echo substr($this->line[0]['line_name'], -1); ?>">
                    <tr>
                        <th class="text-center"><i class="far fa-clock"></i></th>
                        <th>Montag bis Freitag</th>
                        <th class="text-center"><i class="far fa-clock"></i></th>
                        <th>Samstag und Sonntag</th>
                    </tr>    
                </thead>
                <tbody>
                <?php
                echo $this->output;
                // require 'timetable.html'; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>