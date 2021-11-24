<?php $this->layout('template', ['title' => $cottage['name']]) ?>

<h1>Täytä alla oleva lomake ja suorita varaus</h1>

<h2><?= $cottage['name'] ?></h2>
<div><?= $cottage['address'] ?></div>
<?php echo '<img width="300" height="300" src="data:image/jpeg;base64,'
    . base64_encode($cottage['image']) . '"/>'; ?>
<div><?= $cottage['summary'] ?></div>

<form action="" method="POST">
    <div class="res-dates">
        <p> Varaus alkaa aloituspäivänä kello 14:00 ja päättyy lopetuspäivänä kello 12:00</p>
        <label>Varauksen aloituspäivä <input type="text" readonly="readonly" id="start" name="start_date" placeholder="valitse aloituspäivä" required /></label>
        <div class="error"><?= getValue($error,'day'); ?></div>
        <label>Varauksen lopetuspäivä <input type="text" readonly="readonly" id="end" name="end_date" placeholder="valitse lopetuspäivä" required /></label>
    </div>

    <div class="res-info">
        <label>Lisätietoja <input type="textarea" name="info" id="info" rows="4" cols="50" placeholder="Jos varaukseen liittyy jotakin kysyttävää tai lisättävää, kerro niistä tässä. HUOM! älä käytä erikoismerkkejä."></label>
        <input type="submit" name="send" value="Suorita varaus" />
    </div>

</form>

<script>

    var allDays = <?php echo json_encode($allDays);?>;
    
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