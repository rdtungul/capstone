<?php
include ("connect.php");
mysql_select_db($dbName);


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
?>