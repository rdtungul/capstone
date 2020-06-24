<?php
include ("connect.php");
mysql_select_db($dbName);

function empLeave()
{

    $leaveID1 = $_POST['l_id'];
    $sqlError = '';
    //$time_Date4 = $_POST['time_date'];
    // $vlstatus = $_POST['l_status'];
    $dstart = $_POST['l_fdate']; // starting date
    $estart = $_POST['l_tdate']; // end date

    $day = (strtotime($estart) - strtotime($dstart))/24/3600+1;

    $sql1 = "SELECT * FROM emp_reg WHERE emp_ID = '$leaveID1';" ;
    $result1 = mysql_query($sql1);

    // $sql2 = "SELECT * FROM leave_record WHERE leave_ID = '$leaveID1';" ;
    // $result2 = mysql_query($sql2);
    // $row2 = mysql_fetch_array($result2);
    //$tdate = $rowSelect3['time_Date'];
    // $tDate4 = $rowSelect4['time_Date'];
    $sql2 = "SELECT * FROM emp_reg WHERE emp_ID = '$leaveID1';" ;
    $result2 = mysql_query($sql2);
    $row2 = mysql_fetch_array($result2);

    $sqlSelect2 = "SELECT * FROM emp_reg WHERE emp_ID = '$leaveID1';" ;
    $resultSelect2 = mysql_query($sqlSelect2);
    $rowSelect2 = mysql_fetch_array($resultSelect2);
    $add_sl = $rowSelect2['emp_SLBal'];
    $add_vl = $rowSelect2['emp_VLBal'];
    $e_sl = $rowSelect2['emp_SL'];
    $e_vl = $rowSelect2['emp_VL'];
    $emp_status = $rowSelect2['emp_Status'];

    $sql1 = "SELECT * FROM emp_reg WHERE emp_ID = '$leaveID1';" ;
    $result2 = mysql_query($sql1);
    $row2 = mysql_fetch_array($result2);
    // $add_balance = $row2['emp_Balance'];

    $sql = "SELECT * FROM leave_record WHERE leave_ID = '$leaveID1';" ;
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $lf = $row['leave_From'];
    $lt = $row['leave_To'];
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
// code for sl
    if($e_sl >= 1 AND $_POST['l_status'] == 'SL' AND $emp_status == 'Active' AND $e_sl >= $day AND $_POST['l_fdate'] != $row['leave_From'] AND $_POST['l_tdate'] != $row['leave_To'])
        {
        // if(date("Y-m-d") > date("Y-m-d"))
        // {
    $dstart = $_POST['l_fdate']; // starting date
    $estart = $_POST['l_tdate']; // end date

    $day = (strtotime($estart) - strtotime($dstart))/24/3600+1;
    $points = ".25" * $day;
    $earn = $day + $points;


    $leave_PoL = date("M.- Y");
    $leave_PoL2 = date("M.- Y");
    $leave_Particular1 = "(". $day . "-0-0)"." SL";
    $leave_ID = $_POST['l_id'];
    $leave_Earned = "1.25";
    // $leave_ABSwp = $leave_Balance;
    $leave_ABSwp = $day;
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
    $e_sl = $rowSelect2['emp_SL'];
    $add_vl = $rowSelect2['emp_VLBal'];
    $emp_vbal = $row['emp_VLBal'];


    $sqlSelect2 = "SELECT * FROM emp_reg WHERE emp_ID = '$leaveID1';" ;
    $resultSelect2 = mysql_query($sqlSelect2);
    $rowSelect2 = mysql_fetch_array($resultSelect2);
    $add_balance2 = $rowSelect2['emp_Balance'];
    $emp_status = $rowSelect2['emp_Status'];
    $emp_TLeave = $rowSelect2['emp_TSL'];
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
    $leave_Balance = $e_sl - $day;
    $leave_Deduct = $e_sl - $leave_ABSwp;
    // $Balance3 = $leave_Earned2 + $leave_Balance2;
    $leave_DAT = date("M d, Y");
    $emp_tl = $day + $emp_TLeave;
    //$points = "1.25";
    // $balance = "5" . " as of " . date("Y-m-d") . ".";
    // $deduct1 = $leave_Balance - $leave_Earned;
    // $day = (strtotime($ldate)-strtotime($ldate))/24/3600+1;
    // $day1 = $day;
    // // echo "<br />";
    // $vl_earn = ".042" * $day1 + $add_vl;
    // $sl_earn = ".042" * $day1 + $add_sl;
    $sql2 = "UPDATE emp_reg SET emp_TSL = '$emp_tl', emp_SL = '$leave_Balance' WHERE emp_ID = '$leaveID2' ;";
    mysql_query($sql2);


    $sql = "INSERT INTO leave_record VALUES ('$leave_ID','$leave_From','$leave_To','$leave_NoD','','$leave_Status','','','','','$leave_Particular1','$leave_ABSwp','','','','$l_Name','$leave_DAT','','$leave_Deduct','','$leave_PoL2','')";
    $result = mysql_query($sql);
    if(!$result)
    $sqlError = "Error inserting record " .mysql_error();
    elseif ($result) {
        $sqlError = "Record added successfully!";
        header("Location:m_page.php");

    return $sqlError;
    }  
}
// code for vl
        elseif($e_vl >= 1 AND $_POST['l_status'] == 'VL' AND $emp_status == 'Active' AND $e_vl >= $day AND $_POST['l_fdate'] != $row['leave_From'] AND $_POST['l_tdate'] != $row['leave_To'])
            {
        // if(date("Y-m-d") > date("Y-m-d"))
        // {
    $dstart = $_POST['l_fdate']; // starting date
    $estart = $_POST['l_tdate']; // end date

    $day = (strtotime($estart) - strtotime($dstart))/24/3600+1;
    $points = ".25" * $day;
    $earn = $day + $points;

    $leave_PoL = date("M.- Y");
    $leave_PoL2 = date("M.- Y");
    $leave_Particular1 = "(". $day . "-0-0)"." VL";
    $leave_ID = $_POST['l_id'];
    $leave_Earned = "1.25";
    // $leave_ABSwp = $leave_Balance;
    $leave_ABSwp = $day;
    $l_Name = $_POST['l_name'];
    $leave_From = $_POST['l_fdate'];
    $leave_To = $_POST['l_tdate'];
    $leave_NoD =  $day;

    $leave_Status = $_POST['l_status'];
   

    $sqlSelect2 = "SELECT * FROM emp_reg WHERE emp_ID = '$leaveID2' ;" ;
    $resultSelect2 = mysql_query($sqlSelect2);
    $rowSelect2 = mysql_fetch_array($resultSelect2);
    $add_vl = $rowSelect2['emp_VLBal'];

    $sqlError = '';
    $leave_ID2 = $_POST['l_id'];
    $sqlSelect = "SELECT * FROM emp_reg WHERE emp_ID = '$leave_ID2';" ;
    $resultSelect = mysql_query($sqlSelect);
    $rowSelect = mysql_fetch_array($resultSelect);
    $add_vl = $rowSelect['emp_VLBal'];
    $e_vl = $rowSelect['emp_VL'];


    $sqlSelect2 = "SELECT * FROM emp_reg WHERE emp_ID = '$leave_ID2';" ;
    $resultSelect2 = mysql_query($sqlSelect2);
    $rowSelect2 = mysql_fetch_array($resultSelect2);
    $add_sl = $rowSelect2['emp_SLBal'];
    $emp_vbal = $row['emp_VLBal'];
    $emp_TLeave = $rowSelect2['emp_TVL'];


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
    $leave_Balance = $e_vl - $day;
    $leave_Deduct = $e_vl - $leave_ABSwp;
    // $Balance3 = $leave_Earned2 + $leave_Balance2;
    $leave_DAT = date("M d, Y");
    //$points = "1.25";
    // $balance = "5" . " as of " . date("Y-m-d") . ".";
    // $deduct1 = $leave_Balance - $leave_Earned;
    $leave_DAT = date("M d, Y");
    $emp_tl = $day + $emp_TLeave;
    //$points = "1.25";
    // $balance = "5" . " as of " . date("Y-m-d") . ".";
    // $deduct1 = $leave_Balance - $leave_Earned;
    // $day = (strtotime($ldate)-strtotime($ldate))/24/3600+1;
    // $day1 = $day;
    // // echo "<br />";
    // $vl_earn = ".042" * $day1 + $add_vl;
    // $sl_earn = ".042" * $day1 + $add_sl;
    $sql2 = "UPDATE emp_reg SET emp_TVL = '$emp_tl', emp_VL = '$leave_Balance' WHERE emp_ID = '$leaveID2' ;";
    mysql_query($sql2);


    $sql = "INSERT INTO leave_record VALUES ('$leave_ID','$leave_From','$leave_To','$leave_NoD','$leave_Earned','$leave_Status','$leave_ABSwp','','','','$leave_Particular1','','','','', '$l_Name', '$leave_DAT','$leave_Deduct','','','$leave_PoL','')";
    
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
        elseif($_POST['l_status'] == 'SPL' AND $emp_status == 'Active')
            {
        // if(date("Y-m-d") > date("Y-m-d"))
        // {
    $dstart = $_POST['l_fdate']; // starting date
    $estart = $_POST['l_tdate']; // end date

    $day = (strtotime($estart) - strtotime($dstart))/24/3600+1;
    $points = ".25" * $day;
    $earn = $day + $points;

    $leave_PoL = date("M.- Y");
    $leave_PoL2 = date("M.- Y");
    $leave_Particular1 = "(". $day . "-0-0)"." SPL";
    $leave_ID = $_POST['l_id'];
    $leave_Earned = "1.25";
    // $leave_ABSwp = $leave_Balance;
    $leave_ABSwp = $day;
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
    // $leave_Balance = $add_vl - $day;
    // $leave_Deduct = $add_vl - $leave_ABSwp;
    // $Balance3 = $leave_Earned2 + $leave_Balance2;
    $leave_DAT = date("M d, Y");
    $spl = $_POST['rdo_status'];
    //$points = "1.25";
    // $balance = "5" . " as of " . date("Y-m-d") . ".";
    // $deduct1 = $leave_Balance - $leave_Earned;

    // $day = (strtotime($ldate)-strtotime($ldate))/24/3600+1;
    // $day1 = $day;
    // // echo "<br />";
    // $vl_earn = ".042" * $day1 + $add_vl;
    // $sl_earn = ".042" * $day1 + $add_sl;
    // $sql2 = "UPDATE emp_reg SET emp_VLBal = '$leave_Balance' WHERE emp_ID = '$leaveID2' ;";
    // mysql_query($sql2);


    $sql = "INSERT INTO leave_record VALUES ('$leave_ID','$leave_From','$leave_To','$leave_NoD','','$leave_Status','','','','','$leave_Particular1','','','','', '$l_Name', '$leave_DAT','','','','$leave_PoL','$spl')";
    
    $result = mysql_query($sql);
    if(!$result)
    $sqlError = "Error inserting record " .mysql_error();
    elseif ($result) {
        $sqlError = "Record added successfully!";
        header("Location:m_page.php");

    return $sqlError;
    }
// code for fl
            }
        elseif($e_vl >= 1 AND $_POST['l_status'] == 'FL' AND $emp_status == 'Active' AND $e_vl >= $day AND $_POST['l_fdate'] != $row['leave_From'] AND $_POST['l_tdate'] != $row['leave_To'])
            {
        // if(date("Y-m-d") > date("Y-m-d"))
        // {
    $dstart = $_POST['l_fdate']; // starting date
    $estart = $_POST['l_tdate']; // end date

    $day = (strtotime($estart) - strtotime($dstart))/24/3600+1;
    $points = ".25" * $day;
    $earn = $day + $points;

    $leave_PoL = date("M.- Y");
    $leave_PoL2 = date("M.- Y");
    $leave_Particular1 = "(". $day . "-0-0)"." FL";
    $leave_ID = $_POST['l_id'];
    $leave_Earned = "1.25";
    // $leave_ABSwp = $leave_Balance;
    $leave_ABSwp = $day;
    $l_Name = $_POST['l_name'];
    $leave_From = $_POST['l_fdate'];
    $leave_To = $_POST['l_tdate'];
    $leave_NoD =  $day;

    $leave_Status = $_POST['l_status'];
   

    $sqlSelect2 = "SELECT * FROM emp_reg WHERE emp_ID = '$leaveID2' ;" ;
    $resultSelect2 = mysql_query($sqlSelect2);
    $rowSelect2 = mysql_fetch_array($resultSelect2);
    $add_vl = $rowSelect2['emp_VLBal'];

    $sqlError = '';
    $leave_ID2 = $_POST['l_id'];
    $sqlSelect = "SELECT * FROM emp_reg WHERE emp_ID = '$leave_ID2';" ;
    $resultSelect = mysql_query($sqlSelect);
    $rowSelect = mysql_fetch_array($resultSelect);
    $add_vl = $rowSelect['emp_VLBal'];
    $e_vl = $rowSelect['emp_VL'];


    $sqlSelect2 = "SELECT * FROM emp_reg WHERE emp_ID = '$leave_ID2';" ;
    $resultSelect2 = mysql_query($sqlSelect2);
    $rowSelect2 = mysql_fetch_array($resultSelect2);
    $add_sl = $rowSelect2['emp_SLBal'];
    $emp_vbal = $row['emp_VLBal'];
    $emp_TLeave = $rowSelect2['emp_TVL'];


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
    $leave_Balance = $e_vl - $day;
    $leave_Deduct = $e_vl - $leave_ABSwp;
    // $Balance3 = $leave_Earned2 + $leave_Balance2;
    $leave_DAT = date("M d, Y");
    $emp_tl = $day + $emp_TLeave;
    //$points = "1.25";
    // $balance = "5" . " as of " . date("Y-m-d") . ".";
    // $deduct1 = $leave_Balance - $leave_Earned;
    // $day = (strtotime($ldate)-strtotime($ldate))/24/3600+1;
    // $day1 = $day;
    // // echo "<br />";
    // $vl_earn = ".042" * $day1 + $add_vl;
    // $sl_earn = ".042" * $day1 + $add_sl;
    $sql2 = "UPDATE emp_reg SET emp_TVL = '$emp_tl', emp_VL = '$leave_Balance' WHERE emp_ID = '$leaveID2' ;";
    mysql_query($sql2);


    $sql = "INSERT INTO leave_record VALUES ('$leave_ID','$leave_From','$leave_To','$leave_NoD','$leave_Earned','$leave_Status','$leave_ABSwp','','','','$leave_Particular1','','','','', '$l_Name', '$leave_DAT','$leave_Deduct','','','$leave_PoL','')";
    
    $result = mysql_query($sql);
    if(!$result)
    $sqlError = "Error inserting record " .mysql_error();
    elseif ($result) {
        $sqlError = "Record added successfully!";
        header("Location:m_page.php");

    return $sqlError;
    }
            }
// code for sl w/o pay
    elseif($e_sl < 1 AND $_POST['l_status'] == 'SL' AND $_POST['l_fdate'] != $row['leave_From'] AND $_POST['l_tdate'] != $row['leave_To'])
            {
        // if(date("Y-m-d") > date("Y-m-d"))
        // {
    $dstart = $_POST['l_fdate']; // starting date
    $estart = $_POST['l_tdate']; // end date

    $day = (strtotime($estart) - strtotime($dstart))/24/3600+1;
    $points = ".25" * $day;
    $earn = $day + $points;


    $leave_PoL = date("M.- Y");
    $leave_PoL2 = date("M.- Y");
    $leave_Particular1 = "(". $day . "-0-0)"." SL";
    $leave_ID = $_POST['l_id'];
    $leave_Earned = "1.25";
    // $leave_ABSwp = $leave_Balance;
    $leave_ABSwp = $day;
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
    $add_vl = $rowSelect2['emp_VLBal'];
    $emp_vbal = $row['emp_VLBal'];


    $sqlSelect2 = "SELECT * FROM emp_reg WHERE emp_ID = '$leaveID1';" ;
    $resultSelect2 = mysql_query($sqlSelect2);
    $rowSelect2 = mysql_fetch_array($resultSelect2);
    $add_balance2 = $rowSelect2['emp_Balance'];
    $emp_status = $rowSelect2['emp_Status'];

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
    $leave_Balance = $add_sl - $day;
    $leave_Deduct = $add_sl - $leave_ABSwp;
    // $Balance3 = $leave_Earned2 + $leave_Balance2;
    $leave_DAT = date("M d, Y");
    //$points = "1.25";
    // $balance = "5" . " as of " . date("Y-m-d") . ".";
    // $deduct1 = $leave_Balance - $leave_Earned;
    // $day = (strtotime($ldate)-strtotime($ldate))/24/3600+1;
    // $day1 = $day;
    // // echo "<br />";
    // $vl_earn = ".042" * $day1 + $add_vl;
    // $sl_earn = ".042" * $day1 + $add_sl;
    // $sql2 = "UPDATE emp_reg SET emp_SLBal = '$leave_Balance' WHERE emp_ID = '$leaveID2' ;";
    // mysql_query($sql2);
$sts = "Inactive";

    $sql = "UPDATE emp_reg SET emp_Status = '$sts' WHERE emp_ID = '$leaveID2';";
    mysql_query($sql);

    $sql = "INSERT INTO leave_record VALUES ('$leave_ID','$leave_From','$leave_To','$leave_NoD','','$leave_Status','','','','','$leave_Particular1','','$leave_NoD','','','$l_Name','$leave_DAT','','$add_sl','','$leave_PoL2','')";
    $result = mysql_query($sql);
    if(!$result)
    $sqlError = "Error inserting record " .mysql_error();
    elseif ($result) {
        $sqlError = "Record added successfully!";
        header("Location:m_page.php");

    return $sqlError;
    }  
}
// code for vl w/o pay
elseif($e_vl < 1 AND $_POST['l_status'] == 'VL' AND $_POST['l_fdate'] != $row['leave_From'] AND $_POST['l_tdate'] != $row['leave_To'])
            {
        // if(date("Y-m-d") > date("Y-m-d"))
        // {
    $dstart = $_POST['l_fdate']; // starting date
    $estart = $_POST['l_tdate']; // end date

    $day = (strtotime($estart) - strtotime($dstart))/24/3600+1;
    $points = ".25" * $day;
    $earn = $day + $points;

    $leave_PoL = date("M.- Y");
    $leave_PoL2 = date("M.- Y");
    $leave_Particular1 = "(". $day . "-0-0)"." VL";
    $leave_ID = $_POST['l_id'];
    $leave_Earned = "1.25";
    // $leave_ABSwp = $leave_Balance;
    $leave_ABSwp = $day;
    $l_Name = $_POST['l_name'];
    $leave_From = $_POST['l_fdate'];
    $leave_To = $_POST['l_tdate'];
    $leave_NoD =  $day;

    $leave_Status = $_POST['l_status'];
   

    $sqlSelect2 = "SELECT * FROM emp_reg WHERE emp_ID = '$leaveID2' ;" ;
    $resultSelect2 = mysql_query($sqlSelect2);
    $rowSelect2 = mysql_fetch_array($resultSelect2);
    $add_vl = $rowSelect2['emp_VLBal'];

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
    $leave_Balance = $add_vl - $day;
    $leave_Deduct = $add_vl - $leave_ABSwp;
    // $Balance3 = $leave_Earned2 + $leave_Balance2;
    $leave_DAT = date("M d, Y");
    //$points = "1.25";
    // $balance = "5" . " as of " . date("Y-m-d") . ".";
    // $deduct1 = $leave_Balance - $leave_Earned;

    // $day = (strtotime($ldate)-strtotime($ldate))/24/3600+1;
    // $day1 = $day;
    // // echo "<br />";
    // $vl_earn = ".042" * $day1 + $add_vl;
    // $sl_earn = ".042" * $day1 + $add_sl;
    // $sql2 = "UPDATE emp_reg SET emp_VLBal = '$leave_Balance' WHERE emp_ID = '$leaveID2' ;";
    // mysql_query($sql2);
$sts = "Inactive";

    $sql = "UPDATE emp_reg SET emp_Status = '$sts' WHERE emp_ID = '$leaveID2';";
    mysql_query($sql);

    $sql = "INSERT INTO leave_record VALUES ('$leave_ID','$leave_From','$leave_To','$leave_NoD','$leave_Earned','$leave_Status','','$leave_NoD','','','$leave_Particular1','','','','','$l_Name','$leave_DAT','$add_vl','','','$leave_PoL','')";
    
    $result = mysql_query($sql);
    if(!$result)
    $sqlError = "Error inserting record " .mysql_error();
    elseif ($result) {
        $sqlError = "Record added successfully!";
        header("Location:m_page.php");

    return $sqlError;
    }

        }
        else
                $sqlError = "Insufficient Balance or Date already exists or Inactive User!";
            }
    return $sqlError;

            }
?>

<!-- 
    $dstart = $_POST['l_fdate']; // starting date
    $estart = $_POST['l_tdate']; // end date

    $day = (strtotime($estart) - strtotime($dstart))/24/3600+1;
    echo $day;
    echo "<br />";
    $points = ".25" * $day;
    echo $day + $points;
    // $date1 = $startdatum;
    // $date2 = $einddatum;
    // echo $date2-($date1); -->