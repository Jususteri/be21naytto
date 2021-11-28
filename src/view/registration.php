<?php $this->layout('template', ['title' => 'Uuden tilin luonti']) ?>

<h1>Uuden tilin luonti</h1>

<form action="" method="POST">
  <div class="registration">
    <label for="name">Nimi:</label>
    <input id="name" type="text" name="name" value="<?= getValue($formdata, 'name') ?>">
    <div class="error"><span><?= getValue($error, 'name'); ?></span></div>
  </div>
  <div>
    <label for="email">Sähköposti:</label>
    <input id="email" type="email" name="email" value="<?= getValue($formdata, 'email') ?>">
    <div class="error"><?= getValue($error, 'email'); ?></div>
  </div>
  <div>
    <label for="password1">Salasana:</label>
    <input id="password1" type="password" name="password1">
    <div class="error"><?= getValue($error, 'password'); ?></div>
  </div>
  <div>
    <label for="password2">Salasana uudelleen:</label>
    <input id="password2" type="password" name="password2">
  </div>
  <div>
    <input type="submit" name="send" value="Luo tili">
  </div>
</form>