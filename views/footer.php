        </div>
        <div class="footer">
        (C) Footer
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <noscript>Please enable JavaScript in your browser</noscript>
        <?php
        if (isset($this->js)) {
            foreach ($this->js as $js) {
                echo '<script src="'.URL.'views/'.$js.'"></script>';
            }
        }
        ?>
    </body>
</html>