
<?php

// YRITETÄÄN KIRJATA KÄYTTÄJÄ
// Jos epäonnistuu: ohjataan sivulle kirjautuminen.php
// Jos onnistuu: ohjataan sivulle hallinta_index.php

include_once('funktiot\funktiot.php');
include_once('funktiot/funktiot.php');
session_start();

// Jos sähköposti on tyhjä: annetaan usernamelle tyhjä arvo (Onko tämä turhaa?)
if (!isset($_POST['sahkoposti']))  {
  $_POST['sahkoposti'] = " "; 
}

// Annetaan sähköposti muuttujaan $username
$username = $_POST['sahkoposti'];

// Jos salasana on tyhjä: annetaan salasanalle tyhjä arvo (Onko tämä turhaa?)
if (!isset($_POST['salasana']))  {
  $_POST['salasana'] = " "; 
}

// Asetetaan salasana muuttujaan $passwd
$passwd = $_POST['salasana'];

// Kirjautuminen
if ($username && $passwd) {
  try  {
    login($username, $passwd);
    $_SESSION['valid_user'] = $username;
    header ('Location: hallinta_index.php');
  }
  catch(Exception $e)  {
    echo $e;
    echo '<br><br>Sinua ei voitu kirjata sisälle.';
    exit;
    //header ('Location: hallinta_kirjautuminen_lomake.php'); // Ohjataan takaisin kirjautumissivulle
  }
}

?>