<?php include('header.php'); ?>

<br>
<form action="unohtuiko_salasana_vaihdettu.php" method="post">

  <div class="formblock">
    <h2>Forgot Your Password?</h2>

    <p><label for="username">Enter Your Username:</label><br/>
    <input type="text" value="erkkisuokki" name="username" id="username" 
      size="16" maxlength="16" required /></p>

    <button type="submit">Change Password</button>

  </div>
</form>
<br>

<?php include('footer.php'); ?>