
<?php
  require_once('header_hallinta.php');
?>


<div class="palautekolumni">
  <h2>Repoveden kansallispuiston palautekanava</h2>


  <!---- MITKÄ VAIKUTTIVAT VIIHTYMISEEN? ----->

  <h3>Vastaajien viihtyminen</h3>
  
  <!--
  

  Erittäin hyvin
  Melko hyvin
  Kohtalaisesti
  Melko huonosti
  Erittäin huonosti-->

  <?php

    // Luodaan tietokantamuuttujat
    $kuinka_viihdyit = $vaikuttivat_viihtymiseen = "";

    // Luodaan kyselymuuttujat
    $rv_palautekysely = $query = "";

    // Luodaan yhteys tietokantaan
    $link = db_connect();

    // Luodaan kyselykomento
    $query = "SELECT kuinka_viihdyit, vaikuttivat_viihtymiseen
      FROM palaute";

    // Suoritetaan kysely. Tallennetaan tulos resultiin.
    $result = $link -> query($query);

    // Tulostetaan tulokset
    if ($result -> num_rows > 0) {
      echo '<table class="vastaajat_taulukko">
      <tr>
      <th>Kuinka hyvin viihdyit Repoveden kansallispuistossa?</th>
      <th>Mitkä asiat erityisesti vaikuttivat viihtymiseesi?</th>
      </tr>';
      while($row = $result -> fetch_assoc()) {
        echo "<tr>
          <td>" . $row["kuinka_viihdyit"] . "</td>
          <td>" . $row["vaikuttivat_viihtymiseen"] . "</td>
          </tr>";
      }
    }

    // Tyhjennetään resultin muisti (object oriented)
    $result -> free_result();

    // Suljetaan yhteys tietokantaan
    $link -> close();

  ?>

</div>


<?php
  require_once('footer.php');
?>