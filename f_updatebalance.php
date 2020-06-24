<?php
	include ("connect.php");
	mysql_select_db($dbName);


function editBalance(){


		$sqlError = '';
		// $emp_Earned = $_POST['e_points'];
		$sql = "SELECT * FROM emp_reg ";
	    $result = mysql_query($sql);
	    $row = mysql_fetch_array($result);
		$emp_Balance = $_POST['e_ybalance'];
		$aof = " as of " . date("Y-m-d") . ".";
		$ebalance = $emp_Balance + $aof;
		


		// $epoints = $row['emp_SLBal'];
		// $emp_Earned = $_POST['e_earned'];

		// $total = $epoints + $emp_Earned;
		


	$sql = "UPDATE emp_reg SET emp_Balance = $ebalance WHERE emp_ID = emp_ID";
    mysql_query($sql);
	
	$result = mysql_query($sql);
	if(!$result)
	$sqlError = "Error inserting record " .mysql_error();
	elseif ($result) {
		$sqlError = "Yearly Balance updated successfully!";
	 return $sqlError;
    
}
            }
        // elseif (($row['mgrPword']==$password)&&($row['mgrUname']==$username)) {
        //     header("Location:display_items.php");
        // }


?>