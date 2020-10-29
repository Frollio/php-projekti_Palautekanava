<?php session_start(); // session avaaminen kannattaa tehdä aivan sivun alussa ?>

<form action="opinahjo.php" method="post">
   <p>Tunnus: <input type="text" name="tunnus"><br>
   Salasana: <input type="password" name="ssana"></p>
   <p><input type="submit" name="kirjaudu" value="Kirjaudu sisään"></p>
</form>

<?php
if( isset($_POST["kirjaudu"]) ) {
   if(isset($_POST["tunnus"]) && $_POST["tunnus"] != "") { // jos tunnus on asetettu eikä ole tyhjä merkkijono 
      $_SESSION["ktunnus"] = $_POST["tunnus"]; // kopioidaan sivuparametrina tullut tunnus sessioon
   } 
}
if( isset($_SESSION["ktunnus"]) ) {   // pitää tarkistaa, muuten seuraavalta riviltä tulee virheilmoitus kun tunnusta ei olekaan asetettu sessioon
   echo "Asetettu tunnus: " . $_SESSION["ktunnus"];
}
?>