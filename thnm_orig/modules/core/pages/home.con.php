<?php

  /*
   //
   // Iris Mail
   // 13/01/2012
   //
   // Elliot Wright
   // modules/core/pages/base/home.con.php
   //
  */

  if(!isset($_GET['sid'])) {
    $streamID = 1;
  } else {
    if(is_numeric($_GET['sid'])) {
      if(stream::checkStreamDB($_GET['sid'])) {
        $streamID = $_GET['sid'];
      } else {
        $streamID = 1;
      }
    } else {
      $streamID = 1;
    }
  }

  if($streamID == 1) {
    $checkLiveChannel = mysql_fetch_assoc(mysql_query("SELECT * FROM `thnm_streams` WHERE (`stream_id` = '1')"));
    if($checkLiveChannel['current_streamer_id'] == 1) {
      $streams = array();
      $results = mysql_query("SELECT * FROM `thnm_streams` WHERE (`stream_id` <> '1')");
      while($row=mysql_fetch_assoc($results)) {
        $streams[$row['stream_id']] = $row;
      }

      foreach($streams as $stream) {
        if($stream['current_streamer_id'] != 1) {
          $streamID = $stream['stream_id'];
          break;
        }
      }
    }
  }

  @flush();
  @ob_flush();

  $sql = "SELECT `stream_views` FROM `thnm_streams` WHERE (`stream_id`='$streamID')";
  $result = mysql_fetch_assoc(mysql_query($sql));
  $increment = intval($result['stream_views']) + 1;
  mysql_query("UPDATE `thnm_streams` SET `stream_views`='$increment' WHERE (`stream_id`='$streamID')");

  class stream {
    function __construct() {
      global $streamID;
      $this->data = $this->streamInfo($streamID);
      $this->data['game'] = $this->gameName($this->data['game_id']);
      $this->data['game_short'] = $this->gameNameShort($this->data['game_id']);
    }
    function streamInfo($streamID) {
      $q = "SELECT * FROM `thnm_streams` WHERE (`stream_id` = '$streamID')";
      $query = mysql_query($q);
      return(mysql_fetch_assoc($query));
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
  }
  $stream = new stream;
  $streamer = new stdClass;
  $siteMapVars['streamName'] = $stream->data['game'];
  if($user->userData($stream->data['current_streamer_id'])) {
    $streamer->data = $user->userData($stream->data['current_streamer_id']);
  }

  $request_url = "http://api.justin.tv/api/stream/list.xml?channel=" . $stream->data['channel_name'];
  $xml = @simplexml_load_file($request_url);
  if($xml->stream) {
    $format = $xml->stream->format;
  } else {
    $format = "offline";
  }

?>
