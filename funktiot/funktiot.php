<?php

function testi_funktiot() {
  echo "Tämä merkkijono tulee tiedostosta funktiot.php.";
}

// Funktio: siistitään saatu arvo
function test_input($tieto)
{
  $rv_palautekysely = trim($tieto);
  $rv_palautekysely = stripslashes($tieto);
  $rv_palautekysely = htmlspecialchars($tieto);
  return $tieto;
}

require_once('data_valid_fns.php'); 
require_once('db_fns.php');
require_once('user_auth_fns.php');
require_once('output_fns.php');
require_once('url_fns.php');

?>