<?php

  /*
   //
   // Iris Mail
   // 13/01/2012
   //
   // Elliot Wright
   // modules/core/pages/login.main.con.php
   //
  */
  
  // Setup Login Command:
  if($_GET['do'] == 'login') {
    if(isset($_POST['username']) && isset($_POST['password'])) {
      if(!isset($_POST['remember']))  {
        $remember = 0;
      } elseif($_POST['remember'] == "1") {
        $remember = 1;
      } else {
        $remember = 0;
      }
      user::login($_POST['username'],$_POST['password'],$remember);
    }
  }
  // Setup Logout Command:
  if($_GET['do'] == 'logout') {
    user::logout();
  }
  
?>