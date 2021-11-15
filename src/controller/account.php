<?php

function addAccount($formdata) {


  require_once(MODEL_DIR . 'person.php');

  $error = [];


  if (!isset($formdata['name']) || !$formdata['name']) {
    $error['name'] = "Anna nimesi.";
  } else {
    if (!preg_match("/^[- '\p{L}]+$/u", $formdata["name"])) {
      $error['name'] = "Syötä nimesi ilman erikoismerkkejä.";
    }
  }


  if (!isset($formdata['email']) || !$formdata['email']) {
    $error['email'] = "Anna sähköpostiosoitteesi.";
  } else {
    if (!filter_var($formdata['email'], FILTER_VALIDATE_EMAIL)) {
      $error['email'] = "Sähköpostiosoite on virheellisessä muodossa.";
    } else {
      if (getPersonByEmail($formdata['email'])) {
        $error['email'] = "Sähköpostiosoite on jo käytössä.";
      }
    }
  }

  if (isset($formdata['password1']) && $formdata['password1'] &&
      isset($formdata['password2']) && $formdata['password2']) {
    if ($formdata['password1'] != $formdata['password2']) {
      $error['password'] = "Salasanasi eivät olleet samat!";
    }
  } else {
    $error['password'] = "Syötä salasanasi kahteen kertaan.";
  }


  if (!$error) {

 
    $name = $formdata['name'];
    $email = $formdata['email'];
    $password = password_hash($formdata['password1'], PASSWORD_DEFAULT);

    // Lisätään henkilö tietokantaan. Jos lisäys onnistui,
    // tulee palautusarvona lisätyn henkilön id-tunniste.
    $idperson = addPerson($name,$email,$password);

    if ($idperson) {
      return [
        "status" => 200,
        "id"     => $idperson,
        "data"   => $formdata
      ];
    } else {
      return [
        "status" => 500,
        "data"   => $formdata
      ];
    }

  } else {

    // Lomaketietojen tarkistuksessa ilmeni virheitä.
    return [
      "status" => 400,
      "data"   => $formdata,
      "error"  => $error
    ];

  }
}

?>
