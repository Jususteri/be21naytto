<!DOCTYPE html>
<html lang="fi">

<head>
  <title>Mökkivaraamo - <?= $this->e($title) ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link href="styles/styles.css" rel="stylesheet">
  <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <div id="profile">
      <?php
      if (isset($_SESSION['user'])) {
        echo "<nav class='navbar'>";
        echo "<a class='navbar-brand' id='navButton' href='cottages'>Mökkivaraamo</a>";
        echo "<div><button type='button' id='navButton' class='btn btn-info'><a href='reservations'>Omat varaukset</a></button></div>";
        echo "<div>Kirjauduttu tunnuksella: $_SESSION[user]</div>";
        echo "<div><button type='button' id='navButton' class='btn btn-danger'><a href='logout'>Kirjaudu ulos</a></button></div>";
        echo "</nav>";
      } else {
        echo "<div><button type='button' id='navButton' class='btn btn-success btn-lg'><a href='login'>Kirjaudu sisään</a></button></div>";
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