<?php
	//Connecting to database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "customers";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	//Message in case of Error
    if(!$conn){
		die("Could not connect to the database due to the following error --> ".mysqli_connect_error());
	}

?>