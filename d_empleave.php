<?php
  session_start();
  include('connect.php');
  mysql_select_db($dbName);
  include("nav.php");
  // include('f_leave.php');

  if(!(isset($_SESSION["uID"])))
  header("Location:user_login.php");
  //    if(!(isset($_SESSION["uID"])))
  //        header("Location:sample.php");
  // $sqlError = '&nbsp';
  
  //     if (isset($_POST['l_id']))
  //   {
  //       $result = empLeave();
  //       if ($result != ''){
  //           $sqlError = $result;
  //       }
  //   }
  // if(isset($_POST['mgrid'])){
  //    $result = addMgr();
  //  }
    


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

		if (isset($_GET['ID']))
	{
		$sqlSelect = "SELECT * FROM emp_reg WHERE emp_ID = '".$_GET['ID']."'";
		$resultSelect = mysql_query($sqlSelect);
		$rowSelect = mysql_fetch_array($resultSelect);
	}

  $sql1 = "SELECT * FROM leave_record WHERE leave_ID = '".$_GET['ID']."'";
  $result1 = mysql_query($sql1);

    $sql2 = "SELECT * FROM add_points WHERE  add_ID = '".$_GET['ID']."' ";
  $result2 = mysql_query($sql2);
  // $sql1 = "SELECT * FROM leave_record ORDER BY leave_ID = '".$_GET['ID']."' desc limit 2";
  // $result1 = mysql_query($sql1);

  $sql = "SELECT * FROM emp_reg WHERE emp_ID = '".$_GET['ID']."'";
  $result = mysql_query($sql);
  // $sql = "SELECT * FROM emp_reg ORDER BY  emp_ID = '".$_GET['ID']."' desc limit 2";
  // $result = mysql_query($sql);
?>

<style type="text/css">
  .table{
    width: 1000px;
  }
  .rep{
    width: 1020px;
    margin: 0px;
  }
  .lr{
    font-weight: bold;
    margin: 0px;
  }
  .vl{
    text-align: right;
  }
.vlsl{
  text-align: center;
}
</style>

<div class="container">

  <form method="POST">
    <table border = "1" align="center" class="table">

      <p class="rep" align="right">REPUBLIC OF THE PHILIPPINES<BR >PROVINCE OF PAMPANGA<BR >MUNICIPALITY OF GUAGUA</p>
      <h1 align="center" class="lr">EMPLOYEE'S LEAVE RECORD</h1>

  <br >
  <br >
  

      <thead>
        <tr>
          <th colspan="3">EMPLOYEE NAME</th>
          <!-- <th>Middle Name</th>
          <th>Last Name</th> -->
          <th colspan="3">POSITION TITLE</th>
          <th colspan="5">DIVISION</th>
        </tr>
      </thead>


      <?php  
              while($row = mysql_fetch_array($result)){
      ?>
  <!-- <?php //echo("onclick=\"location='e_leave.php?ID=".$row['emp_ID']."'\" ") ?> --> 
        <td colspan="3"><?php echo $row['emp_Fname'] . " " . $row['emp_Mname'] . " " . $row['emp_Lname']; ?></td>
        <!-- <td><?php //echo $row['emp_Mname']; ?></td>
        <td><?php //echo $row['emp_Lname']; ?></td> -->
        <td colspan="3"><?php echo $row['emp_Position']; ?></td>
        <td colspan="5"><?php echo $row['emp_Div']; ?></td> 
 

    
        <!-- <table border = "1" class="table table-hover"> -->
      <!-- <thead> -->
          <!-- <th>Address</th> -->
        <tr>
          <th colspan="5">HOME ADDRESS</th>
          <th colspan="6">FIRST DAY OF SERVICE</th>
        </tr>
          <!-- <th>Leave Points</th> -->
          <!-- <th>Leave Balance</th> -->
      <!-- </thead> -->


  <!-- <?php //echo("onclick=\"location='e_leave.php?ID=".$row['emp_ID']."'\" ") ?> --> 

        <tbody>
        <!-- <td><?php //echo $row['emp_Address']; ?></td> --> 
      <!-- <td><?php //echo $row['emp_VLBal']; ?></td> -->

        <td colspan="5"><?php echo $row['emp_Address']; ?></td>
        <td colspan="6"><?php echo $row['emp_Fds']; ?></td>
        <!-- <td><?php //echo $row['emp_Balance']; ?></td> -->
        </tbody>
        <?php } ?>



        <tr>
          <th></th>
          <th></th>
          <th class="vlsl" colspan="4">VACATION LEAVE</th>
          <th class="vlsl" colspan="4">SICK LEAVE</th>
          <th></th>
        </tr>
          <!-- <th>Leave Points</th> -->
          <!-- <th>Leave Balance</th> -->
        <tr>
          <th class="vlsl">Period of leave</th>
          <th class="vlsl">Particular</th>
          <th class="vlsl">Earned</th>
          <th class="vlsl">ABS<br >Und. w/P</th>
          <th class="vlsl">ABS<br >Und. w/o P</th>
          <th class="vlsl">Balance</th>
          <th class="vlsl">Earned</th>
          <th class="vlsl">ABS w/P</th>
          <th class="vlsl">ABS w/o P</th>
          <th class="vlsl">Balance</th>
          <th class="vlsl">Date and Action <br >Taken/Evaluation</th>
        </tr>
        
        <tbody>
        <!-- <td><?php //echo $row['emp_Address']; ?></td> --> 
      <!-- <td><?php //echo $row['emp_VLBal']; ?></td> -->
      <?php  
        while($row2 = mysql_fetch_array($result2)){
      ?>

        <td><?php echo $row2['add_PoL']; ?></td>
        <td></td>
        <td><?php echo $row2['add_Earned']; ?></td>
        <td></td>
        <td></td>
        <td><?php echo $row2['add_VL']; ?></td>
        <td><?php echo $row2['add_Earned']; ?></td>
        <td></td>
        <td></td>
        <td><?php echo $row2['add_SL']; ?></td>
        <td></td>
        <!-- <td><?php //echo $row['emp_Balance']; ?></td> -->
        </tbody>
        <?php } ?>

        <?php   
          while($row1 = mysql_fetch_array($result1)){
        ?>        
        <tbody>
        <td><!-- <?php //echo $row1['leave_PoL2']; ?> --></td>
        <td><?php echo $row1['leave_Particular']; ?></td>
        <td></td>
        <td><?php echo $row1['leave_ABSwp']; ?></td>
        <td><?php echo $row1['leave_ABSwop']; ?></td>
        <td><?php echo $row1['leave_Vb']; ?></td>
        <td></td>
        <td><?php echo $row1['leave_ABSwp2']; ?></td>
        <td><?php echo $row1['leave_ABSwop2']; ?></td>
        <td><?php echo $row1['leave_Sb']; ?></td>
        <td><?php echo $row1['leave_From']; ?></td>
        </tbody>
        <?php } ?>
      </table>
</div>

</body>
</html>