<?php
  session_start();
  include('connect.php');
  mysql_select_db($dbName);
  include("nav.php");
  include('f_apword.php');

    if(!(isset($_SESSION["uID"])))
    header("Location:user_login.php");


    $errorPword = '&nbsp';

    if (isset($_POST['ch_pword']))
        {
        $result = chAcc();
        if ($result != ''){
        $errorPword = $result;
    }
    }
    //    if(!(isset($_SESSION["uID"])))
    //        header("Location:sample.php");
    // if (isset($_POST['log_date']))
    //     {
    //     $result = empDate();
    //     if ($result != ''){
    //         $sqlError = $result;
    //     }
    // }
  // if(isset($_POST['mgrid'])){
  //    $result = addMgr();
  //  }
    
  // $sqlError = '&nbsp';

    // if (isset($_POST['e_id']))
    // {
    //     $result = addEmp();
    //     if ($result != ''){
    //         $sqlError = $result;
    //     }
    // }
  //   if (isset($_POST['mgrid']))
  //   {
  //       $result = valMgr();
  //       if ($result != ''){
  //           $sqlError = $result;
  //       }
  //   }

  // $sql = "SELECT * FROM emp_reg WHERE emp_ID = ".isset($_POST['e_ID']);
  // $result = mysql_query($sql);
  // $row = mysql_fetch_row($result)

  // if (isset($_GET['ID']))
  // {
  //   $sqlSelect = "SELECT * FROM emp_reg WHERE emp_ID = '".$_GET['ID']."'";
  //   $resultSelect = mysql_query($sqlSelect);
  //   $rowSelect = mysql_fetch_array($resultSelect);
  // }
    $sql = "SELECT * FROM user_log ORDER BY ul_ID asc";
    $result = mysql_query($sql);

  // $sql = "SELECT * FROM emp_reg ORDER BY emp_ID desc limit 1";
  // $result = mysql_query($sql);
?>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!--       <script>
        $( function() {
          $( "#l_fdate" ).datepicker({
            minDate: 0
          });
        });

        $( function() {
          $( "#l_tdate" ).datepicker({
            minDate: 0
          });
        });
      </script> -->



<link rel="stylesheet" type="text/css" href="css/add_rec.css">


<div class="container">
 <table align="center">
                <tr align="center">
                    <td><h3 class="usrlog"><?php
                            if ($errorPword == '&nbsp')
                                echo("Change Password");
                            else
                                echo "<h4>".($errorPword)."</h4>";
                        ?></h3></td>
                </tr>
</table>
  <?php  
      while($row = mysql_fetch_array($result)){
  ?>

  <form method="POST">
    <div class="form-group">

      <label class="emp_form">Username</label>
      <input type="text" class="form-control" value="<?php echo $row['ul_Uname']; ?>" name="ch_uname" readonly>
      <label class="emp_form">Password</label>
      <input type="text" class="form-control" value="<?php echo $row['ul_Pword']; ?>" name="ch_pword">
      <button type="submit" class="btn btn-default" style="margin-top: 10px; width: 100%; height: 50px; background-color: rgb(104, 145, 162); color: white; font-size: 20px;">Change</button>

</div>
  </form>
<?php } ?>
</div>
</body>
</html>