<?php

  /*
   //
   // Top Hats & Monocles
   // 21/03/2012
   //
   // Elliot Wright
   // modules/core/pages/streamer-panel.inc.php
   //
  */
  
?>
<div id="ostream">
  <h2>Streamer Control Panel</h2>
  <div style="font-size: 12px; padding: 0 20px;">
    <p>Welcome to the streamer control panel, from here you can control the status of all of the streams currently in our database.</p>
    <p>I'm trusting streamers with the control of all of this so don't let me down. There are only 3 rules but they're important, I'll explain why when I list them:</p>
    <ol>
      <li>Only change a stream if it is offline, or if you are taking over from someone else and they know you are changing it.
      <br /><em>Obviously this is because otherwise it just causes confusion and arguements.</em></li>
      <li>If a stream is offline but isn't set back to offline in this control panel, then <strong>PLEASE</strong> change it to offline in here.
      <br /><em>This is because the homepage uses this database to make sure when someone vists the site homepage they will always see a stream that is live if there is one at all. If stream 1 isn't online then it will find the first stream set as anything but offline in here and then load that instead.</em></li>
      <li>Finally, I want to try keep a professional way of running this site, so, if you're switching games then it'd be great if you chose your game from the options here, obviously selecting 'Other Game' if your game isn't listed.</li>
    </ol>
    <div id="scp-controls">
      <?php
      
        foreach($streams as $cpStream) {
        ?>
        
        <form method="post">
        
          <?php echo "<span class='scp-label'>Stream " . $cpStream['stream_id'] . ": </span>"; ?>
      
          <input type="hidden" name="cp-f-streamid" value="<?php echo $cpStream['stream_id']; ?>" />    
      
          <select name="cp-f-streamer">
            <?php
              
              foreach ($streamers as $streamer) {
                echo "<option value='" . $streamer['user_id'] . "'";
                if($cpStream['current_streamer_id'] == $streamer['user_id'])  {
                  echo " selected>";
                } else {
                  echo ">";
                }
                echo $streamer['user_name'] . "</option>";
              }
              
            ?>
          </select>
          
          <select name="cp-f-game">
            <?php
              
              foreach ($games as $game) {
                echo "<option value='" . $game['game_id'] . "'";
                if($cpStream['game_id'] == $game['game_id'])  {
                  echo " selected>";
                } else {
                  echo ">";
                }
                echo $game['game_name'] . "</option>";
              }
              
            ?>
          </select>
          
          <input type="submit" value="Update" />
        </form>
        
        <?php
        }
      
      ?>
    </div>
    <p><em>(NOTE: The list you see on the left of this page contains the streams that are currently live, it will not show any that are offline even if set otherwise here.)</em></p>
  </div>
</div>