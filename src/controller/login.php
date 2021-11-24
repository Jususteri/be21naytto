<?php

function checkLogin($email = "", $password = "")
{

  require_once(MODEL_DIR . 'person.php');
  $data = getPerson($email);

  if ($data && password_verify($password, $data['password'])) {
    return true;
  }
  return false;
}

function logout()
{

  $_SESSION = array();

  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
      session_name(),
      '',
      time() - 42000,
      $params["path"],
      $params["domain"],
      $params["secure"],
      $params["httponly"]
    );
  }

  session_destroy();
}
?>