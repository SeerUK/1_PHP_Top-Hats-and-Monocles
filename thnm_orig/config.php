<?php

  /*
   //
   // Iris Mail
   // 13/01/2012
   //
   // Elliot Wright
   // config.php
   //
  */

  // Site Variables:
  define("SITE_DOMAIN",   "thnm.pde.com");
  define("COOKIE_DOMAIN", ".pde.com");
  define("SITE_PATH",     "/"); // Make sure to have the slashes...
  define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT'] . SITE_PATH);
  define("ROOT_PATH",     "http://" . SITE_DOMAIN . SITE_PATH);
  define("SITE_NAME",     "Top Hats &amp; Monocles");
  // MySQL Settings:
  define("MYSQL_HOST",    "localhost");
  define("MYSQL_USER",    "root");
  define("MYSQL_PASS",    "Diablo2");
  define("MYSQL_DBNAME",  "thnm");
  define("MYSQL_PREFIX",  "thnm_");

  // Database Connection:
  mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASS) or die("Error connecting to MySQL Server: " . mysql_error());
  mysql_selectdb(MYSQL_DBNAME) or die("Could not select database '" . MYSQL_DBNAME . "', error: " . mysql_error());

?>
