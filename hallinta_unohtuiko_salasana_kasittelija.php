<?php
include('header.php');
//require_once("bookmark_fns.php");
//do_html_header("Resetting password");

// creating short variable name
$username = $_POST['username'];

try {
  $password = reset_password($username);
  notify_password($username, $password);
  echo 'Uusi salasana lähetettiin sähköpostiosoitteeseesi. Kirjaudu palveluun ja vaihda salasanasi.<br>';
}
catch (Exception $e) {
  echo 'Salasanaasi ei voitu vaihtaa - yritä myöhemmin uudelleen.';
}
//do_html_url('login.php', 'Login');
//do_html_footer();
include('footer.php');
?>