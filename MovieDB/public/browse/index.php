
<?php
echo "testaSSSS";
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');
echo "Madam";
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);
echo "sir";
require_once('functions.php');
echo "cool sir";
require_once('../../private/initialize.php'); 

?>
<?php

$page_title = 'Browse Menu'; ?>
<?php include(SHARED_PATH . '/browse_header.php'); ?>

     <div id="content">
     <div id="main-menu">
      <h2> Main Menu </h2>
      <ul>
        <li> <a href="<?php echo url_for('/update/index.php'); ?>">Update</a>
        </li>
       </ul>
      </div>

     </div>
   
<?php include(SHARED_PATH . '/browse_footer.php'); ?>