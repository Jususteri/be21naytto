<?php $this->layout('template', ['title' => 'Mökit']) ?>

<h1>Valitse jokin alla olevista lomamökeistä</h1>

<div class='cottages'>
<?php

foreach ($cottages as $cottage) {



  echo "<div>";
    echo "<div>$cottage[name]</div>";
    echo "<div>$cottage[address]</div>";
  //  echo "<div>$cottage[summary]</div>";
  //  echo "<div>$cottage[image]</div>";
    echo "<div><a href='cottage?id=" . $cottage['idcottage'] . "'>TIEDOT</a></div>";
  echo "</div>";
}

?>
</div>