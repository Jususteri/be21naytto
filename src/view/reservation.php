<?php $this->layout('template', ['title' => $cottage['name']]) ?>

<div class="resh1">
    <h1>Täytä alla oleva lomake ja suorita varaus</h1>
</div>
<div class="reservation">
    <div class="reservationLeft">
        <form action="" method="POST">
            <p> Varaus alkaa aloituspäivänä kello 14:00 ja päättyy lopetuspäivänä kello 12:00</p>
            <div class="reservationDays">
                <label>Varauksen aloituspäivä <input type="text" readonly="readonly" id="start" name="start_date" placeholder="valitse aloituspäivä" required /></label>
                <label>Varauksen lopetuspäivä <input type="text" readonly="readonly" id="end" name="end_date" placeholder="valitse lopetuspäivä" required /></label>
            </div>
            <div class="error"><?= getValue($error, 'day'); ?></div>
            <div class="form-group">
                <label for="info">Lisätietoja </label>
                <textarea class="form-control" rows="5" placeholder="Jos varaukseen liittyy jotakin kysyttävää tai lisättävää, kerro niistä tässä. HUOM! älä käytä erikoismerkkejä." name="info" id="info"></textarea>
                <input type="submit" name="send" value="Suorita varaus" />
            </div>
        </form>
    </div>

    <div class="reservationRight">
        <h2><?= $cottage['name'] ?></h2>
        <div><?= $cottage['address'] ?></div>
        <?php echo '<img width="300" height="300" src="data:image/jpeg;base64,'
            . base64_encode($cottage['image']) . '"/>'; ?>
    </div>
</div>
<script>
    // Blokataan aloitus- ja lopetuskalenterista 
    // jo aiemmin varatut päivät ja kaikki päivät 
    // menneisyydestä.
    var allDays = <?php echo json_encode($allDays); ?>;

    function DisableEndDates(end) {
        var string = jQuery.datepicker.formatDate('dd/mm/yy', end);
        return [allDays.indexOf(string) == -1];
    }

    function DisableStartDates(start) {
        var string = jQuery.datepicker.formatDate('dd/mm/yy', start);
        return [allDays.indexOf(string) == -1];
    }

    $(function() {
        $("#start").datepicker({
            minDate: new Date,
            beforeShowDay: DisableStartDates
        });
    });

    $(function() {
        $("#end").datepicker({
            minDate: new Date,
            beforeShowDay: DisableEndDates
        });
    });
</script>