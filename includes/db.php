<?php 
	
$db["db_host"] = "localhost";
$db["db_user"] = "root";
$db["db_pass"] = "";
$db["db_name"] = "cms";

//DEFINE DB as CONSTANT
foreach ($db as $key => $data) {
	define(strtoupper($key), $data);
}

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$con) {
	die("Error in connecting database");
}

 ?>