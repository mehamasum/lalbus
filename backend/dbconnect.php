<?php

	$dbUSER = 'root';
	$dbPASS = '';
	$dbHOST = 'localhost';
	$dbDB   ='lalbus_db';
	
	$conn = new mysqli($dbHOST , $dbUSER , $dbPASS , $dbDB);
	if($conn->connect_error){
		die('Could not Connect: '.$conn->connect_error);
	}
?>
