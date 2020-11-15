
<?php

require_once("..\palaute_rv_db.php");
//db_testi();

function db_connect() {
  $repopalvelin = $GLOBALS['repopalvelin'];
  $repokayttaja = $GLOBALS['repokayttaja'];
  $reposalasana = $GLOBALS['reposalasana'];
  $repotietokanta = $GLOBALS['repotietokanta'];
  $result = new mysqli($repopalvelin, $repokayttaja, $reposalasana, $repotietokanta);
  if (!$result) {
    throw new Exception('Could not connect to database server');
  } else {
    return $result;
  }
}

?>