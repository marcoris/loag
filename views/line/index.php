<div class="jumbotron jumbotron-fluid">
    <h1>Linien</h1>
    <?php
    foreach ($this->getLine as $lineid => $line) {
        echo '<p><a href="/line/show/' . $line['line_id'] . '">' . $line['line'] . '</a></p>';
    }
    ?>
</div>