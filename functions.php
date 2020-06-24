<?php
	include ("connect.php");
	mysql_select_db($dbName);

// function for add employee
function addEmp(){

		$emp_ID = $_POST['e_id'];
		$emp_Lname = $_POST['e_lname'];
		$emp_Fname = $_POST['e_fname'];
		$emp_Mname = $_POST['e_mname'];
		$emp_Position =  $_POST['e_position'];
		$emp_Div = $_POST['e_div'];
		$emp_Address = $_POST['e_address'];
		$emp_Fds = $_POST['e_fds'];
		$emp_Balance = "5" . " as of " . date("Y-m-d") . ".";


		$sqlError = '';



		$sql = "INSERT INTO emp_reg VALUES ('$emp_ID','$emp_Lname','$emp_Fname','$emp_Mname','$emp_Position','$emp_Div','$emp_Address','$emp_Fds','','','$emp_Balance','')";
	
	$result = mysql_query($sql);
	if(!$result)
	$sqlError = "Error inserting record " .mysql_error();
	elseif ($result) {
		$sqlError = "Record added successfully!";
	return $sqlError;
	}
}




// function for employees account
function chAcc()
{
    $cuname = $_POST['ch_uname'];
    $cpword  = $_POST['ch_pword'];
    $errorPword = '';
    $cpid = "1";

    $sql   = "SELECT * FROM user_log WHERE ul_Pword = '$cpword';" ;
    $result = mysql_query($sql);

    if (mysql_num_rows($result) > 0)
            {
                $row = mysql_fetch_array($result);

        if($row['ul_Pword']==!$cpword)
            {
            }
       if(!$result)
        $errorPword = "Error inserting record " .mysql_error();
        elseif ($result) {
            $errorPword = "Password is already set!";
            return $errorPword;
    }
}
        else
            $sql = "UPDATE user_log SET ul_Pword = '$cpword' WHERE ul_Uname = ul_Uname ;";
            //echo("sql3 = ".$sql3);
            mysql_query($sql);

            $errorPword = "Password has been changed successfully!";
            return $errorPword;
        }




// function for employees leave
function empLeave()
{

    $leaveID1 = $_POST['l_id'];
    $sqlError = '';
    //$time_Date4 = $_POST['time_date'];

    $sql1 = "SELECT * FROM emp_reg WHERE emp_ID = '$leaveID1';" ;
    $result1 = mysql_query($sql1);

    $sql2 = "SELECT * FROM leave_record WHERE leave_ID = '$leaveID1';" ;
    $result2 = mysql_query($sql2);
    $row2 = mysql_fetch_array($result2);
    //$tdate = $rowSelect3['time_Date'];
    // $tDate4 = $rowSelect4['time_Date'];
    $sql2 = "SELECT * FROM emp_reg WHERE emp_ID = '$leaveID1';" ;
    $result2 = mysql_query($sql2);
    $row2 = mysql_fetch_array($result2);

        $sqlSelect2 = "SELECT * FROM emp_reg WHERE emp_ID = '$leaveID1';" ;
    $resultSelect2 = mysql_query($sqlSelect2);
    $rowSelect2 = mysql_fetch_array($resultSelect2);
    $add_sl = $rowSelect2['emp_SLBal'];

    $sql1 = "SELECT * FROM emp_reg WHERE emp_ID = '$leaveID1';" ;
    $result2 = mysql_query($sql1);
    $row2 = mysql_fetch_array($result2);
    $add_balance = $row2['emp_Balance'];
    // $sl2 = $rowSelect2['emp_SLBal'];
    // $emp_sbal = $row['emp_SLBal'];
    // $sqlSelect4 = "SELECT * FROM emp_reg WHERE emp_ID = '$time_ID2';" ;
    // $resultSelect2 = mysql_query($sqlSelect2);
    // $rowSelect2 = mysql_fetch_array($resultSelect2);
    // $add_sl = $rowSelect2['emp_SLBal'];

    // $sql   = "SELECT * FROM cashier WHERE csUname = '$username';" ;
    // $result = mysql_query($sql);


        if (mysql_num_rows($result1) > 0)
            {
                $row = mysql_fetch_array($result2);

        if($add_sl >= 1.25 AND $add_balance >= 1)
            {
        // if(date("Y-m-d") > date("Y-m-d"))
        // {
    $dstart = $_POST['l_fdate']; // starting date
    $estart = $_POST['l_tdate']; // end date

    $day = (strtotime($estart) - strtotime($dstart))/24/3600+1;
    $points = ".25" * $day;
    $earn = $day + $points;

    $leave_PoL = date("M.-Y");
    $leave_Particular = date("(d)")." VL/SL";
    $leave_ID = $_POST['l_id'];
    $leave_Earned = $_POST['l_earned'];
    $leave_ABSwp = $leave_Balance;
    $leave_ABSwp2 = $day;
    $l_Name = $_POST['l_name'];
    $leave_From = $_POST['l_fdate'];
    $leave_To = $_POST['l_tdate'];
    $leave_NoD =  $day;

    $leave_Status = $_POST['l_status'];
   

    
    include("connect.php");
    mysql_select_db($dbName);

    $sqlError = '';
    $leave_ID2 = $_POST['l_id'];
    $sqlSelect = "SELECT * FROM emp_reg WHERE emp_ID = '$leave_ID2';" ;
    $resultSelect = mysql_query($sqlSelect);
    $rowSelect = mysql_fetch_array($resultSelect);
    $add_vl = $rowSelect['emp_VLBal'];


    $sqlSelect2 = "SELECT * FROM emp_reg WHERE emp_ID = '$leave_ID2';" ;
    $resultSelect2 = mysql_query($sqlSelect2);
    $rowSelect2 = mysql_fetch_array($resultSelect2);
    $add_sl = $rowSelect2['emp_SLBal'];
    $emp_vbal = $row['emp_VLBal'];
    $emp_sbal = $row['emp_SLBal'];


    $sqlSelect2 = "SELECT * FROM emp_reg WHERE emp_ID = '$leaveID1';" ;
    $resultSelect2 = mysql_query($sqlSelect2);
    $rowSelect2 = mysql_fetch_array($resultSelect2);
    $add_balance2 = $rowSelect2['emp_Balance'];

    // $sqlSelect3 = "SELECT * FROM emp_reg WHERE emp_ID = '$leave_ID2';" ;
    // $resultSelect3 = mysql_query($sqlSelect3);
    // $rowSelect3 = mysql_fetch_array($resultSelect3);
    // $emp_balance = $rowSelect3['emp_Balance'];
    // $emp_balance1 = $row['emp_Balance'];

    // $sql3 = "SELECT * FROM emp_reg WHERE emp_VLBal = '$emp_vbal' AND emp_SLBal = emp_VLBal;" ;
    // mysql_query($sql2);
    $leave_Earned2 = $_POST['l_earned'];
    $leave_ABSwp3 = $earn;
    $leaveID2 = $_POST['l_id'];
    //$ldate = $_POST['time_date']; // starting date
    //$estart = $_POST['l_tdate']; // end date
    $leave_Balance = $add_vl + $leave_Earned2;
    $leave_Balance2 =  $add_sl - $leave_ABSwp3;
    $leave_Deduct = $add_balance2 - $leave_ABSwp2 . " as of " . date("Y-m-d") . ".";
    $Balance3 = $leave_Earned2 + $leave_Balance2;
    $leave_DAT = date("Y-m-d");
    //$points = "1.25";
    // $balance = "5" . " as of " . date("Y-m-d") . ".";


    // $day = (strtotime($ldate)-strtotime($ldate))/24/3600+1;
    // $day1 = $day;
    // // echo "<br />";
    // $vl_earn = ".042" * $day1 + $add_vl;
    // $sl_earn = ".042" * $day1 + $add_sl;
    $sql2 = "UPDATE emp_reg SET emp_VLBal = '$leave_Balance', emp_SLBal = '$leave_Balance2', emp_Balance = '$leave_Deduct' WHERE emp_ID = '$leaveID2' ;";
    mysql_query($sql2);


    $sql = "INSERT INTO leave_record VALUES ('$leave_ID','$leave_From','$leave_To','$leave_NoD','$leave_Earned','$leave_Status','$leave_ABSwp','','$leave_Balance','$leave_PoL','$leave_Particular','$leave_ABSwp2','','$leave_Balance2','$Balance3', '$l_Name', '$leave_DAT')";
    
    $result = mysql_query($sql);
    if(!$result)
    $sqlError = "Error inserting record " .mysql_error();
    elseif ($result) {
        $sqlError = "Record added successfully!";
        header("Location:m_page.php");

    return $sqlError;
    }

            }
        // elseif (($row['mgrPword']==$password)&&($row['mgrUname']==$username)) {
        //     header("Location:display_items.php");
        // }
        
        else
                $sqlError = "Insufficient Balance!";
            }

        return $sqlError;
            }




// function for edit balance
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




// function for edit employee
function editEmp(){

		$emp_ID = $_POST['e_id'];
		$emp_Lname = $_POST['e_lname'];
		$emp_Fname = $_POST['e_fname'];
		$emp_Mname = $_POST['e_mname'];
		$emp_Position =  $_POST['e_position'];
		$emp_Earned = $_POST['e_points'];
		// $emp_Balance = $_POST['e_ybalance'] . " as of " . date("Y-m-d") . ".";

		// $ebalance = "";
		// $epts = "";

		$sqlError = '';

		$sql = "SELECT * FROM emp_reg WHERE emp_ID = '$emp_ID';" ;
	    $result = mysql_query($sql);
	    $row = mysql_fetch_array($result);
	 	$epoints = $row['emp_SLBal'];

		$total = $emp_Earned + $epoints;
		

        if (mysql_num_rows($result) > 0)
            {
                $row = mysql_fetch_array($result);

        if($row['emp_ID'] = $emp_ID)
            {


	$sql = "UPDATE emp_reg SET emp_Lname = '$emp_Lname', emp_Fname = '$emp_Fname', emp_Mname = '$emp_Mname', emp_Position = '$emp_Position', emp_Earned = $emp_Earned, emp_SLBal = $total WHERE emp_ID = '$emp_ID';";
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




// function for edit leave points
function editPoints(){


		// $emp_Earned = $_POST['e_points'];
		// $emp_Balance = $_POST['e_ybalance'] . " as of " . date("Y-m-d") . ".";

		// $ebalance = "";
		// $epts = "";

		$sqlError = '';

		$sql = "SELECT * FROM emp_reg ";
	    $result = mysql_query($sql);
	    $row = mysql_fetch_array($result);
		$epoints = $row['emp_SLBal'];
		$emp_Earned = $_POST['e_earned'];

		$total = $epoints + $emp_Earned;
		


	$sql = "UPDATE emp_reg SET emp_Earned = $emp_Earned, emp_SLBal = $total WHERE emp_ID = emp_ID";
    mysql_query($sql);
	
	$result = mysql_query($sql);
	if(!$result)
	$sqlError = "Error inserting record " .mysql_error();
	elseif ($result) {
		$sqlError = "Points updated successfully!";
	 return $sqlError;
    
}
            }




// function for login
function validateLogin()
{
    $username = $_POST['uname'];
    $password  = $_POST['pword'];
    $errorMessage = '';

    

    $sql   = "SELECT * FROM user_log WHERE ul_Uname = '$username';" ;
    $result = mysql_query($sql);

    $sql2   = "SELECT * FROM emp_reg WHERE emp_ID = '$username';" ;
    $result2 = mysql_query($sql2);
    $row2 = mysql_fetch_array($result2);

    // $sql   = "SELECT * FROM cashier WHERE csUname = '$username';" ;
    // $result = mysql_query($sql);

        if (mysql_num_rows($result2) > 0)
            {
                $row = mysql_fetch_array($result2);
            if($row2['emp_ID']==$username)
            {
                $_SESSION["uID"]=$row2['emp_ID'];
                $_SESSION["Name"]=$row2['emp_Fname'];

                // date_default_timezone_set('Asia/Hong_Kong');
                // $timezone = date_default_timezone_get();            

                // $date = date('Y-m-d H:i:s', time());            
                // $uid = $row['uID'];
                // $uname = $row['Uname'];

                // $sqlHistory = "INSERT INTO logbook VALUES ('$uid', '$uname', '$date', ''); ";
                // mysql_query($sqlHistory);
                header("Location:e_page.php");
            }

        else
            $errorMessage = "User does not exist!";

        return $errorMessage;
            }
        if (mysql_num_rows($result) > 0)
            {
                $row = mysql_fetch_array($result);
        if($row['ul_Pword']==$password)
            {
                $_SESSION["uID"]=$row['ul_ID'];
                $_SESSION["Name"]=$row['ul_Uname'];

                // date_default_timezone_set('Asia/Hong_Kong');
                // $timezone = date_default_timezone_get();            

                // $date = date('Y-m-d H:i:s', time());            
                // $uid = $row['uID'];
                // $uname = $row['Uname'];

                // $sqlHistory = "INSERT INTO logbook VALUES ('$uid', '$uname', '$date', ''); ";
                // mysql_query($sqlHistory);
                header("Location:m_page.php");
            }
        elseif ($row['ul_Pword']==$password) {
                header("Location:m_page.php");
    
            }
        // elseif (($row['mgrPword']==$password)&&($row['mgrUname']==$username)) {
        //     header("Location:display_items.php");
        // }
        else
                $errorMessage = "Incorrect Password!";
            }

        else
            $errorMessage = "User does not exist!";

        return $errorMessage;
            }
?>