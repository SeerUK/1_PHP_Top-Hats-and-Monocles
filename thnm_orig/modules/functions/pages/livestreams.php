<?php

  /*
   //
   // Top Hats & Monocles
   // 13/01/2012
   //
   // Elliot Wright
   // modules/functions/pages/livestreams.php
   //
  */
  if(!isset($_GET['sid'])) {
    headerex("Location:" . ROOT_PATH);
  }
  
  function checkStreamDB($streamID) {
    $q = "SELECT * FROM `thnm_streams` WHERE (`stream_id` = '$streamID')";
    $query = mysql_query($q);
    if(mysql_num_rows($query) > 0) {
      return true;
    } else {
      return false;
    }
  }

  function gameName($gameID) {
    $q = "SELECT * FROM `thnm_games` WHERE (`game_id` = '$gameID')";
    $query = mysql_query($q);
    $result = mysql_fetch_assoc($query);
    return $result['game_name'];
  }
  function gameNameShort($gameID) {
    $q = "SELECT * FROM `thnm_games` WHERE (`game_id` = '$gameID')";
    $query = mysql_query($q);
    $result = mysql_fetch_assoc($query);
    return $result['game_short'];
  }  
  
  if(!isset($_GET['sid'])) {
    $streamID = 1;
  } else {
    if(is_numeric($_GET['sid'])) {
      $streamID = $_GET['sid'];
    } else {
      $streamID = 1;
    }
  }
  
  $streams = array();
  $results = mysql_query("SELECT * FROM `thnm_streams` WHERE (`stream_id` <> '$streamID')");
  while($row=mysql_fetch_assoc($results)) {
    $streams[$row['stream_id']] = $row;
  }
  
  foreach($streams as $stream) {

    $stream['game'] = gameName($stream['game_id']);
    $stream['game_short'] = gameNameShort($stream['game_id']);
  
    // Get user data for current streamer:
    $streamer = new stdClass;
    $streamer->data = $user->userData($stream['current_streamer_id']);
    // Grab XML from Twitch.tv
    $request_url = "http://api.justin.tv/api/stream/list.xml?channel=" . $stream['channel_name'];
    $xml = @simplexml_load_file($request_url);
    // Check if the stream is live:
    if($xml->stream) {
      
    ?>
      <div class="lc-stream">
        <a class="stsn" href="<?php echo ROOT_PATH . "?sid=" . $stream['stream_id']; ?>"></a>
        <span class="title">
        <?php
        
          $gi = groupInfo($streamer->data['pgroup']);
          echo $gi['group_prefix'];
          echo $streamer->data['user_name'];
          echo $gi['group_suffix'];
          
        ?>
        </span>
        <span class="desc"><?php echo $stream['game']; ?></span>
        <span class="vwrcnt"><?php echo $xml->stream->channel_count; ?> Viewers</span>
        <img src="<?php echo ROOT_PATH; ?>resources/img/games/<?php echo $stream['game_short']; ?>.jpg" />
      </div>
    <?php
    
      @flush();
      @ob_flush();
    
    }
  }
  
?>
