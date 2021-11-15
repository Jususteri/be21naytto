<?php $this->layout('template', ['title' => 'Kirjautuminen']) ?>

<h1>Kirjautuminen</h1>

<form action="https://<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>" method="POST">
  <div>
    <label>Sähköposti:</label>
    <input type="text" name="email">
  </div>
  <div>
    <label>Salasana:</label>
    <input type="password" name="password">
  </div>
  <div class="error"><?= getValue($error,'logging-error'); ?></div>
  <div>
    <input type="submit" name="send" value="Kirjaudu">
  </div>
</form>

<div class="info">Jos sinulla ei ole vielä tunnuksia, niin voit luoda ne <a href="registration">täällä</a>.</div>
