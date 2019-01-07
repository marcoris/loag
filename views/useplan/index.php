<div class="jumbotron jumbotron-fluid">
    <h1>Einsatzplan</h1>
    <p>Für den Monat x</p>
    <form action="<?php echo URL ?>saveUseplan" method="post">
    <div>
        <label for="month">Monat:<span class="required-star">*</span></label>
        <select name="month" id="month">
            <option value="0">Wählen</option>
            <option value="1">Januar</option>
            <option value="2">Februar</option>
            <option value="3">März</option>
            <option value="4">...</option>
        </select>
    </div>
    <div>
        <label for="driver">Lokführer/In:<span class="required-star">*</span></label>
        <select name="driver" id="driver">
            <option value="volvo">Lokführer1</option>
            <option value="saab">Lokführer2</option>
            <option value="fiat">Lokführerin1</option>
            <option value="audi">Lokführerin2</option>
            <option value="audi">...</option>
        </select>
        </div>
        <div>
            <label for="controller">Kontrolleur/In:<span class="required-star">*</span></label>
            <select name="controller" id="controller">
                <option value="volvo">Kontrolleur1</option>
                <option value="volvo">Kontrolleur2</option>
                <option value="volvo">Kontrolleurin1</option>
                <option value="volvo">Kontrolleurin2</option>
                <option value="volvo">...</option>
            </select>
        </div>
        <div>
            <label for="train">Zug:<span class="required-star">*</span></label>
            <select name="train" id="train">
                <option value="volvo">Z001</option>
                <option value="saab">Z002</option>
                <option value="fiat">Z003</option>
                <option value="audi">...</option>
            </select>
        </div>
        <div>
            <label for="line">Linie:<span class="required-star">*</span></label>
            <select name="line" id="line">
                <option value="volvo">Linie1</option>
                <option value="saab">Linie2</option>
                <option value="fiat">Linie3</option>
                <option value="audi">Linie4</option>
            </select>
        </div>
        <button>Senden</button>
    </form>
</div>