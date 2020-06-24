<?php
	//connection var
	//hostname
		$dbHost = "localhost";
	//uname
		$dbUser = "root";
	//password
		$dbPass = "";

	//db name $sql = "CREATE DATABASE $dbName IF NOT EXISTS";
	//mysql_query($sql);

		$dbName = "capstone";

	//save conn in var for checking
		$con = mysql_connect($dbHost,$dbUser,$dbPass);
	//conn checking
		if(!$con) die("Connection Error!" . mysql.error());
	//display msg for checking
	//	echo "Connected Succesfully!";

?>