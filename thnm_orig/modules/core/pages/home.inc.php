<?php

  /*
   //
   // Iris Mail
   // 13/01/2012
   //
   // Elliot Wright
   // modules/core/pages/home.inc.php
   //
  */

?>
<div id="ostream">
  <div id="streambox">
    <object type="application/x-shockwave-flash" height="100%" width="100%" id="live_embed_player_flash" data="http://www.twitch.tv/widgets/live_embed_player.swf?channel=<?php echo $stream->data['channel_name']; ?>" bgcolor="#000000">
      <param name="allowFullScreen" value="true" />
      <param name="allowScriptAccess" value="always" />
      <param name="allowNetworking" value="all" />
      <param name="movie" value="http://www.twitch.tv/widgets/live_embed_player.swf" />
      <param name="flashvars" value="hostname=www.twitch.tv&channel=<?php echo $stream->data['channel_name']; ?>&auto_play=true&start_volume=25" />
    </object>

  <!--<iframe src="https://www.tophatsandmonocles.net/stream.htm" id="live_embed_player_flash"></iframe>-->
  </div>
  <div id="streaminfo">
    <span id="si-game"><?php echo $stream->data['game']; ?></span>
    <span id="si-livefor">Loading status...</span>
    <span id="si-totalvws"><?php echo number_format(intval($stream->data['stream_views'])); ?> total views</span>
    <img id="game-img" src="<?php echo ROOT_PATH; ?>resources/img/games/<?php echo $stream->data['game_short']; ?>.jpg" />
    <span id="si-streamer"><?php echo user::userid2n($streamer->data['user_id']); ?></span>
    <span id="si-joined">Joined <?php echo date('jS F Y',$streamer->data['joined']); ?></span>
    <span id="si-vwrcnt"><span id="dyn-si-vwrcnt">Loading viewers...</span></span>
    <img id="streamer-img" src="<?php echo user::displayAvatar($streamer->data['user_id']); ?>" />
  </div>
</div>
<script language="javascript" type="text/javascript">

    $("#dyn-si-vwrcnt").load('?module=functions&pid=fn-vwrcnt&sid=<?php echo $streamID; ?>&check=vwrcnt');
    $("#si-livefor").load('?module=functions&pid=fn-vwrcnt&sid=<?php echo $streamID; ?>&check=format');
    // Auto refresh:
    var refreshId = setInterval(function() {
      $("#dyn-si-vwrcnt").load('?module=functions&pid=fn-vwrcnt&sid=<?php echo $streamID; ?>&check=vwrcnt');
      $("#si-livefor").load('?module=functions&pid=fn-vwrcnt&sid=<?php echo $streamID; ?>&check=format');
    }, 60000);

</script>
