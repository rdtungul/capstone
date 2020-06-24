<?php
include ("connect.php");
mysql_select_db($dbName);
                
    // $leaveID1 = $_SESSION["uID"]=$row['emp_ID'];
    // $sqlError = '';
    // //$time_Date4 = $_POST['time_date'];
    // // $vlstatus = $_POST['l_status'];
    // $dstart = $_POST['l_fdate']; // starting date
    // $estart = $_POST['l_tdate']; // end date

    // $day = (strtotime($estart) - strtotime($dstart))/24/3600+1;

    // $sql1 = "SELECT * FROM emp_reg WHERE emp_ID = '$leaveID1';" ;
    // $result1 = mysql_query($sql1);

    // $sql2 = "SELECT * FROM leave_record WHERE leave_ID = '$leaveID1';" ;
    // $result2 = mysql_query($sql2);
    // $row2 = mysql_fetch_array($result2);
    //$tdate = $rowSelect3['time_Date'];
    // $tDate4 = $rowSelect4['time_Date'];
    // $sql2 = "SELECT * FROM emp_reg WHERE emp_ID = '$leaveID1';" ;
    // $result2 = mysql_query($sql2);
    // $row2 = mysql_fetch_array($result2);

    $sql = "SELECT * FROM emp_reg WHERE emp_ID = emp_ID;" ;
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    // $add_sl = $rowSelect2['emp_SLBal'];
    // $add_vl = $rowSelect2['emp_VLBal'];
    $e_sl = $row['emp_SL'];
    $e_vl = $row['emp_VL'];
    // $emp_status = $rowSelect2['emp_Status'];

    // $sql1 = "SELECT * FROM emp_reg WHERE emp_ID = '$leaveID1';" ;
    // $result2 = mysql_query($sql1);
    // $row2 = mysql_fetch_array($result2);
    // // $add_balance = $row2['emp_Balance'];

    // $sql = "SELECT * FROM leave_record WHERE leave_ID = '$leaveID1';" ;
    // $result = mysql_query($sql);
    // $row = mysql_fetch_array($result);
    // $lf = $row['leave_From'];
    // $lt = $row['leave_To'];
    // $sl2 = $rowSelect2['emp_SLBal'];
    // $emp_sbal = $row['emp_SLBal'];
    // $sqlSelect4 = "SELECT * FROM emp_reg WHERE emp_ID = '$time_ID2';" ;
    // $resultSelect2 = mysql_query($sqlSelect2);
    // $rowSelect2 = mysql_fetch_array($resultSelect2);
    // $add_sl = $rowSelect2['emp_SLBal'];

    // $sql   = "SELECT * FROM cashier WHERE csUname = '$username';" ;
    // $result = mysql_query($sql);


    if (mysql_num_rows($result) > 0)
        {
            $row = mysql_fetch_array($result);

if($e_sl < 1 and $e_vl < 1)
{
    $leave_ID2 = $_POST['l_id'];
    $sqlSelect = "SELECT * FROM emp_reg WHERE emp_ID = '$leave_ID2';" ;
    $resultSelect = mysql_query($sqlSelect);
    $rowSelect = mysql_fetch_array($resultSelect);
    // $add_vl = $rowSelect['emp_VLBal'];
    $sts = "Inactive";

    $sql = "UPDATE emp_reg SET emp_Status = '$sts' WHERE emp_ID = '$leaveID2';";
    mysql_query($sql);
    $result = mysql_query($sql);
    if(!$result)
    $sqlError = "Error inserting record " .mysql_error();
    elseif ($result) {
        $sqlError = "Record added successfully!";
        header("Location:m_page.php");

    return $sqlError;

        }
        else
                $sqlError = "Insufficient Balance or Date already exists or Inactive User!";
            }
    return $sqlError;

            }
?>