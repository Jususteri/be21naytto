<?php $this->layout('template', ['title' => $cottage['name']]) ?>

<h1><?= $cottage['name'] ?></h1>
<div><?= $cottage['address'] ?></div>
<?php echo '<img width="400" height="400" src="data:image/jpeg;base64,'
  . base64_encode($cottage['image']) . '"/>'; ?>
<div><?= $cottage['summary'] ?></div>

<?php
if ($loggeduser) {

  echo "<div class='flexarea'><a href='reservation?id=$cottage[idcottage]' class='button'>Varaa mökki</a></div>";
} else {

  echo "<div class=info> Kiinnostuitko? <br> Sinun tulee olla 
    kirjautuneena palveluun tehdäksesi varauksen. <br>
    Kirjaudu sisään <a href='login'>tästä</a>!</div>";
}
?>