
<?php
require_once('header_hallinta.php');

//echo '<a href="hallinta_kirjaudu_ulos_kasittelija.php">Kirjaudu ulos</a>';

?>

<!-- SISÄLTÖ -->

<div class="palautekolumni">
  <h2>Repoveden kansallispuiston palautekanava - hallinta</h2>

  <div class="tilastorivi">
    <h3 class="tilasto-otsikko">Palautteita yhteensä: </h3>
  </div>

  <div class="tilastorivi">
    <h3 class="tilasto-otsikko">Näytä kaikki palautteet: </h3>
  </div>

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