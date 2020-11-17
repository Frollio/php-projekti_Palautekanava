
<?php

require_once("..\palaute_rv_db.php");
//db_testi();

function db_connect() {
  $repopalvelin = $GLOBALS['repopalvelin'];
  $repokayttaja = $GLOBALS['repokayttaja'];
  $reposalasana = $GLOBALS['reposalasana'];
  $repotietokanta = $GLOBALS['repotietokanta'];
  $yhteys = new mysqli($repopalvelin, $repokayttaja, $reposalasana, $repotietokanta);
  if (!$yhteys) {
    throw new Exception('Ei voinut yhdistää tietokantapalvelimeen.');
  } else {
    return $yhteys;
  }
}

?>