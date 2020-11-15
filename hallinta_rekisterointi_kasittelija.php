
<?php
require_once('funktiot/funktiot.php');
session_start();

$etunimi=$_POST['etunimi'];
$sukunimi=$_POST['sukunimi'];
$sahkoposti=$_POST['sahkoposti'];
/*$kayttajatunnus=$_POST['kayttajatunnus'];*/
$salasana=$_POST['salasana'];
$salasana2=$_POST['salasana2'];

try {
// check forms filled in
if (!filled_out($_POST)) {
throw new Exception('You have not filled the form out correctly –
please go back and try again.');
}

// email address not valid
if (!valid_email($sahkoposti)) {
throw new Exception('That is not a valid email address.
Please go back and try again.');
}

// passwords not the same
if ($salasana != $salasana2) {
throw new Exception('The passwords you entered do not match –
please go back and try again.');
}

// check password length is ok
/* ok if username truncates, but passwords will get
munged if they are too long. */
if ((strlen($salasana) < 6) || (strlen($salasana) > 16)) {
throw new Exception('Your password must be between 6 and 16 characters.
Please go back and try again.');
}

// Rekisteröinti. Voi heittää Exceptionin.
rekisteroi($kayttajatunnus, $sahkoposti, $salasana);
// Tallennetaan käyttäjä sessiomuuttujaan.
$_SESSION['valid_user'] = $username;

// provide link to members page
echo '<h2>Rekisteröinti onnistui</h2>';
echo 'Onneksi olkoon! Rekisteröintisi onnistui.';
}

catch (Exception $e) {
do_html_header('Problem:');
echo $e->getMessage();
//do_html_footer();
exit;
}

include('footer.php');
?>