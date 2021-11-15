<!DOCTYPE html>
<html lang="fi">
  <head>
    <title>Mökkivaraamo - <?=$this->e($title)?></title>
    <meta charset="UTF-8">  
    <link href="styles/styles.css" rel="stylesheet">
  </head>
  <body>
  <header>
      <h1><a href="<?=BASEURL?>">Mökkivaraamo</a></h1>
    </header>
    <section>
      <?=$this->section('content')?>
    </section>
    <footer>
      <hr>
      <div> &copy; Mökkivuokraamo 2021</div>
    </footer>
  </body>
</html>
