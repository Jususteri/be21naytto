<?php

require_once '../src/init.php';

  // Siistitään polku urlin alusta ja mahdolliset parametrit urlin lopusta.
  // Siistimisen jälkeen osoite /~koodaaja/lanify/tapahtuma?id=1 on 
  // lyhentynyt muotoon /tapahtuma.
  $request = str_replace($config['urls']['baseUrl'],'',$_SERVER['REQUEST_URI']);
  $request = strtok($request, '?');

  // Selvitetään mitä sivua on kutsuttu ja suoritetaan sivua vastaava 
  // käsittelijä.
  // Luodaan uusi Plates-olio ja kytketään se sovelluksen sivupohjiin.
   // Luodaan uusi Plates-olio ja kytketään se sovelluksen sivupohjiin.
   $templates = new League\Plates\Engine(TEMPLATE_DIR);


  // Selvitetään mitä sivua on kutsuttu ja suoritetaan sivua vastaava
  // käsittelijä.
  if ($request === '/' || $request === '/cottages') {
    echo $templates->render('cottages');
  } else if ($request === '/reservation') {
    echo $templates->render('reservation');
  } else {
    echo $templates->render('error');
  }


?> 