<?php

  require_once ('funktiot/funktiot.php');
  session_start();

  if (!is_logged_in()) {
    // Tallennetaan kirjautumisyritys supermuuttujaan seuraavaa sivua varten;
    header('Location: hallinta_kirjautuminen_lomake.php');
  }

?>


<!DOCTYPE html>
<html lang="fi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php require_once("css.html");?>
  <link href="https://fonts.googleapis.com/css2?family=Poppins">
  <title>Repoveden kansallispuiston palautekysely - Hallinta</title>
  <script type="text/javascript" src="js/custom.js"></script>
  <style>

  </style>
</head>

<body>


<!-- NAVIGOINTIPALKKI-->

<?php//?>

<div class="navbar">

  <!-- Hallintavalikko -->
  <div class="dropdown">
    <button class="dropbtn" onclick="pudotusvalikko()">Hallinta
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content" id="myDropdown">
      <a href="hallinta_index.php">Hallinnan etusivu</a>
      <a href="hallinta_palaute_viihtyminen.php">Viihtyminen</a>
      <a href="hallinta_kirjaudu_ulos_kasittelija.php">Kirjaudu ulos</a>
    </div>
  </div>

</div>


<?php

/* ----- ON KIRJAUTUNUT: TULOSTETAAN KÄYTTÄJÄVALIKKO ----- 

if (is_logged_in()) {
  //echo 'user';
  display_user_menu();
} else {
  header('Location: kirjautuminen.php')
  ;
}
 ----- EI OLE KIRJAUTUNUT: HERJATAAN ----- 
echo '<a href="hallinta_kirjaudu_ulos_kasittelija.php">Kirjaudu ulos</a>';
*/

?>