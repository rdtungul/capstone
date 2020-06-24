<?php
	include ("connect.php");
	mysql_select_db($dbName);


function editEmp(){

		$emp_ID = $_POST['e_id'];
		$emp_Lname = $_POST['e_lname'];
		$emp_Fname = $_POST['e_fname'];
		$emp_Mname = $_POST['e_mname'];
		// $emp_Position =  $_POST['e_position'];
		// $emp_Status = $_POST['e_status'];
		// $emp_Points = $_POST['e_lpoints'];
		// $emp_Balance = $_POST['e_ybalance'] . " as of " . date("Y-m-d") . ".";

		// $ebalance = "";
		// $epts = "";

		$sqlError = '';

		$sql = "SELECT * FROM emp_reg WHERE emp_ID = '$emp_ID';" ;
	    $result = mysql_query($sql);
	    $row = mysql_fetch_array($result);
	 	$epoints = $row['emp_SLBal'];

		// $total = $emp_Earned + $epoints;
		

        if (mysql_num_rows($result) > 0)
            {
                $row = mysql_fetch_array($result);

        if($row['emp_ID'] = $emp_ID)
            {


	$sql = "UPDATE emp_reg SET emp_Lname = '$emp_Lname', emp_Fname = '$emp_Fname', emp_Mname = '$emp_Mname' WHERE emp_ID = '$emp_ID';";
    mysql_query($sql);
	}
	$result = mysql_query($sql);
	if(!$result)
	$sqlError = "Error inserting record " .mysql_error();
	elseif ($result) {
		$sqlError = "Record updated successfully!";
	 return $sqlError;
    
}
            }
        // elseif (($row['mgrPword']==$password)&&($row['mgrUname']==$username)) {
        //     header("Location:display_items.php");
        // }

        return $sqlError;
            }

?>