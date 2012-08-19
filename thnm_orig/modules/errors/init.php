<?php

  /*
   //
   // Iris Mail
   // 13/01/2012
   //
   // Elliot Wright
   // index.php
   //
  */

  $filename = "modules/" . $siteMapVars['module'] . "/pages/" . $siteMapVars['pageID'] . ".con.php" ;
  if(file_exists($filename)) {
    include("modules/" . $siteMapVars['module'] . "/pages/" . $siteMapVars['pageID'] . ".con.php");
  }
  include("modules/" . $siteMapVars['module'] . "/pages/" . $siteMapVars['pageID'] . ".inc.php");
  
?>