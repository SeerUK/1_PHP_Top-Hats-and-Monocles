<?php

  /*
   //
   // Top Hats & Monocles
   // 21/03/2012
   //
   // Elliot Wright
   // modules/core/pages/register.con.php
   //
  */

  $rgSuccess = false;

  if(isset($user->data)) {
    $rgSuccess = "loggedIn";
  }

  if(isset($_POST['rg-username']) && isset($_POST['rg-email']) && isset($_POST['rg-password']) && isset($_POST['rg-rpassword'])) {

    function userExist($value, $type) {
      if($type=="user") {
        $q = "SELECT * FROM `thnm_user` WHERE (`user_name`='$value')";
        $result = mysql_query($q);
        if(mysql_num_rows($result) > 0) {
          return true;
        } else {
          return false;
        }
      } elseif($type=="email") {
        $q = "SELECT * FROM `thnm_user` WHERE (`email`='$value')";
        $result = mysql_query($q);
        if(mysql_num_rows($result) > 0) {
          return true;
        } else {
          return false;
        }
      } else {
        return false;
      }
    }

    // Grab post values:
    $username = $_POST['rg-username'];
    $email = $_POST['rg-email'];
    $password = $_POST['rg-password'];
    $rpassword = $_POST['rg-rpassword'];


    $error = 0;
    // Validation:
    if(empty($username)) {
      $_SESSION['errors']['rg-username'] = "Username can't be left blank.";
      $error = 1;
    } elseif(strlen($username) > 11) {
      $_SESSION['errors']['rg-username'] = "Username length can't exceed 11 characters.";
      $error = 1;
    } elseif(userExist($username,"user")) {
      $_SESSION['errors']['rg-username'] = "That username is already taken.";
      $error = 1;
    }

    if(empty($email)) {
      $_SESSION['errors']['rg-email'] = "E-Mail address can't be left blank.";
      $error = 1;
    } elseif(!validEmail($email)) {
      $_SESSION['errors']['rg-email'] = "E-Mail address must be a valid email address.";
      $error = 1;
    } elseif(userExist($email,"email")) {
      $_SESSION['errors']['rg-email'] = "That email addrress is already in use.";
      $error = 1;
    }

    if(empty($password)) {
      $_SESSION['errors']['rg-password'] = "Password can't be left blank.";
      $error = 1;
    } elseif($password != $rpassword) {
      $_SESSION['errors']['rg-password'] = "Passwords must match.";
      $error = 1;
    }

    if(empty($rpassword)) {
      $_SESSION['errors']['rg-rpassword'] = "Repeated password can't be left blank.";
      $error = 1;
    }

    if($error == 0) {

      // If validation has passed, continue:
      $username = mysql_real_escape_string($username);
      $username = stripcslashes($username);
      $username = stripslashes($username);
      $email = mysql_real_escape_string($email);
      $email = stripcslashes($email);
      $email = stripslashes($email);
      $password = mysql_real_escape_string($password);
      $password = stripcslashes($password);
      $password = stripslashes($password);
      $password = hash('sha256',$password);
      $joined = time();
      // Query
      $q = "INSERT INTO `thnm_user` (`user_name`, `email`, `email_verified`, `password`, `joined`, `time_offset`, `time_dst`, `pgroup`) VALUES ('$username', '$email', '1', '$password', '$joined', '0', '0', '1')";
      mysql_query($q);

      $rgSuccess = "true";

    }

  }

?>
