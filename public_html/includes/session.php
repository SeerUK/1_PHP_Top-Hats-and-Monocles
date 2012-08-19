<?php

  /*
   //
   // Iris Mail
   // 13/01/2012
   //
   // Elliot Wright
   // functions/functions_user.php
   //
  */
  
  session_start();
  // User Class:
  class user {
    function __construct() {
      $session = $this->checkSession();
      if($session == 1) {
        $user_id = $this->usern2id($_SESSION['username']);
        $this->data = $this->userData($user_id);
      }
    }
    function checkSession() {
      if(isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['hash'])) {
        return $this->checkCredentials($_SESSION['username'],$_SESSION['password'],$_SESSION['hash']);
      } elseif(isset($_COOKIE['thnmuc_kj4i9']) && isset($_COOKIE['thnmpc_oiju8']) && isset($_COOKIE['thnmhc_i3u4h'])) {
        $session = $this->checkCredentials($_COOKIE['thnmuc_kj4i9'],$_COOKIE['thnmpc_oiju8'],$_COOKIE['thnmhc_i3u4h']);
        if($session == 1) {
          $_SESSION['username'] = $_COOKIE['thnmuc_kj4i9'];
          $_SESSION['password'] = $_COOKIE['thnmpc_oiju8'];
          $_SESSION['hash'] = $_COOKIE['thnmhc_i3u4h'];
          return 1;
        } else {
          return false;
        }
      } else {
        return false;
      }
    }
    function checkCredentials($user_name, $password, $hash) {
      $query = mysql_query("SELECT * FROM `" . MYSQL_PREFIX . "user` WHERE (`user_name` = '$user_name') AND (`password` = '$password') AND (`session_id` = '$hash') LIMIT 1");
      return mysql_num_rows($query);
    }
    function usern2id($user_name) {
      $query = mysql_query("SELECT * FROM `" . MYSQL_PREFIX . "user` WHERE (`user_name` = '$user_name')");
      $result = mysql_fetch_assoc($query);
      return $result['user_id'];
    }
    static function userid2n($user_id, $presuf = false) {
      if($presuf == false) {
        $query = mysql_query("SELECT * FROM `" . MYSQL_PREFIX . "user` WHERE (`user_id` = '$user_id')");
        $result = mysql_fetch_assoc($query);
        return $result['user_name'];
      } else {
        $query = mysql_query("SELECT thnm_user.user_id, thnm_user.session_id, thnm_user.user_name, thnm_user.email, thnm_user.email_verified, thnm_user.`password`, thnm_user.joined, thnm_user.last_active, thnm_user.ip_address, thnm_user.time_offset, thnm_user.time_dst, thnm_user.pgroup, thnm_user.ogroup, thnm_groups.group_id, thnm_groups.group_name, thnm_groups.group_prefix, thnm_groups.group_suffix FROM thnm_groups INNER JOIN thnm_user ON thnm_user.pgroup = thnm_groups.group_id WHERE thnm_user.user_id = '2'");
        $result = mysql_fetch_assoc($query);
        return $result['group_prefix'] . $result['user_name'] . $result['group_suffix']; 
      }
    }
    function userData($user_id) {
      $query = mysql_query("SELECT * FROM `" . MYSQL_PREFIX . "user` WHERE (`user_id` = '$user_id')");
      return mysql_fetch_assoc($query);
    }
    function login($username,$password,$remember) {    
      global $user;
      // Validation of Input Variables:
      $username = stripslashes($username);
      $username = mysql_real_escape_string($username);
      $password = stripslashes($password);
      $password = mysql_real_escape_string($password);
      if($username == "" || $password == "") {
        if($username == "") {
          // Error handling...
          $_SESSION['errors']['username'] = "Username can't be left blank";
        }
        if($password == "") {
          // Error handling...
          $_SESSION['errors']['password'] = "Password can't be left blank";
        }
        headerex(ROOT_PATH);
      } else {
        // See if credentials match:
        $password = hash('sha256',$password);
        $sql = "SELECT * FROM `" . MYSQL_PREFIX . "user` WHERE (`user_name` = '$username') AND (`password` = '$password')";
        $query = mysql_query($sql);
        $result = mysql_fetch_assoc($query);
        if(!$result) {
          // Error handling...
          $_SESSION['errors']['login'] = "Invalid user credentials entered";
          headerex(ROOT_PATH);
        } else {
          $hash = hash('sha256',rand(5, 15));
          $user_id = $user->usern2id($username);
          $sql = "UPDATE `" . MYSQL_PREFIX . "user` SET `session_id`='$hash' WHERE (`user_id`='$user_id')";
          mysql_query($sql);
          // Create Session Variables:
          $_SESSION['username'] = $username;
          $_SESSION['password'] = $password;
          $_SESSION['hash'] = $hash;
          //var_dump($_SESSION);
          if($remember == 1) {
            // Set cookie expiration time:
            $expire = time()+60*60*24*30*12*10;
            setcookie('thnmuc_kj4i9',$username,$expire);
            setcookie('thnmpc_oiju8',$password,$expire);
            setcookie('thnmhc_i3u4h',$hash,$expire);
          }
          headerex(ROOT_PATH);
        }
      }
    }
    static function displayAvatar($userID) {
      $exists = 0;
      $filename = DOCUMENT_ROOT . "uploads/avatar/av-" . $userID . "."; // Needs extension and loop.
      $extension = array("gif","jpg","jpeg","png","bmp");
      foreach($extension as $ext) {
        if(file_exists($filename . $ext)) {
          $exists = 1;
          return ROOT_PATH . 'uploads/avatar/av-' . $userID . '.' . $ext;
        }
      }
      if($exists == 0) {
        return ROOT_PATH . 'uploads/avatar/default.gif';
      }
    }
    function logout() {
      session_destroy();
      setcookie('thnmuc_kj4i9',null,time()-1);
      setcookie('thnmpc_oiju8',null,time()-1);
      setcookie('thnmhc_i3u4h',null,time()-1);
      headerex(ROOT_PATH);
    }
  }
  $user = new user;
  
  // Here because of the shoutbox:
  function groupInfo($groupID) {
    $q = mysql_query("SELECT * FROM `thnm_groups` WHERE (`group_id` = '$groupID')");
    return mysql_fetch_assoc($q);
  }
  
?>
