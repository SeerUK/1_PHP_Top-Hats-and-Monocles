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

  $filename = "modules/" . $siteMapVars['module'] . "/pages/" . $siteMapVars['pTemplate'] . ".con.php" ; 
  if(file_exists($filename)) {
    include("modules/" . $siteMapVars['module'] . "/pages/" . $siteMapVars['pTemplate'] . ".con.php");
  }
  // Initialize breadcrumbs properly:
  breadcrumbs($siteMapVars['pageID'],$siteMapVars['module']);
  // Include other pages :
  include("modules/" . $siteMapVars['module'] . "/pages/" . "base/head.inc.php");
  include("modules/" . $siteMapVars['module'] . "/pages/" . "base/header.inc.php");
  include("modules/" . $siteMapVars['module'] . "/pages/" . $siteMapVars['pTemplate'] . ".inc.php");
  include("modules/" . $siteMapVars['module'] . "/pages/" . "base/footer.inc.php");
  
?>