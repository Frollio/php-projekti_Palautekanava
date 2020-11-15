
<?php

require_once ("header.php");

// Onnistuiko edellinen tietojen lähetys?
if (isset($_SESSION["tietoja_lomakkeelta"])) {
  echo $_SESSION["tietoja_lomakkeelta"];
  $_SESSION["tietoja_lomakkeelta"] = "";
}

// Onnistuiko edellinen kysely?
if (isset($_SESSION["kyselyvirhe"])) {
  echo $_SESSION["kyselyvirhe"];
  $_SESSION["kyselyvirhe"] = "";
}

?>

<!-- Sivun sisältö -->
<div id="container">

  <div class="palautekolumni">

    <!-- Palautelomake -->
    <!--<h1>Repoveden kansallispuiston palautekysely</h1>-->
    <h2>Kiitos vierailustasi Repoveden kansallispuistossa</h2><br>
    <img class="paakuva" src="img/rv-palautekysely2-W800.jpg" alt="Repoveden kansallispuisto">
    <div class="ingres">Parantaaksemme palveluitamme, toivomme sinun vielä vastaavan 
      seuraavaan kyselyyn (vastausaika 5 minuuttia).</div><br>
    <div class="ingres">Ikää ja sukupuolta kysytään vain 
      tilastollisten tarkoitusten vuoksi, eikä niillä yksilöidä yksittäistä vastaajaa. 
      Pakolliset kentät on merkitty *-merkillä.</div><br>

    <form class="palautelomake" action="palaute_kasittelija.php" method="POST">
    
      <!-- Ikä -->
      <label class="palaute_label">Ikä*</label><br>

      <input type="radio" id="alle18" name="ika" value="alle18" required checked>
      <label for="alle18">alle 18</label><br>

      <input type="radio" id="18-29" name="ika" value="18-29" required>
      <label for="18-29">18-29</label><br>

      <input type="radio" id="30-49" name="ika" value="30-49" required>
      <label for="30-49">30-49</label><br>

      <input type="radio" id="50-64" name="ika" value="50-64" required>
      <label for="50-64">50-64</label><br>

      <input type="radio" id="65-80" name="ika" value="65-80" required>
      <label for="65-80">65-80</label><br>

      <input type="radio" id="yli80" name="ika" value="yli80" required>
      <label for="yli80">yli 80</label><br><br>

      <!-- Sukupuoli -->
      <label class="palaute_label">Sukupuoli*</label><br>

      <input type="radio" id="nainen" name="sukupuoli" value="nainen" required checked>
      <label for="nainen">nainen</label><br>

      <input type="radio" id="mies" name="sukupuoli" value="mies" required>
      <label for="mies">mies</label><br>

      <input type="radio" id="muu" name="sukupuoli" value="muu" required>
      <label for="muu">muu</label><br><br>

      <!-- Kuinka hyvin viihdyit... -->
      <label class="palaute_label">Kuinka hyvin viihdyit Repoveden 
        kansallispuistossa?*</label><br>

      <input type="radio" id="kuinka_viihdyit_5" name="kuinka_viihdyit" value="5" required checked>
      <label for="kuinka_viihdyit_5">Erittäin hyvin</label><br>
      
      <input type="radio" id="kuinka_viihdyit_4" name="kuinka_viihdyit" value="4" required>
      <label for="kuinka_viihdyit_4">Melko hyvin</label><br>
      
      <input type="radio" id="kuinka_viihdyit_3" name="kuinka_viihdyit" value="3" required>
      <label for="kuinka_viihdyit_3">Kohtalaisesti</label><br>
      
      <input type="radio" id="kuinka_viihdyit_2" name="kuinka_viihdyit" value="2" required>
      <label for="kuinka_viihdyit_2">Melko huonosti</label><br>
      
      <input type="radio" id="kuinka_viihdyit_1" name="kuinka_viihdyit" value="1" required>
      <label for="kuinka_viihdyit_1">Erittäin huonosti</label><br><br>
      
      <!-- Voit kertoa vapaasti... -->
      <label class="palaute_label">Mitkä asiat erityisesti vaikuttivat viihtymiseesi 
        (maks. 500 merkkiä)? Tähän vastaaminen ei ole pakollista.</label><br>
      <textarea id="vaikuttivat_viihtymiseen" name="vaikuttivat_viihtymiseen" rows="6" max="500" value="diiba"></textarea><br><br>
    
      <!-- Kuinka paljon suosittelet... -->
      <label class="palaute_label">Kuinka todennäköisesti suosittelisit käyntiä Repoveden 
        kansallispuistossa?*</label><br>

      <input type="radio" id="suosittelen_5" name="suositteletko" value="5" required checked>
      <label for="suosittelen_5">Erittäin todennäköisesti</label><br>
      
      <input type="radio" id="suosittelen_4" name="suositteletko" value="4" required>
      <label for="suosittelen_4">Melko todennäköisesti</label><br>
      
      <input type="radio" id="suosittelen_3" name="suositteletko" value="3" required>
      <label for="suosittelen_3">En tiedä</label><br>
      
      <input type="radio" id="suosittelen_2" name="suositteletko" value="2" required>
      <label for="suosittelen_2">Melko epätodennäköisesti</label><br>
      
      <input type="radio" id="suosittelen_1" name="suositteletko" value="1" required>
      <label for="suosittelen_1">Erittäin epätodennäköisesti</label><br><br>
      
      <!-- Voit kirjoittaa tähän vapaasti... -->
      <label class="palaute_label">Onko muuta? Voit kirjoittaa tähän palautetta ja toiveita 
        Repoveden kansallispuiston palveluista (maks. 1000 merkkiä). 
        Tähän vastaaminen ei ole pakollista.</label><br>
      <textarea id="palautetta_toiveita" name="palautetta_toiveita" rows="12" max="1000" value="daaba"></textarea><br><br>
    
      <!-- Lähetysnappi... -->
      <input type="submit" class="lahetysnappi" name="uusipalaute" value="Lähetä tiedot">
    
    </form>
  
  </div>

</div>

<?php

require_once ("footer.php");

?>
