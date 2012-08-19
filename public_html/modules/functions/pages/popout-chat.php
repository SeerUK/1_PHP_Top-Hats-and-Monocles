<?php

  /*
   //
   // Top Hats & Monocles
   // 24/03/2012
   //
   // Elliot Wright
   // modules/functions/pages/shoutbox.php
   //
  */
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php pID2pT($siteMapVars['pageID'],$siteMapVars['module']); ?> | <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="<?php echo ROOT_PATH . "resources/css/fonts.css"; ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo ROOT_PATH . "resources/css/sb_popOut-style.css"; ?>" type="text/css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="<?php echo ROOT_PATH; ?>resources/js/jquery.overscroll.js"></script>
    <script type="text/javascript" src="<?php echo ROOT_PATH; ?>resources/js/sb_popOut-layout.js"></script>
    <script type="text/javascript" src="<?php echo ROOT_PATH; ?>resources/js/shout.js"></script>
  </head>
  <body>
    <div id="chat">
      <?php
      
        if(isset($user->data)) {
          if($user->data['pgroup'] > 4) {
            echo "<div id='sb-modcp'><a id='sb-modcp-cleara' onClick='clearChat();'>Clear Chat</a></div>";
          }
        }
      
      ?>
      <div id="messages">
        <div id="loading">Loading messages...</div>
      </div>
      <div class="lines-b2"></div>
      <div id="controls">
        <?php
        
          if(isset($user->data)) {
            
        ?>
        <form method="post" id="sbform">
          <input type="message" autocomplete="off" id="txt_msg" placeholder="Shout..." />
        </form>
        <?php
        
          } else {
        
        ?>
        <span class="plzlogin">You must be logged in to use the shoutbox!</span>
        <?php
        
          }
          
        ?>
      </div>
    </div>
  </body>
</html>