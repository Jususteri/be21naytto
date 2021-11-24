<?php $this->layout('template', ['title' => $cottage['name']]) ?>

<div class="cottage">
  <div class="cottageLeft">
    <h1><?= $cottage['name'] ?></h1>
    <?php echo '<img width="400" height="400" src="data:image/jpeg;base64,'
      . base64_encode($cottage['image']) . '"/>'; ?>
    <div><?= $cottage['address'] ?></div>
  </div>
  <div class="cottageRight">
    <div><?= $cottage['summary'] ?></div>
  </div>

  <?php
  if ($loggeduser) {
    echo "<div <button type='button' id='flexarea' class='btn btn-success btn-lg'><a href='reservation?id=$cottage[idcottage]'>Varaa mökki</a></div>";
    echo "</div>";
  } else {
    echo "<div class=info> Kiinnostuitko? <br> Sinun tulee olla 
    kirjautuneena palveluun tehdäksesi varauksen. <br>
    Kirjaudu sisään <a href='login'>tästä</a>!</div>";
    echo "</div>";
  }
  ?>