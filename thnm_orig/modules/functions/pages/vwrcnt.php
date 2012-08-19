<?php

  /*
   //
   // Top Hats & Monocles
   // 21/03/2012
   //
   // Elliot Wright
   // modules/functions/pages/vwrcnt.php
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

  if(!isset($_GET['sid'])) {
    $streamID = 1;
  } else {
    if(is_numeric($_GET['sid'])) {
      if(checkStreamDB($_GET['sid'])) {
        $streamID = $_GET['sid'];
      } else {
        $streamID = 1;
      }
    } else {
      $streamID = 1;
    }
  }
  // Check stream viewer count:
  if($_GET['check'] == "vwrcnt") {  

    $q = "SELECT * FROM `thnm_streams` WHERE (`stream_id` = '$streamID')";
    $query = mysql_query($q);
    $streaminfo = mysql_fetch_assoc($query);  
    
    $request_url = "http://api.justin.tv/api/stream/list.xml?channel=" . $streaminfo['channel_name'];
    $xml = @simplexml_load_file($request_url);
    if($xml->stream) {
      $vwrcnt = number_format(intval($xml->stream->channel_count)) . " viewers";
    } else {
      $vwrcnt = "offline";
    }
    
    echo $vwrcnt;
  
  }
  // Check if stream is live:
  if($_GET['check'] == "format") {
    
    $q = "SELECT * FROM `thnm_streams` WHERE (`stream_id` = '$streamID')";
    $query = mysql_query($q);
    $streaminfo = mysql_fetch_assoc($query);    
    
    $request_url = "http://api.justin.tv/api/stream/list.xml?channel=" . $streaminfo['channel_name'];
    $xml = @simplexml_load_file($request_url);
    if($xml->stream) {
      $format = $xml->stream->format;
    } else {
      $format = "offline";
    }
    
    echo "Status: " . $format;    
    
  }
  
?>