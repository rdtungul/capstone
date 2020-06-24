<?php
	include ("connect.php");
	mysql_select_db($dbName);


function editPoints(){


		// $emp_Earned = $_POST['e_points'];
		// $emp_Balance = $_POST['e_ybalance'] . " as of " . date("Y-m-d") . ".";

		// $ebalance = "";
		// $epts = "";

		// $total1 = $v . " as of " . date("Y-m-d") . ".";
		// $total2 = $s . " as of " . date("Y-m-d") . ".";	


		// $result = mysql_query("SELECT emp_ID FROM emp_reg");

		// while($row = mysql_fetch_lengths($result))
		// {
		//     echo $empid ;
		// }
	// select name, count(*) as ct from names group by name order by ct desc;

		// $sql = "SELECT emp_ID FROM emp_reg ";
	 //    $result = mysql_query($sql);
	 //    $row = mysql_fetch_array($result);


		$emp_Earned2 = $_POST['e_earned'];
		$empid2 = $_POST['e_id'];
		$sql = "SELECT * FROM emp_reg WHERE emp_ID = $empid2";
	    $result = mysql_query($sql);
	    $row = mysql_fetch_array($result);
	    $sts = $row['emp_Status'];

		// $sql1 = "SELECT * FROM leave_record WHERE leave_ID = $empid2";
	 //    $result1 = mysql_query($sql1);
	 //    $row1 = mysql_fetch_array($result1);

	   	$sql1 = "SELECT * FROM add_points WHERE add_ID = $empid2";
	    $result1 = mysql_query($sql1);
	    $row1 = mysql_fetch_array($result1);
	    $udate = $row1['add_PoL'];
	    $udate2 = $_POST['e_date'];
	    // $mthdate = $row1['leave_PoL2'];
	    // $edate = $_POST['e_date'];
	    // $mleave = date("M.- Y");

        if (mysql_num_rows($result) > 0)
            {
                $row = mysql_fetch_array($result1);

        if($emp_Earned2 <= 1.25 AND $_POST['e_date'] !== $row1['add_PoL'])
            {

		$empid3 = $_POST['e_id'];
		$sql = "SELECT * FROM emp_reg WHERE emp_ID = $empid3 ";
	    $result = mysql_query($sql);
	    $row = mysql_fetch_array($result);
		$vpoints = $row['emp_VLBal'];
		$spoints = $row['emp_SLBal'];
		$vlpoints = $row['emp_VL'];
		$slpoints = $row['emp_SL'];
		// $mdate = $row['emp_Mdate'];
		$empid = $row['emp_ID'];

    	// $leave_DAT =  $_POST['e_date'];
		$emp_Earned = $_POST['e_earned'];
		$total1 = $vpoints + $emp_Earned;
		$total2 = $spoints + $emp_Earned;
		$total3 = $vlpoints + $emp_Earned;
		$total4 = $slpoints + $emp_Earned;

		$leave_PoL = $_POST['e_date'];
$sts = "Active";

    // $sql = "UPDATE emp_reg SET emp_Status = '$sts' WHERE emp_ID = '$leaveID2';";
    // mysql_query($sql);
	$sql = "UPDATE emp_reg SET emp_VLBal = $total1, emp_SLBal = $total2, emp_VL = $total3, emp_SL = $total4, emp_Status = '$sts' WHERE emp_ID = $empid3";
    mysql_query($sql);

    $sql = "INSERT INTO add_points VALUES('$empid','$leave_PoL','$total1','$total2','$emp_Earned')";
    // $sql = "INSERT INTO leave_record VALUES ('$empid','','','','$emp_Earned','','','','$total1','$leave_PoL','','','','$total2','','','','','','$emp_Earned','')";
	
	$result = mysql_query($sql);
	if(!$result)
	$sqlError = "Error inserting record " .mysql_error();
	elseif ($result) {
		$sqlError = "Points updated successfully!";
	 return $sqlError;
    
            }
        }
        else
                $sqlError = "The Maximum Monthly Points is 1.25! or Inactive User! or Date already exists!";
            }
    return $sqlError;
}    
            
        // elseif (($row['mgrPword']==$password)&&($row['mgrUname']==$username)) {
        //     header("Location:display_items.php");
        // }


?>