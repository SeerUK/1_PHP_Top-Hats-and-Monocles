<?php

  /*
   //
   // Iris Mail
   // 13/01/2012
   //
   // Elliot Wright
   // functions/functions.php
   //
  */

  // Contents:
  // 001 - Breadcrumbs
  // 002 - $pageID to Page Title
  // 003 - Custom Variable Replacement (SITEMAP ONLY!)
  // 004 - Header Redirect and Exit Function
  // 005 - Process Time (Time Zones)
  // 006 - User Access Redirect
  // 007 - No Cache Function
  // 008 - Edit Profile Navigation
  // 009 - SMTP Mail
  // 010 - Check E-Mail Address Validity:
  // 011 - Process Errors

  // <---- Begin Functions ----> //

  // 001 - Breadcrumbs
  // The breadcrumbs function creates an array storing the names and paths
  // of the currently viewed page based on the sitemap.
  // !!! Need to make crumbs array before function !!!
  $crumbs = array();
  $rFound = false;
  $rFoundLevel = 0;
  function breadcrumbs($pID,$mID) {
    // Allow the use of global variables:
    global $crumbs;
    global $rFound;
    global $rFoundLevel;
    // Open XML:
    $xml = simplexml_load_file("modules/" . $mID . "/sitemap.xml");
    // Scan XML for child nodes.
    function print_node($node, $level, $smnID) {
      // Allow the use of global variables:
      global $crumbs;
      global $rFound;
      global $rFoundLevel;
      if($rFound != true) {
        // Check if the current node has a child node:
        if(isset($node->siteMapNode)) {
          // Set current breadcrumb levels value:
          $crumbs[$level]["title"] = replaceCVar($node->attributes()->title);
          $crumbs[$level]["url"] = replaceCVar($node->attributes()->url);
          if($node->attributes()->id == $smnID) {
            $rFound = true; // Final value has been found.
            $rFoundLevel = $level;
          }
          foreach($node->siteMapNode as $child) {
            // If child nodes are final result, set the array values and stop.
            if($child->attributes()->id == $smnID) {
              $crumbs[$level+1]["title"] = replaceCVar($child->attributes()->title);
              $crumbs[$level+1]["url"] = replaceCVar($child->attributes()->url);
              $rFound = true; // Final value has been found.
              $rFoundLevel = $level+1;
            }
            if($rFound != true) {
              print_node($child, $level+1, $smnID);
            }
          }
        }
      }
    }
    // Initialize the hunt!
    foreach($xml->siteMapNode as $node) {
      // Stop hunting if the final breadcrumb has been found.
      if($rFound != true) {
        // Check for level 0 matches:
        if($node->attributes()->id == $pID) {
          $crumbs[0]["title"] = replaceCVar($node->attributes()->title);
          $crumbs[0]["url"] = replaceCVar($node->attributes()->url);
          $rFound = true;
          $rFoundLevel = 0;
        } else {
          print_node($node, 0, $pID);
        }
      }
    }
  }

  // 002 - $pageID to Page Title
  // This function converts the given page ID into the page title
  // based on values in the xml site map.
  $pFound = false;
  function pID2pT($pID,$mID) {
    // Setup global variables:
    global $pFound;
    // Open XML:
    $xml = simplexml_load_file("modules/" . $mID . "/sitemap.xml");
    function find_node($node, $smnID) {
      // Setup global variables:
      global $pFound;
      if($pFound != true) {
        // Check if the current node has a child node:
        if(isset($node->siteMapNode)) {
          // Check for next level (lol) matches:
          foreach($node->siteMapNode as $child) {
            // If child nodes are final result, set the array values and stop.
            if($child->attributes()->id == $smnID) {
              echo replaceCVar($child->attributes()->title);
              $pFound = true; // Final value has been found.
            } else {
              find_node($child, $smnID);
            }
          }
        }
      }
    }
    // Initialize the hunt!
    foreach($xml->siteMapNode as $node) {
      // Stop hunting if the final breadcrumb has been found.
      if($pFound != true) {
        //Check for level 0 matches:
        if($node->attributes()->id == $pID) {
          echo replaceCVar($node->attributes()->title);
          $pFound = true;
        } else {
          find_node($node, $pID);
        }
      }
    }
  }


  // 003 - Custom Variable Replacement (SITEMAP ONLY!)
  // This functions converts the custom variables used in the XML files into
  // the appropriate sitemap variables.
  function replaceCVar($data) {
    // Allow access to sitemap variables.
    global $siteMapVars;
    // If a match is found then replace with corresponding sitemap value:
    $str = '/\!([^\"]*?)\!/';
    if(preg_match_all($str, $data, $matches)) {
      foreach($matches[0] as $match) {
        $explosion = explode("!",$match); // BOOOOOOM!
        $e = $explosion[1];
        $data = str_replace($match, $siteMapVars[$e], $data);
      }
      return $data;
    } else {
      return $data;
    }
  }

  // 004: Header Redirect and Exit Function
  // This function will redirect a user and then exit the script after the
  // redirect. (e.g. to preserve error session vars).
  function headerex($url) {
    header("Location: " . $url);
    exit(0);
  }

  // 005 - Process Time (Time Zones)
  // This function will alter displayed times according to a time zone when
  // time zones are implemented on the site.
  function processTime($timestamp,$precise = false) {
    if($precise == false) {
      $difference = time() - $timestamp;
      $tarray = getdate($timestamp);
      $ctarray = getdate(time());
      // Check if mail is from today:
      if($difference < 86400 && $tarray['mday'] == $ctarray['mday']) {
        // Minutes:
        if($difference < 3600) {
          $time = round($difference / 60);
          return $time . " mins ago";
        }
        // 6 Hours:
        elseif($difference < 21600) {
          $time = round(($difference / 60) / 60);
          return $time . " hours ago";
        }
        // Precise time within a day:
        elseif($difference < 86400) {
          $tarray = getdate($timestamp);
          if($tarray['minutes'] == 0) {
            $tarray['minutes'] = "00";
          }
          if($tarray['hours'] > 12) {
            $tarray['hours'] = $tarray['hours'] - 12;
            $meridiem = "PM";
          } else {
            $meridiem = "AM";
          }
          $time = $tarray['hours'] . ":" . $tarray['minutes'] . $meridiem;
          return $time;
        }
      } elseif($tarray['year'] == $ctarray['year']) {
        return substr($tarray['month'],0,3) . " " . $tarray['mday'];
      } else {
        return $tarray['mday'] . "/" . $tarray['mon'] . "/" . $tarray['year'];
      }
    } else { // Precise, i.e. complete time:

    }
  }

  // 006: User Access Redirect
  // This function will check if the user is currently logged in
  function loginStatus() {
    global $user;
    if($user->data) {
      return true;
    } else {
      return false;
    }
  }

  // 007 - No Cache Function:
  // Stops the browser from caching the page so content will be properly
  // displayed if changes have been made by the user etc.
  function noCache() {
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
  }

  // 009 - SMTP Mail
  // This function uses the PEAR Mail module to send mail via SMTP so it is sent
  // from mail.domain.ext rather than not having a sender.
  function smtpMail($sendTo,$subject,$message) {
    require_once "Mail.php";

    $from = SITE_NAME . "<" . SMTP_USER . ">";
    $to = "<" . $sendTo . ">";
    $subject = $subject;
    $body = $message;

    $host = SMTP_HOST;
    $username = SMTP_USER;
    $password = SMTP_PASS;

    $headers = array ('From' => $from,
      'To' => $to,
      'Subject' => $subject);
    $smtp = Mail::factory('smtp',
      array ('host' => $host,
        'auth' => true,
        'username' => $username,
        'password' => $password));

    $mail = $smtp->send($to, $headers, $body);

    if (PEAR::isError($mail)) {
      return false;
     } else {
      return true;
     }
  }

  //010 - Check E-Mail Address Validity:
  function validEmail($email) {
    $isValid = true;
    $atIndex = strrpos($email, "@");
    if (is_bool($atIndex) && !$atIndex) {
      $isValid = false;
    } else {
      $domain = substr($email, $atIndex+1);
      $local = substr($email, 0, $atIndex);
      $localLen = strlen($local);
      $domainLen = strlen($domain);
      if ($localLen < 1 || $localLen > 64) {
        // local part length exceeded
        $isValid = false;
      } else if ($domainLen < 1 || $domainLen > 255) {
        // domain part length exceeded
        $isValid = false;
      } else if ($local[0] == '.' || $local[$localLen-1] == '.') {
        // local part starts or ends with '.'
        $isValid = false;
      } else if (preg_match('/\\.\\./', $local)) {
        // local part has two consecutive dots
        $isValid = false;
      } else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
        // character not valid in domain part
        $isValid = false;
      } else if (preg_match('/\\.\\./', $domain)) {
        // domain part has two consecutive dots
        $isValid = false;
      } else if(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local))) {
        // character not valid in local part unless
        // local part is quoted
        if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\","",$local))) {
          $isValid = false;
        }
      }
      if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A"))) {
        // domain not found in DNS
        $isValid = false;
      }
    }
    return $isValid;
  }

  // 011 - Display Errors
  // This function is called to check if there are errors on submitted data:
  function errors($error) {
    if(isset($_SESSION['errors'][$error])) {
      $errors = array();
      $errors[$error] = $_SESSION['errors'][$error];
      echo "<span class='error'>" . $errors[$error] . "</span>";
      unset($_SESSION['errors'][$error]);
      return true;
    } else {
      return false;
    }
  }

  // <---- End Functions ----> //

?>
