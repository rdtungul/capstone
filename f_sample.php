<?php
include ("connect.php");
mysql_select_db($dbName);

function empLeave()
{

    $leaveID1 = $_POST['l_id'];
    $sqlError = '';
    //$time_Date4 = $_POST['time_date'];
    // $vlstatus = $_POST['l_status'];
    

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
    $add_vl = $rowSelect2['emp_VLBal'];

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

        if($_POST['l_status'] == 'spl')
            {
        // if(date("Y-m-d") > date("Y-m-d"))
        // {
    $dstart = $_POST['l_fdate']; // starting date
    $estart = $_POST['l_tdate']; // end date

    $day = (strtotime($estart) - strtotime($dstart))/24/3600+1;
    $points = ".25" * $day;
    $earn = $day + $points;

    $leave_PoL = date("M.-Y");
    $leave_PoL2 = date("M.-Y");
    // $leave_Particular1 = "(". $day . "-0-0)"." VL";
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

            }
        // elseif (($row['mgrPword']==$password)&&($row['mgrUname']==$username)) {
        //     header("Location:display_items.php");
        // }
        
        else
                $sqlError = "Insufficient Balance!";
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