
<?php

  session_start();

  // Kyselyn muuttujat
  $yhteys = $kysely = $yhteysOnnistui = $palaute_lisatty = $tulos = "";

  // Palautetietojen muuttujat
  $ika = $sukupuoli = $kuinka_viihdyit = $vaikuttivat_viihtymiseen = 
  $suositteletko = $palautetta_toiveita = "";

  // Funktio: Siistitään argumentit
  function test_input($tieto) {
    $tieto = trim($tieto);
    $tieto = stripslashes($tieto);
    $tieto = htmlspecialchars($tieto);
    return $tieto;
  }

  // Lisätään tietokantaan uusi palaute
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Siistitään POST-tiedot ja tallennetaan ne muuttujiin
    if (isset($_POST["uusipalaute"])) {
      $ika = test_input($_POST["ika"]);
      $sukupuoli = test_input($_POST["sukupuoli"]);
      $kuinka_viihdyit = test_input($_POST["kuinka_viihdyit"]);
      $vaikuttivat_viihtymiseen = test_input($_POST["vaikuttivat_viihtymiseen"]);
      $suositteletko = test_input($_POST["suositteletko"]);
      $palautetta_toiveita = test_input($_POST["palautetta_toiveita"]);
    } else {
      $_SESSION["tietoja_lomakkeelta"] = "Lomakkeelta ei saapunut tietoja.";
      //echo "Lomakkeelta ei saapunut tietoja.";
      //exit;
      header("Location: index.php");
    }

    // Luodaan yhteys tietokantaan
    require ("../palaute_rv_db.php");
    $palvelin = $repopalvelin;
    $kayttaja = $repokayttaja;
    $salasana = $reposalasana;
    $tietokanta = $repotietokanta;
    $yhteys = new mysqli("$palvelin", "$kayttaja", "$salasana", "$tietokanta");

    //Tarkistetaan yhteys
    if ($yhteys->connect_error) {
      die ("Ei yhteyttä" . "<br>errno: " . 
      mysqli_connect_errno() . "<br>error: " . mysqli_connect_error());
    } else {
      echo "Yhteys luotu.";
    }
    
    //Asetetaan yhteysmuuttujan merkistö
    $yhteys->set_charset("UTF-8");

    //Luodaan kysely
    $kysely = "INSERT INTO palaute (ika, sukupuoli, kuinka_viihdyit, 
    vaikuttivat_viihtymiseen, suositteletko, palautetta_toiveita)
    VALUES ('$ika', '$sukupuoli', '$kuinka_viihdyit', 
    '$vaikuttivat_viihtymiseen', '$suositteletko', '$palautetta_toiveita')"; //Elokuvan lisäyskomento
    
    //Tarkistetaan kyselyn onnistuminen
    $tulos = $yhteys -> query($kysely); // Onnistuiko kysely? Boolean.
    
    $kyselyvirhe = "Virhe: $kysely <br>" . mysqli_error($yhteys) . "<br>";

    //Suljetaan yhteys tietokantaan
    mysqli_close($yhteys);

    // Siirretään käyttäjä eteenpäin
    if ($tulos) {
      header("Location: palaute_vastaanotettu.php");
    } else {
      //echo "<br><br>Virhe: " . $kysely . "<br>";
      //echo mysqli_error($yhteys) . "<br>";
      $_SESSION["kyselyvirhe"] = $kyselyvirhe;
      header("Location: index.php");
    }

  }

?>