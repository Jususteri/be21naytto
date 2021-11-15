<?php

  // Aloitetaan istunnot.
  session_start();


require_once '../src/init.php';

  // Haetaan kirjautuneen käyttäjän tiedot.
  if (isset($_SESSION['user'])) {
    require_once MODEL_DIR . 'person.php';
    $loggeduser = getPerson($_SESSION['user']);
  } else {
    $loggeduser = NULL;
  }




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


  switch ($request) {
    case '/':
    case '/cottages':
      require_once MODEL_DIR . 'cottage.php';
      $cottages = getCottages();
      echo $templates->render('cottages',['cottages' => $cottages]);
      break;
    case '/cottage':
      require_once MODEL_DIR . 'cottage.php';
      $cottage = getCottage($_GET['id']);
      if ($cottage) {
        echo $templates->render('cottage',['cottage' => $cottage]);
      } else {
        echo $templates->render('error');
      }
      break;
    case '/registration':
      if (isset($_POST['send'])) {
        $formdata = cleanArrayData($_POST);
        require_once CONTROLLER_DIR . 'account.php';
        $result = addAccount($formdata);
        if ($result['status'] == "200") {
          echo $templates->render('account_created', ['formdata' => $formdata]);
          break;
        }
        echo $templates->render('registration', ['formdata' => $formdata, 'error' => $result['error']]);
        break;
      } else {
        echo $templates->render('registration', ['formdata' => [], 'error' => []]);
        break;
      }   
      break;
      case '/reservation':
        echo $templates->render('reservation');
        break;
        case '/login':
          if (isset($_POST['send'])) {
            require_once CONTROLLER_DIR . 'login.php';
            if (checkLogin($_POST['email'],$_POST['password'])) {
              session_regenerate_id();
              $_SESSION['user'] = $_POST['email'];
              header("Location: " . $config['urls']['baseUrl']);
            } else {
              echo $templates->render('login', [ 'error' => ['logging-error' => 'Väärä käyttäjätunnus tai salasana!']]);
            }
          } else {
          echo $templates->render('login', [ 'error' => []]);
          }
          break;
          case "/logout":
            require_once CONTROLLER_DIR . 'login.php';
            logout();
            header("Location: " . $config['urls']['baseUrl']);
            break;
    default:
      echo $templates->render('error');
  }    


?> 