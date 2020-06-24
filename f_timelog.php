<?php
include ("connect.php");
mysql_select_db($dbName);

function timeAdd()
{

    $time_ID3 = $_POST['time_id'];
    $sqlError = '';
    $time_Date4 = $_POST['time_date'];

    $sqlSelect3 = "SELECT * FROM emp_reg WHERE emp_ID = '$time_ID3';" ;
    $resultSelect3 = mysql_query($sqlSelect3);


    $sqlSelect4 = "SELECT * FROM time_record WHERE time_Date = '$time_Date4';" ;
    $resultSelect4 = mysql_query($sqlSelect4);
    $rowSelect4 = mysql_fetch_array($resultSelect4);
    //$tdate = $rowSelect3['time_Date'];
    $tDate4 = $rowSelect4['time_Date'];

    // $sqlSelect4 = "SELECT * FROM emp_reg WHERE emp_ID = '$time_ID2';" ;
    // $resultSelect2 = mysql_query($sqlSelect2);
    // $rowSelect2 = mysql_fetch_array($resultSelect2);
    // $add_sl = $rowSelect2['emp_SLBal'];

    // $sql   = "SELECT * FROM cashier WHERE csUname = '$username';" ;
    // $result = mysql_query($sql);


        if (mysql_num_rows($resultSelect3) > 0)
            {
                $row = mysql_fetch_array($resultSelect4);

        if($row['time_ID']==$tDate4)
            {
        // if(date("Y-m-d") > date("Y-m-d"))
        // {

    $time_ID = $_POST['time_id'];
    $time_Date = $_POST['time_date'];
    $time_Am1 = $_POST['time_am1'];
    $time_Am2 = $_POST['time_am2'];
    $time_Pm1 =  $_POST['time_pm1'];
    $time_Pm2 = $_POST['time_pm2'];
    


    include("connect.php");
    mysql_select_db($dbName);

    $sqlError = '';
    $time_ID2 = $_POST['time_id'];
    // $sqlSelect = "SELECT * FROM emp_reg WHERE emp_ID = '$time_ID2';" ;
    // $resultSelect = mysql_query($sqlSelect);
    // $rowSelect = mysql_fetch_array($resultSelect);
    // $add_vl = $rowSelect['emp_VLBal'];


    $sqlSelect2 = "SELECT * FROM emp_reg WHERE emp_ID = '$time_ID2';" ;
    $resultSelect2 = mysql_query($sqlSelect2);
    $rowSelect2 = mysql_fetch_array($resultSelect2);
    $add_sl = $rowSelect2['emp_SLBal'];
    // $emp_vbal = $row['emp_VLBal'];
    // $emp_sbal = $row['emp_SLBal'];
    // $sql3 = "SELECT * FROM emp_reg WHERE emp_VLBal = '$emp_vbal' AND emp_SLBal = emp_VLBal;" ;
    // mysql_query($sql2);


    $time_ID2 = $_POST['time_id'];
    $ldate = $_POST['time_date']; // starting date
    //$estart = $_POST['l_tdate']; // end date

    //$points = "1.25";
    // $balance = "5" . " as of " . date("Y-m-d") . ".";


    $day = (strtotime($ldate)-strtotime($ldate))/24/3600+1;
    $day1 = $day;
    // echo "<br />";
    // $vl_earn = ".042" * $day1 + $add_vl;
    $sl_earn = ".042" * $day1 + $add_sl;
   
    $sql2 = "UPDATE emp_reg SET emp_SLBal = '$sl_earn' WHERE emp_ID = '$time_ID2' ;";
        //echo("sql3 = ".$sql3);
    mysql_query($sql2);

    $sql = "INSERT INTO time_record VALUES ('$time_ID','$time_Date','$time_Am1','$time_Am2','$time_Pm1','$time_Pm2')";
    
    $result = mysql_query($sql);
    if(!$result)
    $sqlError = "Error inserting record " .mysql_error();
    elseif ($result) {
        $sqlError = "Record added successfully!";
        header("Location:m_page.php");
    // if ($add_vl >= 1.25){
    //     $sql3 = "UPDATE emp_reg SET emp_Balance = '$balance' WHERE emp_ID = '$time_ID2' ;";
    //     mysql_query($sql3);
    // }
    return $sqlError;
    }

            }
        // elseif (($row['mgrPword']==$password)&&($row['mgrUname']==$username)) {
        //     header("Location:display_items.php");
        // }
        
        else
                $sqlError = "Date already exist!";
            }

        return $sqlError;
            }

   


//  function timePoints(){


//     $time_ID = $_POST['time_id'];


//     echo '<script type="text/javascript"> window.open("m_page.php","_self");</script>';
//     return $bError;

// }
// function valMgr(){

//      $sqlError='';

//      $muid = $_POST['mgrid'];
//      $munm = $_POST['mgruname'];

//      $sql = "SELECT * FROM manager WHERE mgrID = '$muid' OR mgrUname = '$muid' ";
//      $result = mysql_query($sql);
//      $row = mysql_fetch_array($result);

//      if (mysql_num_rows($result) > 0)
//      {
//          if (($row['mgrUname'] == $munm) AND ($row['mgrID'] == $muid)){
//              $sqlError="Manager ID and Username already taken!";
//          }
//          elseif ($row['mgrUname'] == $munm)
//              $sqlError="Username already taken!";
//          else
//              $sqlError="Username already Taken!";
//      }
//      else
//          $sqlError=addMgr();
//      return $sqlError;
//  }
?>