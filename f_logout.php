<?php
	session_start();
	include('connect.php');
		mysql_select_db($dbName);

        session_unset();
        session_destroy();
        header("Location:user_login.php");

?>