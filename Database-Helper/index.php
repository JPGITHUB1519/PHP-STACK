<?php

	//import 
	require_once "Database.php";

	$db = new Database();
	// single row
	echo "<br><br>One Row<br>";
	$data = $db->getRow("SELECT * FROM user WHERE status = ?", ["1"]);
	print_r($data);
	// much rows
	echo "<br><br>MUCH ROWS<br><br>";
	$data = $db->getRows("SELECT * FROM user");
	print_r($data);
	echo "<br><br>";
	// single name
	print_r($data[0]['name']);

	// insert data

	$db->executeQuery("INSERT INTO user VALUES(5,'pepe', '3030','pepe@gmail.com', CURDATE(), 1)");

?>
