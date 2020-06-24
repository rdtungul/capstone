<?php
    session_start();
    include ("connect.php");
    mysql_select_db($dbName);

function validateLogin()
{
    $username = $_POST['uname'];
    $password  = $_POST['pword'];
    $errorMessage = '';

    $unm = strtolower ($username);
    $pwd = strtolower ($password);

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
            if($row2['emp_ID']==$username AND $row2['emp_Lname']==$password)
            {
                $_SESSION["uID"]=$row2['emp_ID'];
                // $_SESSION["uID"]=$row2['emp_ID'];
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
                $_SESSION["Name"]=$row['Position'];

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