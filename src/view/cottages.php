<?php $this->layout('template', ['title' => 'Mökit']) ?>

<h1>Valitse jokin alla olevista lomamökeistä</h1>

<div class='cottages'>
  <?php

  foreach ($cottages as $cottage) {

    echo "<div>";
    echo "<div>$cottage[name]</div>";
    echo "<div>$cottage[address]</div>";
    echo '<img width="100" height="100" src="data:image/jpeg;base64,'
      . base64_encode($cottage['image']) . '"/>';
    echo "<div><a href='cottage?id=" . $cottage['idcottage'] . "'>TIEDOT</a></div>";
    echo "</div>";
  }
  ?>
</div>