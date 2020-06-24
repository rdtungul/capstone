<?php
	include ("connect.php");
	mysql_select_db($dbName);


function addEmp(){

		$emp_ID = $_POST['e_id'];
		$emp_Lname = $_POST['e_lname'];
		$emp_Fname = $_POST['e_fname'];
		$emp_Mname = $_POST['e_mname'];
		$emp_Div = $_POST['e_div'];
		$emp_Position = $_POST['e_position'];
		$emp_Address = $_POST['e_address'];
		$emp_Fds = $_POST['e_fds'];
		// $emp_Balance = "5" . " as of " . date("Y-m-d") . ".";
		// $emp_Fds2 = $_GET['e_fds'];
		$vl = "0";
		$sl = "0";
		$tl = "0";
		$ubl = "0";
    	$emp_status = "Active";

		$sqlError = '';

$last_login_date = $_POST['e_fds'];
$current_date = date("m/d/Y");

$day = round(abs(strtotime($current_date)-strtotime($last_login_date))/2547900);
$ubl = $day * 1.25;

// echo($day);
// echo '<br >';
// echo($pro);
//     $cdate = date("m/d/Y");
//     $fds = (($cdate) + strtotime(+$emp_Fds))-1;
//     $ubl = $fds * 1.25;
// // $sts = "Active";
//     echo($ubl);
    // $e_fds = "01/05/2018";



		$sql = "INSERT INTO emp_reg VALUES ('$emp_ID','$emp_Lname','$emp_Fname','$emp_Mname','$emp_Position','$emp_Div','$emp_Address','$emp_Fds','$ubl','$ubl','$tl','$tl','$emp_status','$ubl','$ubl')";
	// echo ($sql);
	$result = mysql_query($sql);
	if(!$result)
	$sqlError = "Error inserting record " .mysql_error();
	elseif ($result) {
		$sqlError = "Record added successfully!";
	return $sqlError;
	}
}



// function valMgr(){

// 		$sqlError='';

// 		$muid = $_POST['mgrid'];
// 		$munm = $_POST['mgruname'];

// 		$sql = "SELECT * FROM manager WHERE mgrID = '$muid' OR mgrUname = '$muid' ";
// 		$result = mysql_query($sql);
// 		$row = mysql_fetch_array($result);

// 		if (mysql_num_rows($result) > 0)
// 		{
// 			if (($row['mgrUname'] == $munm) AND ($row['mgrID'] == $muid)){
// 				$sqlError="Manager ID and Username already taken!";
// 			}
// 			elseif ($row['mgrUname'] == $munm)
// 				$sqlError="Username already taken!";
// 			else
// 				$sqlError="Username already Taken!";
// 		}
// 		else
// 			$sqlError=addMgr();
// 		return $sqlError;
// 	}
?>