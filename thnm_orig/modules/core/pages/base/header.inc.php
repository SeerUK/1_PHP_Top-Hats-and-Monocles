<?php

  /*
   //
   // Top Hats & Monocles
   // 13/01/2012
   //
   // Elliot Wright
   // modules/core/pages/base/header.inc.php
   //
  */
  
  if(!isset($streamID)) {
    $streamID = 0;
  }
  
?>
<div id="minHeight"></div>
<div id="ml-content">
  <div id="ml-left">
    <nav>
      <ul id="primary-nav">
        <li><a href="<?php echo ROOT_PATH; ?>">Home</a></li>
        <li><a href="<?php echo ROOT_PATH; ?>?module=forum&pid=home">Forum</a></li>
        <li><a href="#">Streamers</a></li>
        <li><a href="<?php echo ROOT_PATH; ?>?module=core&pid=register">Register</a></li>
      </ul>
    </nav>
    <div id="livestreams">
      <?php
      
        if($siteMapVars['module'] == "core" && $siteMapVars['pageID'] == "home") {
          
      ?>
      <div class="oborder1">
        <div class="iborder1">
          <div class="mn-stream">
            <span class="title">
              <?php
              
                $gi = groupInfo($streamer->data['pgroup']);
                echo $gi['group_prefix'];
                echo user::userid2n($streamer->data['user_id']);
                echo $gi['group_suffix'];
                
              ?>
            </span>
            <span class="desc"><?php echo $stream->data['game']; ?></span>
            <span class="vwrcnt"><span id="mn-l-vwrcnt">Loading viewers...</span></span>
            <img src="<?php echo ROOT_PATH; ?>resources/img/games/<?php echo $stream->data['game_short']; ?>.jpg" />
          </div>
        </div>
      </div>
      <?php
      
        }
        
      ?>
      <!-- Other streams start here -->
      <div id="now-live">
        
      </div>
      <script language="javascript" type="text/javascript">

          // Current stream viewer count:
          $("#now-live").load('?module=functions&pid=fn-livestreams&sid=<?php echo $streamID; ?>');
          // Auto refresh:
          var refreshId = setInterval(function() {
            $("#now-live").load('?module=functions&pid=fn-livestreams&sid=<?php echo $streamID; ?>');
          }, 60000);  
        
      </script>
      <!-- Other streams end here -->
    </div>
    <div id="footer">
      <div class="lines-b"></div>
      <span>Copyright &copy; 2012 Top Hats & Monocles</span>
      <span class="desc">Part of the Unknown Degree Network</span>
      <span class="desc">(<a href="http://www.unknown-degree.net">www.unknown-degree.net</a>)</span>
      <div class="lines-b"></div>
    </div>
  </div>
  <div id="ml-right">
    <div class="oborder1">
      <?php
      
        if(!isset($user->data)) {
          
      ?>
      <form id="loginform" method="post" action="?module=login&pid=login&do=login">
        <?php
        
          // Login errors:
          if(isset($_SESSION['errors']['login']) || isset($_SESSION['errors']['username']) || isset($_SESSION['errors']['password'])) {
            echo "<div id='lf-errors'>";
              echo "<img src='" . ROOT_PATH . "resources/img/point.png' />";
              if(errors('login')) {
                errors('login');
              }
              if(errors('username')) {
                errors('username');
              }
              if(errors('password')) {
                errors('password');
              }
            echo "</div>";
          }
          
        ?>
        <!-- Username -->
        <input name="username" type="text" placeholder="username" />
        <!-- Password -->
        <input name="password" type="password" placeholder="password" />
        <!-- Remember Me -->
        <input class="left" name="remember" type="hidden" value="1" />
        <!-- Submit -->
        <input type="submit" value="go" />
      </form>
      <?php
      
        } else {
          
      ?>
      <div id="user-box">
        <img src="<?php echo user::displayAvatar($user->data['user_id']); ?>" />
        <span id="name">
          <?php
                    
            $gi = groupInfo($user->data['pgroup']);
            echo $gi['group_prefix'];
            echo $user->data['user_name'];
            echo $gi['group_suffix'];
            
          ?>
        </span>
        <span id="account">My Account</span>
        <span id="logout"><a href="<?php echo ROOT_PATH; ?>?module=login&pid=login&do=logout">Logout</a></span>
      </div>
      <?php
      
        }
    
      ?>
    </div>
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
          <a id="sb-popout-a" onClick="sb_popOut();"></a>
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
  </div>
  <div id="ml-centre">
    <div id="ml-middle" class="clear">
      <h1><span>Top Hats & Monocles</span></h1>
      <div class="secondary_navigation clear">
        <?php
        
          if(isset($user->data)) {
            if($user->data['pgroup'] > 4) {
            
        ?>
            <div class="right" style="margin-right: 10px;"><a href="<?php echo ROOT_PATH; ?>?module=core&pid=strmr-cp">Streamer Panel</a></div>
        <?php
          
            }
          }
          
          $count = 0;
          echo "<ul class='breadcrumb left'>";
          echo "<li class='first'><a href='" . ROOT_PATH . "'><span>" . SITE_NAME . "</span></a></li>";
          while($count <= $rFoundLevel) {
            if($count == $rFoundLevel) {
              echo "<li><span>" . $crumbs[$count]["title"] . "</span></li>";
            } else {
              echo "<li><a href='" . ROOT_PATH . $crumbs[$count]["url"] . "'><span>" . $crumbs[$count]["title"] . "</span></a></li>";
            }
            $count = $count + 1;
          }
          echo "</ul>";
        
        ?>
      </div>