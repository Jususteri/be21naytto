<?php $this->layout('template', ['title' => 'Mökit']) ?>

<div class='cottages'>
  <h1>Valitse jokin alla olevista lomamökeistä</h1>
  <?php

  foreach ($cottages as $cottage) {
    echo "<hr>";
    echo "<div>";
    echo "<div><strong>$cottage[name]</strong></div>";
    echo "<div>$cottage[address]</div>";
    echo '<img width="100" height="100" src="data:image/jpeg;base64,'
      . base64_encode($cottage['image']) . '"/>';
    echo "<div><button type='button' id='cottagesButton' class='btn btn-info'><a href='cottage?id=" . $cottage['idcottage'] . "'>Mökin tiedot</a></button></div>";
    echo "</div>";
  }
  ?>
</div>