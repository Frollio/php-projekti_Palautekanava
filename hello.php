<?php session_start(); // session avaaminen kannattaa tehd� aivan sivun alussa ?>

<form action="opinahjo.php" method="post">
   <p>Tunnus: <input type="text" name="tunnus"><br>
   Salasana: <input type="password" name="ssana"></p>
   <p><input type="submit" name="kirjaudu" value="Kirjaudu sis��n"></p>
</form>

<?php
if( isset($_POST["kirjaudu"]) ) {
   if(isset($_POST["tunnus"]) && $_POST["tunnus"] != "") { // jos tunnus on asetettu eik� ole tyhj� merkkijono 
      $_SESSION["ktunnus"] = $_POST["tunnus"]; // kopioidaan sivuparametrina tullut tunnus sessioon
   } 
}
if( isset($_SESSION["ktunnus"]) ) {   // pit�� tarkistaa, muuten seuraavalta rivilt� tulee virheilmoitus kun tunnusta ei olekaan asetettu sessioon
   echo "Asetettu tunnus: " . $_SESSION["ktunnus"];
}
?>