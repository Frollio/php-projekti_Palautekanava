
<?php
require_once('header_hallinta.php');

// Luodaan tarvittavat muuttujat
$rv_palautekysely = $query = $result = $ika = $sukupuoli = 
$kuinka_viihdyit = $vaikuttivat_viihtymiseen = 
$suositteletko = $palautetta_toiveita = "";

// Jos kysely on tyhjä, haetaan kaikki
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["Kysely"]) && !empty($_POST["rv_palautekysely"])) {
        $rv_palautekysely = test_input($_POST["rv_palautekysely"]);
    } else {
        $rv_palautekysely = "*";
    }
}

// Tulostetaan kyselyn sisältö
echo "rv_palautekysely = " . $rv_palautekysely . "<br>";

// Määritetään muuttujat tietokantayhteyttä varten
$host = "localhost";
$user = "root";
$passwd = "";
$db = "repovesi_palaute";

// Luodaan yhteys tietokantaan
$link = mysqli_connect($host, $user, $passwd, $db);
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$link->set_charset("utf-8");

// Siistitään arvot
function test_input($rv_palautekysely)
{
    $rv_palautekysely = trim($rv_palautekysely);
    $rv_palautekysely = stripslashes($rv_palautekysely);
    $rv_palautekysely = htmlspecialchars($rv_palautekysely);
    return $rv_palautekysely;
}

// Luodaan ja suoritetaan kysely
$query = "SELECT ika, sukupuoli, kuinka_viihdyit, 
  vaikuttivat_viihtymiseen, suositteletko, palautetta_toiveita 
  FROM palautetta WHERE ika LIKE '%$rv_palautekysely%'";

// Tulostetaan kyselykomento
echo "Query was: " . $query . "<br><br>";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_row($result);

// Suljetaan yhteys tietokantaan
mysqli_close($link);

?>


<!-- PALAUTTEIDEN HAKU HAKUSANALLA -->

<h2>Palautekysely</h2>
<div class="palautekolumni">

  <form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
    <input type="text" name=rv_palautekysely>
    <input type="submit" name="Kysely">
  </form>

  <?php
    // Tulostetaan kyselyn tulokset
    while ($row = $result->fetch_assoc()) {
      echo "Ikä: " . $row["ika"] . ", 
      Sukupuoli: " . $row["sukupuoli"] . ", 
      Kuinka hyvin viihdyit Repoveden kansallispuistossa?: " . $row["kuinka_viihdyit"] . ", 
      Mitkä asiat erityisesti vaikuttivat viihtymiseesi? : " .  $row["vaikuttivat_viihtymiseen"] . "
      Kuinka todennäköisesti suosittelisit käyntiä Repoveden kansallispuistossa?: " . $row["suositteletko"] . ", 
      Onko muuta? Voit kirjoittaa tähän palautetta ja toiveita Repoveden kansallispuiston palveluista: " . $row["palautetta_toiveita"] . ", 
      <br>";
    }
  ?>
</div>

<!-- SKRIPTIT -->

<script>

/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function pudotusvalikko() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}

</script>


<?php

require_once('footer.php');

?>