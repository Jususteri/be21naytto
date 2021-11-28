<?php


require_once HELPERS_DIR . 'DB.php';

function addReservation($start_date,$end_date,$idcottage,$idperson,$info) {
  DB::run('INSERT INTO reservation (start_date, end_date, idcottage, idperson, info) VALUE  (?,?,?,?,?);',[$start_date,$end_date,$idcottage,$idperson, $info]);
  return DB::lastInsertId();
}

function getReservationsByIdperson($idperson) {
  return DB::run('SELECT * FROM reservation WHERE idperson = ?;', [$idperson])->fetchAll();
}


function getReservationsByIdcottage($idcottage) {
  return DB::run('SELECT * FROM reservation WHERE idcottage = ?;', [$idcottage])->fetchAll();
}

function getAllByIdreservation($idreservation) {
  return DB::run('SELECT * FROM reservation WHERE idreservation = ?;', [$idreservation])->fetchAll();
}

?>