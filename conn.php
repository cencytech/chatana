<?php
#error_reporting(0);
date_default_timezone_set("Asia/Manila");
// echo date_default_timezone_get();
$config = array(
	"Host"	=>	"localhost",
	"Root"	=>	"root",
	"Pass"	=>	"Cisdevo888#",
	"Db"	=>	"abfiphco_chatana"
	);
	
//MySQLi Procedural
$conn = mysqli_connect($config["Host"],$config["Root"],$config["Pass"],$config["Db"]);
if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

$connPDO = new PDO( 'mysql:host='.$config["Host"].';dbname=abfiphco_chatana', $config["Root"], $config["Pass"]);

#$mysqliConnectUpimage = mysqli_connect($config["Host"],$config["Root"],$config["Pass"],$config["Db"]);

?>
