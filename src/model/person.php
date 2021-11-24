<?php

  require_once HELPERS_DIR . 'DB.php';

  function addPerson($name,$email,$password) {
    DB::run('INSERT INTO person (name, email, password) VALUE  (?,?,?);',[$name,$email,$password]);
    return DB::lastInsertId();
  }

  function getPersonByEmail($email) {
    return DB::run('SELECT * FROM person WHERE email = ?;', [$email])->fetchAll();
  }

  function getPerson($email) {
    return DB::run('SELECT * FROM person WHERE email = ?;', [$email])->fetch();
  }

?>
