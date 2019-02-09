<?php

if (isset($_POST['text'])) {

include_once "mysql_connect.php";

$ddd=$_POST['text'];
	$query = "INSERT INTO message (message) VALUES ('$ddd')";
	
}

?>