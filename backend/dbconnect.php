<?php

	$dbUSER = 'root';
	$dbPASS = '';
	$dbHOST = 'localhost';
	$dbDB   ='lalbus_db';
	
	$conn = new mysqli($dbHOST , $dbUSER , $dbPASS , $dbDB);
	if($conn->connect_error){
		die('Could not Connect: '.$conn->connect_error);
	}
	$conn->query("SET CHARACTER SET utf8");
	$conn->query("SET SESSION collation_connection =’utf8_general_ci'");
?>
