<?php

  require_once HELPERS_DIR . 'DB.php';


  function getCottages() {
    return DB::run('SELECT * FROM cottage ORDER BY idcottage;')->fetchAll();
  }

  function getCottage($id) {
    return DB::run('SELECT * FROM cottage WHERE idcottage = ?;',[$id])->fetch();
  }
  ?>