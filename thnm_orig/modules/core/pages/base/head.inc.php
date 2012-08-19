<?php

  /*
   //
   // Iris Mail
   // 13/01/2012
   //
   // Elliot Wright
   // modules/core/pages/base/head.inc.php
   //
  */

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php pID2pT($siteMapVars['pageID'],$siteMapVars['module']); ?> | <?php echo SITE_NAME; ?></title>
  <link rel="stylesheet" href="<?php echo ROOT_PATH . "resources/css/fonts.css"; ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo ROOT_PATH . "resources/css/style.css"; ?>" type="text/css" />
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo ROOT_PATH; ?>resources/js/jquery.overscroll.js"></script>
  <script type="text/javascript" src="<?php echo ROOT_PATH; ?>resources/js/jquery.placeholderfix.js"></script>
  <script type="text/javascript" src="<?php echo ROOT_PATH; ?>resources/js/layout.js"></script>
  <script type="text/javascript" src="<?php echo ROOT_PATH; ?>resources/js/shout.js"></script>
</head>
<body onload="sb_onLoad();">
