<?php

  /*
   //
   // Iris Mail
   // 13/01/2012
   //
   // Elliot Wright
   // modules/core/pages/login.main.inc.php
   //
  */
  
?>
<form id="loginform" class="lpagec" method="post" action="?module=login&pid=login&do=login">
  <!-- Header -->
  <h3>Login</h3>
  <?php
    if(errors('login') != false) {
      errors('login');
    }
  ?>
  <!-- Username -->
  <input name="username" type="text" placeholder="username" />
  <?php
    if(errors('username') != false) {
      errors('username');
    }
  ?>
  <!-- Password -->
  <input name="password" type="password" placeholder="password" />
  <?php
    if(errors('password') != false) {
      errors('password');
    }
  ?>
  <!-- Remember Me -->
  <input class="left" name="remember" type="checkbox" checked /><span class="left" id="lf_remember">remember me</span>
  <!-- Submit -->
  <input type="submit" value="Submit" />
  <!-- Forgot Password? -->
  <div><a href="#">forgot password?</a></div>
</form>
