<?php

require_once('db_fns.php');


function register($username, $email, $password) {
  // register new person with db
  // return true or error message

  $conn = db_connect();
  
  // check if username is unique
  $result = $conn->query("select * from user where username='".$username."'");
  if (!$result) {
    throw new Exception('Could not execute query');
  }
  
  if ($result->num_rows>0) {
    throw new Exception('That username is taken - go back and choose another one.');
  }
  
  // if ok, put in db
  $password_hash = hash("sha256", $password); // Salasanasta tehdään sha256-tiiviste
  $result = $conn->query("insert into user values
                        ('".$username."', '".$password_hash."', '".$email."')");
  if (!$result) {
    throw new Exception('Could not register you in database - please try again later.');
  }
  
  return true;
}


function login($username, $password) {
  // Tarkista sähköposti ja salasana

  $conn = db_connect();
  
  // check if username is unique
  $password_hash = hash("sha256", $password);
  $result = $conn->query("SELECT * FROM adminit
                          WHERE sahkoposti='$username'
                          AND salasana=0x$password_hash");
    
  // Jos kysely ei onnistunut
  if (!$result) {
     throw new Exception('Kysely ei onnistunut.<br><br>');
  }
  
  if ($result->num_rows>0) { // Jos kysely palautti enemmän kuin 0 riviä
     return true;
  } else {
     throw new Exception('Kysely ei palauttanut mitään.<br><br>');
  }
}


function is_logged_in() {
  // see if somebody is logged in
    if (isset($_SESSION['valid_user']))  {
        return true;
        //echo "Logged in as ".$_SESSION['valid_user'].".<br>";
    } else {
       // they are not logged in
       //do_html_header('Problem:');
       //echo 'You are not logged in.<br>';
       //('login.php', 'Login');
       //do_html_footer();
       return false;
    }
}

// TARKISTETAAN KÄYTTÄJÄ, TULOSTETAAN: "KIRJAUTUNUT SISÄÄN"
function check_valid_user() {
  // see if somebody is logged in and notify them if not
    if (isset($_SESSION['valid_user']))  {
        echo "Logged in as ".$_SESSION['valid_user'].".<br>";
    } else {
       // they are not logged in
       //do_html_header('Problem:');
       echo 'You are not logged in.<br>';
       //('login.php', 'Login');
       //do_html_footer();
       exit;
    }
}


function change_password($username, $old_password, $new_password) {
  // change password for username/old_password to new_password
  // return true or false
  
    // if the old password is right
    // change their password to new_password and return true
    // else throw an exception
    login($username, $old_password);
    $conn = db_connect();
    $new_password_hash = hash("sha256", $password); // Salasanasta tehdään sha256-tiiviste
    $result = $conn->query("update user
                            set passwd = '".$new_password_hash."'
                            where username = '".$username."'");
    if (!$result) {
      throw new Exception('Password could not be changed.');
    } else {
      return true;  // changed successfully
    }
}


function get_random_word($min_length, $max_length) {
  // grab a random word from dictionary between the two lengths
  // and return it
  
     // generate a random word
    $word = '';
    // remember to change this path to suit your system
    $dictionary = '/usr/dict/words';  // the ispell dictionary
    $fp = @fopen($dictionary, 'r');
    if(!$fp) {
      return false;
    }
    $size = filesize($dictionary);
  
    // go to a random location in dictionary
    $rand_location = rand(0, $size);
    fseek($fp, $rand_location);
  
    // get the next whole word of the right length in the file
    while ((strlen($word) < $min_length) || (strlen($word)>$max_length) || (strstr($word, "'"))) {
       if (feof($fp)) {
          fseek($fp, 0);        // if at end, go to start
       }
       $word = fgets($fp, 80);  // skip first word as it could be partial
       $word = fgets($fp, 80);  // the potential password
    }
    $word = trim($word); // trim the trailing \n from fgets
    return $word;
}


function reset_password($username) {
  // set password for username to a random value
  // return the new password or false on failure
    // get a random dictionary word b/w 6 and 13 chars in length
    $new_password = get_random_word(6, 13);
  
    if($new_password == false) {
      // give a default password
      $new_password = "changeMe!";
    }
  
    // add a number  between 0 and 999 to it
    // to make it a slightly better password
    $rand_number = rand(0, 999);
    $new_password .= $rand_number;
  
    // set user's password to this in database or return false
    $conn = db_connect();
    $new_password_hash = hash("sha256", $password); // Salasanasta tehdään sha256-tiiviste
    $result = $conn->query("update user
                            set passwd = sha256('".$new_password_hash."')
                            where username = '".$username."'");
    if (!$result) {
      throw new Exception('Could not change password.');  // not changed
    } else {
      return $new_password;  // changed successfully
    }
}


/*function notify_password($username, $password) {
// notify the user that their password has been changed

    $conn = db_connect();
    $result = $conn->query("select email from user
                            where username='".$username."'");
    if (!$result) {
      throw new Exception('Could not find email address.');
    } else if ($result->num_rows == 0) {
      throw new Exception('Could not find email address.');
      // username not in db
    } else {
      $row = $result->fetch_object();
      $email = $row->email;
      $from = "From: support@phpbookmark \r\n";
      $mesg = "Your PHPBookmark password has been changed to ".$password."\r\n"
              ."Please change it next time you log in.\r\n";

      if (mail($email, 'PHPBookmark login information', $mesg, $from)) {
        return true;
      } else {
        throw new Exception('Could not send email.');
      }
    }
}*/

?>
