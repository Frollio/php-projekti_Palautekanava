
<?php

require_once ("header.php");

?>

<div class="palautekolumni">
<form method="post" action="hallinta_kirjautuminen_kasittelija.php">
  <div class="formblock">

    <h2>Kirjaudu sisään</h2>
    
    <label for="sahkoposti" class="palaute_label">Sähköposti:</label><br/>
    <input type="text" value="erkki.suokki@meiliboxi.fi" name="sahkoposti" id="sahkoposti"><br>

    <label for="salasana" class="palaute_label">Salasana:</label><br/>
    <input type="password" value="mahtisonni" name="salasana" id="salasana"><br><br>

    <button class="lahetysnappi" type="submit">Kirjaudu</button>

    <!--<p><a href="unohtuiko_salasana.php">Unohtuiko salasana?</a></p>-->
    
  </div>
 </form>
</div>

<?php

require_once ("footer.php");

?>
