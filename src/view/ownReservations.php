<?php $this->layout('template', ['title' => 'Omat varaukset']) ?>

<h1> Tästä näät kaikki menneet ja tulevat varauksesi. </h1>

</div>
<?php
require_once MODEL_DIR . 'cottage.php';
echo "<div class='ownRes'>";
foreach ($reservations as $reservation) {
  $cottage = getCottage($reservation['idcottage']);
  echo "<hr>";
  echo "<h2>$cottage[name]</h2>";
  echo "<div><strong>Aloituspäivä: </strong>$reservation[start_date]</div>";
  echo "<div><strong>Lopetuspäivä: </strong>$reservation[end_date]</div>";
}
echo "</div>";
?>