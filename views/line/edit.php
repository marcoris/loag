<div class="jumbotron jumbotron-fluid">
    <h1>Linie <strong><?php echo $this->line[0]['line_name']; ?></strong> bearbeiten</h1>
    <form action="<?php echo URL; ?>line/editSave/<?php echo $this->line[0]['line_id']; ?>" method="post">
        <label for="line_name">Linien-Name:<span class="required-star">*</span></label><input type="text" id="line_name" name="line_name" value="<?php echo $this->line[0]['line_name']; ?>"><br>
        <button class="btn btn-primary" onClick="javascript:history.back();"><i class="fas fa-chevron-left"></i> Zurück</button>
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
</div>