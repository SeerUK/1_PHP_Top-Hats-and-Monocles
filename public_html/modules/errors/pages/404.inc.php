<?php

  /*
   //
   // Iris Mail
   // 13/01/2012
   //
   // Elliot Wright
   // modules/errors/pages/404.inc.php
   //
  */

?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php pID2pT($siteMapVars['pageID'],$siteMapVars['module']); ?> | <?php echo SITE_NAME; ?></title>
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold">
  <link rel="stylesheet" href="<?php echo ROOT_PATH . "modules/" . $siteMapVars['module'] . "/resources/css/style.css"; ?>">
  <script src="<?php echo ROOT_PATH . "modules/" . $siteMapVars['module'] . "/resources/js/libs/modernizr.js"; ?>"></script>
</head>
<body>
  <div id="container">
    <div id="main" role="main">
      <h1>ooops...</h1>
      <h2>It seems the page you were looking for doesn't exist</h2>
      <h3>Four oh four...</h3>
      <div id="button"></div>
    </div>
    <footer>
      <nav>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Forums</a></li>
        </ul>
      </nav>
    </footer>
  </div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  <script>window.jQuery || document.write("<script src='resources/js/libs/jquery.js'>\x3C/script>")</script>
  <script src="<?php echo ROOT_PATH . "modules/" . $siteMapVars['module'] . "/resources/js/libs/jqueryui.js"; ?>"></script>
  <script src="<?php echo ROOT_PATH . "modules/" . $siteMapVars['module'] . "/resources/js/libs/imgload.js"; ?>"></script>
  <script src="<?php echo ROOT_PATH . "modules/" . $siteMapVars['module'] . "/resources/js/settings.js"; ?>"></script>
  <script src="<?php echo ROOT_PATH . "modules/" . $siteMapVars['module'] . "/resources/js/script.js"; ?>"></script>
</body>
</html>