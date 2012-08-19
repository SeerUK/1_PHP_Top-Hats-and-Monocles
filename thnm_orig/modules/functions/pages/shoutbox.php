<?php

  /*
   *  
   *  AJAX Shoutbox Test
   *  18/03/2012
   *  Elliot Wright
   *
  */
  
  // Get config and session values:
  include('../../../config.php');
  include('../../../includes/session.php');
  
  function SBprocessTime($timestamp) {
    $tarray = getdate(intval($timestamp));
    $ctarray = getdate(time());
    $tarray = getdate(intval($timestamp));
    if($tarray['minutes'] < 10) {
      $tarray['minutes'] = "0" . $tarray['minutes'];
    }
    if($tarray['hours'] > 12) {
      $tarray['hours'] = $tarray['hours'] - 12;
      $meridiem = "PM";
    } else {
      $meridiem = "AM";
    }
    if($tarray['hours'] < 10) {
      $tarray['hours'] = "0" . $tarray['hours'];
    }
    $time = $tarray['hours'] . ":" . $tarray['minutes'] . $meridiem;
    return $time;
  }
  
  // What to do...
  if($_GET['action'] == "submit") {
    // Assume shoutbox ID is 1 for now....
    $room = 1;
    if(isset($_POST['message'])) {      
      // This will submit messages:
      if(isset($user->data)) {
        $message = $_POST['message'];
        $message = str_replace("&nbsp;"," ",$message);
        $message = str_replace("'","&apos;",$message);
        $message = str_replace('\n',"",$message);
        $message = str_replace('\r',"",$message);
        $message = trim($message);
        if(empty($message)) {
          exit;
        } else {
          $message = str_replace("<","&lt;",$message);
          $message = str_replace(">","&gt;",$message);
          $message = mysql_real_escape_string($message);
          $message = stripslashes($message);
          $message = str_replace(":troll:","<img src=\"" . ROOT_PATH . "resources/img/smiley/troll.png\" alt=\"\" title=\"\" />",$message);
          $userid = $user->data['user_id'];
          $time = time();
          @mysql_query("INSERT INTO `thnm_sb_shouts` (`room_id`, `user_id`, `message`, `timestamp`) VALUES ('$room', '$userid', '$message', '$time')");
        }
      }
    }
  } elseif($_GET['action'] == "get") {
    if(isset($user->data)) {
      if($user->data['pgroup'] > 4) {
        echo "<div style='height: 26px;'></div>";
      }
    }
    echo "<div class='message'><span class='welcome'><em>Welcome to the " . "Top Hats & Monocles" . " room.</em></span></div>";
    // Assume shoutbox ID is 1 for now....
    $room = 1;
    $s = "SELECT thnm_user.user_id, thnm_user.user_name, thnm_user.pgroup, thnm_sb_shouts.shout_id, thnm_sb_shouts.room_id, thnm_sb_shouts.user_id, thnm_sb_shouts.message, thnm_sb_shouts.`timestamp`, thnm_groups.group_id, thnm_groups.group_prefix, thnm_groups.group_suffix
          FROM thnm_user
          INNER JOIN thnm_groups ON thnm_groups.group_id = thnm_user.pgroup
          INNER JOIN thnm_sb_shouts ON thnm_user.user_id = thnm_sb_shouts.user_id
          WHERE thnm_sb_shouts.room_id = '$room'
          ORDER BY thnm_sb_shouts.shout_id DESC
          LIMIT 0, 200";
    $q = mysql_query($s);
    $shouts = array(); // Array to store the shouts...
    while($row=mysql_fetch_assoc($q)) {
      $shouts[] = $row;
    }
    $shouts = array_reverse($shouts);
    foreach($shouts as $row) {
      echo "<div class='message'>";
      if(isset($user->data)) {
        if($user->data['pgroup'] > 4) {
          //if($row['group_id'] < 10) {
            $messageNo = $row['shout_id'];
            echo "<a class='sb-mod-msgcontrols' onClick='sb_deleteMessage($messageNo);' style='cursor: pointer;'><img src='" . ROOT_PATH . "resources/img/trash.png' alt='Delete shout' title'Delete shout' /></a>";
          //}
        }
      }
      echo "<span class='time'>" . SBprocessTime($row['timestamp']) . "</span>";
      echo "<span class='user'>" . $row['group_prefix'] . $row['user_name'] . $row['group_suffix'];
      if($row['group_id'] > 4) {
        echo "&nbsp;<span class='sb-mod'>MOD</span>";
      }
      echo ":</span>";
      echo "<span class='msg'>" . $row['message'] . "</span>";
      echo "</div>";
      echo "<div class='clear'></div>";
    }
    echo "<div style='height: 5px;'></div>";
  } elseif($_GET['action'] == "clear") {
    if(isset($user->data)) {
      if($user->data['pgroup'] > 4) {
        // Assume shoutbox ID is 1 for now....
        $room = 1;
        mysql_query("DELETE FROM `thnm_sb_shouts` WHERE (`room_id`='$room')");
      }
    }
  } elseif($_GET['action'] == "deletemsg") {
    if(isset($user->data)) {
      if($user->data['pgroup'] > 4) {
        // Assume shoutbox ID is 1 for now....
        $room = 1;
        $messageNo = $_GET['msg'];
        mysql_query("DELETE FROM `thnm_sb_shouts` WHERE (`room_id`='$room' AND `shout_id`='$messageNo')");
      }
    }
  } else {
    header("Location: " . ROOT_PATH);
    exit;
  }
  
?>
