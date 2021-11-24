<?php

session_start();

require_once '../src/init.php';

if (isset($_SESSION['user'])) {
  require_once MODEL_DIR . 'person.php';
  $loggeduser = getPerson($_SESSION['user']);
} else {
  $loggeduser = NULL;
}

$request = str_replace($config['urls']['baseUrl'], '', $_SERVER['REQUEST_URI']);
$request = strtok($request, '?');

$templates = new League\Plates\Engine(TEMPLATE_DIR);

switch ($request) {
  case '/':
  case '/cottages':
    require_once MODEL_DIR . 'cottage.php';
    $cottages = getCottages();
    echo $templates->render('cottages', ['cottages' => $cottages]);
    break;
  case '/cottage':
    require_once MODEL_DIR . 'cottage.php';
    $cottage = getCottage($_GET['id']);
    if ($cottage) {
      if ($loggeduser) {
        echo $templates->render('cottage', ['loggeduser' => $loggeduser, 'cottage' => $cottage]);
      } else if (!$loggeduser)
        echo $templates->render('cottage', ['loggeduser' => NULL, 'cottage' => $cottage]);
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
        echo $templates->render('accountCreated', ['formdata' => $formdata]);
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
    require_once CONTROLLER_DIR . 'reservation.php';
      require_once MODEL_DIR . 'cottage.php';
    if (isset($_POST['send'])) {
      $cottage = getCottage($_GET['id']);
      $allDays = days($_GET['id']);
      $result = addBooking(
        $_GET['id'],
        $loggeduser['idperson'],
        $_POST['start_date'],
        $_POST['end_date'],
        $_POST['info']
      );
      if ($result['status'] == "200") {
        echo $templates->render('successfulBooking');
      } elseif($result['status'] == "400") {
        echo $templates->render('reservation', ['cottage' => $cottage, 'loggeduser' => $loggeduser, 'allDays' => $allDays,'error' => $result['error']]);
      } else {
        echo $templates->render('error');
      }
    } else {
      $cottage = getCottage($_GET['id']);
      $allDays = days($_GET['id']);
      if ($cottage) {
        if ($loggeduser) {
          echo $templates->render('reservation', ['cottage' => $cottage, 'loggeduser' => $loggeduser, 'allDays' => $allDays, 'error' => []]);
        }
      } else {
        echo $templates->render('error');
      }
    }
    break;
  case '/reservations':
    require_once MODEL_DIR . 'reservation.php';
    $reservations = getReservationsByIdperson($loggeduser['idperson']);
    echo $templates->render('ownReservations', ['reservations' => $reservations]);
    break;
  case '/login':
    if (isset($_POST['send'])) {
      require_once CONTROLLER_DIR . 'login.php';
      if (checkLogin($_POST['email'], $_POST['password'])) {
        session_regenerate_id();
        $_SESSION['user'] = $_POST['email'];
        header("Location: " . $config['urls']['baseUrl']);
      } else {
        echo $templates->render('login', ['error' => ['logging-error' => 'Väärä käyttäjätunnus tai salasana!']]);
      }
    } else {
      echo $templates->render('login', ['error' => []]);
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