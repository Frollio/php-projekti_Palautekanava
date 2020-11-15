<?php require_once('header_hallinta.php'); ?>

<div class="palautekolumni">

  <form method="post" action="hallinta_rekisterointi_kasittelija.php">

  <div class="formblock">
    <h2>Hallinnan rekisteröinti</h2>

    <label for="etunimi" class="palaute_label">Etunimi:</label><br>
    <input type="text" name="etunimi" id="etunimi" 
    value="Erkki" size="16" maxlength="25" required><br>

    <label for="sukunimi" class="palaute_label">Sukunimi:</label><br>
    <input type="text" name="sukunimi" id="sukunimi" 
    value="Suokki" size="16" maxlength="40" required><br>

    <label for="sahkoposti" class="palaute_label">Sähköposti:</label><br>
    <input type="email" name="sahkoposti" id="sahkoposti" 
      value="erkki.suokki@meiliboxi.com" size="30" maxlength="50" required><br>

    <!--<p><label for="kayttajanimi">Käyttäjänimi (maksimimerkkimäärä 50):</label><br/>
    <input type="text" name="kayttajanimi" id="kayttajanimi" 
      value="erkki" size="16" maxlength="16" required /></p>-->

    <label for="salasana" class="palaute_label">Salasana (pituus 6-16 merkkiä):</label><br>
    <input type="password" name="salasana" id="salasana" 
      value="suokki" size="16" minlength="6" maxlength="16" required><br>

    <label for="salasana2" class="palaute_label">Vahvista salasana:</label><br>
    <input type="password" name="salasana2" id="salasana2" 
    value="suokki" size="16" minlength="6" maxlength="16" required><br><br>

    <button type="submit" class="lahetysnappi">Rekisteröidy</button>

   </div>

  </form>

</div>

  <?php include('footer.php'); ?>