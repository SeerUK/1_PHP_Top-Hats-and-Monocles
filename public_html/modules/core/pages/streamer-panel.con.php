<?php

  /*
   //
   // Top Hats & Monocles
   // 21/03/2012
   //
   // Elliot Wright
   // modules/core/pages/streamer-panel.con.php
   //
  */
  
  // Stop unauthorised activity:
  if(!$user->data) {
    headerex(ROOT_PATH);
  } elseif($user->data['pgroup'] < 5) {
    headerex(ROOT_PATH);
  }
  
  // This is needed if data is posted too, whereas the rest can wait...:
  $games = array();  
  $q = mysql_query("SELECT * FROM `thnm_games`");
  while($row=mysql_fetch_assoc($q)) {
    $games[] = $row;
  }  

  if(isset($_POST['cp-f-streamid']) && isset($_POST['cp-f-streamer']) && isset($_POST['cp-f-game'])) {
    if(is_numeric($_POST['cp-f-streamid']) && is_numeric($_POST['cp-f-streamer']) && is_numeric($_POST['cp-f-game'])) {
      $streamID = $_POST['cp-f-streamid'];
      $streamerID = $_POST['cp-f-streamer'];
      $gameID = $_POST['cp-f-game'];
      $q = "UPDATE `thnm_streams` SET `game_id`='$gameID', `current_streamer_id`='$streamerID' WHERE (`stream_id`='$streamID')";
      mysql_query($q);
      headerex(ROOT_PATH . "?module=core&pid=strmr-cp");
    }
  }
  
  // Continue:
  $streams = array();
  $q = mysql_query("SELECT * FROM `thnm_streams`");
  while($row=mysql_fetch_assoc($q)) {
    $streams[] = $row;
  }
  
  $streamers = array();
  $q = mysql_query("SELECT * FROM `thnm_user` WHERE (`pgroup` > 4)");
  while($row=mysql_fetch_assoc($q)) {
    $streamers[] = $row;
  }
  
?>