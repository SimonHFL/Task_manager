<?php	
include 'config.php';
// connect to database
$con = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($con->connect_errno){
  die('Connect Error: ' . $db->connect_errno);
}




