<?php

  /*
   //
   // Top Hats & Monocles
   // 21/03/2012
   //
   // Elliot Wright
   // modules/core/pages/register.inc.php
   //
  */
  
  $streamID = 0;  
  
?>
<div id="ostream">
  <h2>Register</h2>
  <p>To get the full functionality of Top Hats & Monocles register now! As soon as you register you'll be able to chat, there'll be more features coming shortly including the forum. (Don't worry, registration is really quick, you don't have to verify your email address!)</p>
  <div id="scp-controls">
    <?php
    
      if($rgSuccess == false) {
        
    ?>
      <form method="post" id="rg-form">
        <div>
          <span class="label">Username:</span>
          <input type="text" name="rg-username" />
          <span class="rg-error">
          <?php
          
            if(errors('rg-username')) {
              errors('rg-username');
            }
          
          ?>
          </span>
          <span class="desc">(NOTE: Usernames must be 11 characters or less)</span>
        </div>
        <div>
          <span class="label">E-Mail:</span>
          <input type="text" name="rg-email" />
          <span class="rg-error">
          <?php
          
            if(errors('rg-email')) {
              errors('rg-email');
            }
          
          ?>
          </span>
        </div>
        <div>
          <span class="label">Password:</span>
          <input type="password" name="rg-password" />
          <span class="rg-error">
          <?php
          
            if(errors('rg-password')) {
              errors('rg-password');
            }
          
          ?>
          </span>
        </div>
        <div>
          <span class="label">Repeat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password:</span>
          <input type="password" name="rg-rpassword" />
          <span class="rg-error">
          <?php
          
            if(errors('rg-rpassword')) {
              errors('rg-rpassword');
            }
          
          ?>
          </span>
        </div>
        <div>
          <input type="submit" value="Register" id="rg-submit" />
        </div>
      </form>
    <?php
    
      } elseif($rgSuccess == "true") {    
    
    ?>
    <h2 style="width: 100%; text-align: center;">Registration Successful</h2>
    <?php
    
      } elseif($rgSuccess == "loggedIn") {
    
    ?>
    <h2 style="width: 100%; text-align: center;">You're already logged in!</h2>
    <?php    
      
      }
      
    ?>
  </div>
</div>