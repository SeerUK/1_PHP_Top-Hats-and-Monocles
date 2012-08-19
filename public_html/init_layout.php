<?php

  /*
   //
   // Iris Mail
   // 13/01/2012
   //
   // Elliot Wright
   // init_layout.php
   //
  */ 
  
  // Function to retrieve template values:
  $tFound = false;
  $siteMapVars = array();
  function getTemplate($pID,$mID) {
    // Setup global variables:
    global $siteMapVars;
    global $tFound;
    // Open XML:
    $xml = simplexml_load_file(ROOT_PATH . "modules/" . $mID . "/sitemap.xml");
    function temp_node($nod2e, $smnID) {
      // Setup global variables:
      global $siteMapVars;
      global $tFound;
      if($tFound != true) {
        // Check if the current node has a child node:
        if(isset($node->siteMapNode)) {
          // Return the current template:
          if($node->attributes()->template == $smnID) {
            $siteMapVars['pTemplate'] = $node->attributes()->template;
            $tFound = true;
          }
          if($tFound != true) {
            // Check for next level (lol) matches:
            foreach($node->siteMapNode as $child) {
              // If child nodes are final result, set the array values and stop.
              if($child->attributes()->id == $smnID) {
                $siteMapVars['pTemplate'] = $child->attributes()->template;
                $tFound = true; // Final value has been found.
              } else {
                temp_node($child, $smnID);
              }
            }
          }
        }
      }
    }
    // Initialize the hunt!
    foreach($xml->siteMapNode as $node) {
      // Stop hunting if the final node has been found.
      if($tFound != true) {
        //Check for level 0 matches:
        if($node->attributes()->id == $pID) {
          $siteMapVars['pTemplate'] = $node->attributes()->template;
          $tFound = true;
        } else {
          temp_node($node, $pID);
        }
      }
    }
  }
  // We also need a function to check if the page exists to be used a little
  // bit later:
  $found = false;
  $pageExists = false;
  function pageExists($pID,$mID) {
    // Setup global variables:
    global $found;
    global $pageExists;
    // Open XML:
    $xml = simplexml_load_file(ROOT_PATH . "modules/" . $mID . "/sitemap.xml");
    function find_page($node, $smnID) {
      // Setup global variables:
      global $found;
      global $pageExists;
      if($found != true) {
        // Check if the current node has a child node:
        if(isset($node->siteMapNode)) {
          // Check for next level (lol) matches:
          foreach($node->siteMapNode as $child) {
            // If child nodes are final result, set the array values and stop.
            if($child->attributes()->id == $smnID) {
              $pageExists = 1;
              $found = true; // Final value has been found.
            } else {
              find_page($child, $smnID);
            }
          }
        }
      }
    }
    // Initialize the hunt!
    foreach($xml->siteMapNode as $node) {
      // Stop hunting if the final breadcrumb has been found.
      if($found != true) {
        //Check for level 0 matches:
        if($node->attributes()->id == $pID) {
          $pageExists = 1;
          $found = true;
        } else {
          find_page($node, $pID);
        }
      }
    }
    return $pageExists;
  }
  // If no page ID is given, we're on the homepage (shock horror).
  if(!isset($_GET['pid']) || !isset($_GET['module'])) {
    if(!isset($_GET['pid']) && !isset($_GET['module'])) {
      $siteMapVars['pageID'] = "home";
      $siteMapVars['module'] = "core";
      getTemplate("home","core");
    } else {
      header('Location: ' . ROOT_PATH . "?module=errors&pid=404");
    }
  }
  // If there is a page ID given, setup template values accordingly.
  //
  // Also, check if the page actually exists, if it doesn't redirect the user
  // to the 404 page.
  if(isset($_GET['pid'])) {
    if(!pageExists($_GET['pid'],$_GET['module'])) {
      header('Location: ' . ROOT_PATH . "?module=errors&pid=404");
    } else {
      $siteMapVars['pageID'] = $_GET['pid'];
      $siteMapVars['module'] = $_GET['module'];
      getTemplate($_GET['pid'],$_GET['module']);
    }
  }
  // Do other page setup tasks:
  //
  // Check for conditions file, if there is one, include and run the conditions
  // for the page to run:
  include("modules/" . $siteMapVars['module'] . "/init.php");

?>