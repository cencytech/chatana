<?php
	error_reporting(0);
	
	$db_username = 'root';
	$db_password = '';
	
	$connPDO = new PDO( 'mysql:host=localhost;dbname=sc_chat_system', $db_username, $db_password );
	 
?>
 

<?php

#include_once "mysqli.php";
 
$userid = $_REQUEST['userid'];
$isActivated = $_POST['isActivated'];

$activate = "UPDATE user SET isActivated ='$isActivated' WHERE userid = '$userid' ";

$connPDO->exec($activate);
echo "<script>window.location='control-panel.php'</script>";
?>
 