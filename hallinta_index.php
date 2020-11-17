
<?php
  require_once('header_hallinta.php');
?>

<div class="palautekolumni">
  <h2>Repoveden kansallispuiston palautekanava - hallinta</h2>



  <!----- PALAUTTEITA YHTEENSÄ ----->

  <?php

    // Luodaan tietokantayhteys (object oriented)
    $mysqli = db_connect();

    // Suoritetaan kysely. Tulostetaan tulokset.
    if ($result = $mysqli -> query("SELECT * FROM palaute")) {
      echo '<h3 class="tilasto-otsikko">Tilastoja</h3>
        <div class="tilastolaatikko">
        <div class="tilasto-otsikko2">Palautteita yhteensä: ' 
        . $result -> num_rows . '</div>
        </div>';
      
      // Tyhjennetään result
      $result -> free_result();
    }

    // Suljetaan tietokantayhteys (object oriented)
    $mysqli -> close();

  ?> 



  <!----- KYSELYYN VASTANNEET ----->

  <div class="tilastorivi">
    <h3 class="tilasto-otsikko">Vastaajat </h3>
  </div>

  <?php
    
    // Luodaan tietokantayhteys (object oriented)
    $conn = db_connect();

    // Luodaan kyselykomento.
    $sql = "SELECT id, ika, sukupuoli FROM palaute";

    // Suoritetaan kysely (object oriented)
    $result = $conn -> query($sql);

    // Tulostetaan tulokset taulukkona
    if ($result -> num_rows > 0) {
      echo '<table class="vastaajat_taulukko">
        <tr>
        <th>id</th>
        <th>ikä</th>
        <th>sukupuoli</th>
        </tr>';
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td>
          <td>" . $row["ika"] . "</td>
          <td>" . $row["sukupuoli"] . "</td>
          </tr>";
      }
      echo "</table>";
    } else {
      echo "0 tulosta.";
    }

    $conn -> close();

  ?>

</div>


<?php
  require_once('footer.php');
?>