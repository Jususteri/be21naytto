<?php

require_once HELPERS_DIR . 'DB.php';


function getMessages($idcottage)
{
  return DB::run('SELECT * FROM book WHERE idcottage = ? ORDER BY time DESC ;', [$idcottage])->fetchAll();
}

function addMessage($idcottage, $idperson, $message)
{
  DB::run('INSERT INTO book (idcottage, idperson, message) VALUE  (?,?,?);', [$idcottage, $idperson, $message]);
  return DB::lastInsertId();
}
?>