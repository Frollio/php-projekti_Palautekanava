<?php

// KIRJATAAN KÄYTTÄJÄ ULOS


//require_once ('funktiot.php');
session_start();

// Lopetetaan sessio
unset($_SESSION['valid_user']);
session_destroy();

// Tallennetaan tieto uloskirjaamisesta myöhempää käyttöä varten.
// Tässä ei ole vielä mitään

// Ohjataan käyttäjä hallinnan indeksiin
header('Location: hallinta_index.php');

?>