<?php

function addBooking($idcottage, $idperson, $start_date, $end_date, $info)
{

  require_once(MODEL_DIR . 'reservation.php');
  $error = [];

  // Jos lopetus on ennen aloitusta --> error
  if ($start_date > $end_date) {
    $error['day'] = "HUOM! Tarkista varauspäivät. Aloitus on oltava ennen lopetusta";
  }

  // Luodaan lista kaikista varauksen päivistä
  $reservationDays = array();
  $begin = new DateTime($start_date);
  $end = new DateTime($end_date);
  $end = $end->modify('+1 day');
  $interval = new DateInterval('P1D');
  $daterange = new DatePeriod($begin, $interval, $end);
  foreach ($daterange as $date) {
    array_push($reservationDays, $date->format('d/m/Y'));
  }
  // Verrataan listaa aiempiin varauksiin
  $result = array_intersect(days($idcottage), $reservationDays);
  // Jos päällekkäisyyksiä --> error
  if ($result) {
    $error['day'] = "HUOM! Tarkista varauspäivät. Päällekkäiset varaukset ei onnistu";
  }

  // Jos ei erroria, tallennetaan varaus kantaan
  if (!$error) {
    $start = date("Y-m-d", strtotime($start_date));
    $end = date("Y-m-d", strtotime($end_date . '+1day'));
    $info = strip_tags(stripslashes($info));
    $idreservation = addReservation($start, $end, $idcottage, $idperson, $info);

    if ($idreservation) {
      return [
        "status" => 200,
        "id"     => $idreservation
      ];
    }
    // Jos error, palautetaan lista virheistä
  } else {
    return [
      "status" => 400,
      "error"  => $error
    ];
  }
}

// Tekee listan kaikista varatuista päivistä, myös aloitus- ja lopetus
// päivän välissä olevista päivistä 
function days($idcottage)
{

  require_once(MODEL_DIR . 'reservation.php');

  $reservations = getReservationsByIdcottage($idcottage);
  $allDays = array();
  foreach ($reservations as $reservation) {
    $period = new DatePeriod(
      new DateTime($reservation['start_date']),
      new DateInterval('P1D'),
      new DateTime($reservation['end_date'])
    );
    foreach ($period as $key => $value) {
      array_push($allDays, $value->format('d/m/Y'));
    }
  }
  return $allDays;
}
?>