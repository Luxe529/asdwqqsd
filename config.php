<?php
	// Database Information
	$db_host = 'localhost';
	$db_user = ''; // Change this line
	$db_pass = ''; // Change this line
	$db_name = ''; // Change this line
	$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

	$select = "SELECT * FROM siteinfo";
	$query = mysqli_query($db, $select);
	$row = mysqli_fetch_array($query);
	$name = $row["name"];
	$domain = $row['domain'];
	$logo = $row['logo'];
	$color = $row['color'];
	$description = $row["description"];
	$twitter = $row['twitter'];
	$backgroundimage = $row['backgroundimage'];
	$sitekey = $row['sitekey'];
	$secretkey = $row['secretkey'];
	unset($select, $query, $row);
?>