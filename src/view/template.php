<!DOCTYPE html>
<html lang="fi">

<head>
  <title>Mökkivaraamo - <?= $this->e($title) ?></title>
  <meta charset="UTF-8">
  <link href="styles/styles.css" rel="stylesheet">
  <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
</head>

<body>
  <header>
    <h1><a href="<?= BASEURL ?>">Mökkivaraamo</a></h1>
    <div class="profile">
      <?php
      if (isset($_SESSION['user'])) {
        echo "<div>$_SESSION[user]</div>";
        echo "<div><a href='logout'>Kirjaudu ulos</a></div>";
        echo "<div><button type='button' class='btn btn-info'><a href='reservations'>Omat varaukset</a></button></div>";
      } else {
        echo "<div><a href='login'>Kirjaudu</a></div>";
      }
      ?>
    </div>
  </header>
  <section>
    <?= $this->section('content') ?>
  </section>
  <footer>
    <hr>
    <div> &copy; Mökkivaraamo Oy 2021</div>
  </footer>
</body>

</html>