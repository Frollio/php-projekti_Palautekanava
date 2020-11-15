<?php
include('header.php');
//require_once('bookmark_fns.php');
//session_start();
//do_html_header('Change password');
//check_valid_user();
?>

<br>
<form action="salasana_vaihdettu.php" method="post">

  <div class="formblock">
    <h2>Change Password</h2>

    <p><label for="old_passwd">Old Password:</label><br/>
    <input type="password" value="salasana12" name="old_passwd" id="old_passwd" 
      size="16" maxlength="16" required /></p>

    <p><label for="passwd2">New Password:</label><br/>
    <input type="password" value="salasana13" name="new_passwd" id="new_passwd" 
      size="16" maxlength="16" required /></p>

    <p><label for="passwd2">Repeat New Password:</label><br/>
    <input type="password" value="salasana13" name="new_passwd2" id="new_passwd2" 
      size="16" maxlength="16" required /></p>

    <button type="submit">Change Password</button>

  </div>
</form>
<br>

<?php
//display_password_form();
//display_user_menu();
//do_html_footer();
?>

<?php include('footer.php'); ?>