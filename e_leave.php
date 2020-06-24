<?php
  session_start();
  include('connect.php');
  mysql_select_db($dbName);
  include("nav.php");
  include('f_leave.php');

  if(!(isset($_SESSION["uID"])))
  header("Location:user_login.php");
  //    if(!(isset($_SESSION["uID"])))
  //        header("Location:sample.php");
  $sqlError = '&nbsp';
  
      if (isset($_POST['l_id']))
    {
        $result = empLeave();
        if ($result != ''){
            $sqlError = $result;
        }
    }
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


<script>
  $(function() {
     $("#l_fdate").datepicker({ 
         beforeShowDay: $.datepicker.noWeekends 
     });
  });
  $(function() {
     $("#l_tdate").datepicker({ 
         beforeShowDay: $.datepicker.noWeekends 
     });
  });
</script>

<link rel="stylesheet" type="text/css" href="css/add_rec.css">
<div class="container">
  <table align="center">
        <tr align="center">
          <td><h3 class="usrlog"><?php
                  if ($sqlError == '&nbsp')
                      echo("Employee's Leave Record");
                  else
                      echo($sqlError);
              ?></h3></td>
      </tr>
</table>

<!--   <h1 align="center">Employee's Leave Record</h1>
 -->
  <!-- <?php  
      //while($row = mysql_fetch_array($result)){
  ?> -->

  <form method="POST">
    <div class="form-group">
      <label class="emp_form">ID Number:</label>
      <input type="text" class="form-control" name="l_id"
      <?php
  			if (isset($_GET['ID'])){
  				echo(" value = \"".$rowSelect['emp_ID']."\" ");
  			}
		  ?>
       readonly="">

      <label class="emp_form" for="l_earned">Name:</label>
      <input  type="text" class="form-control" name="l_name" id="l_name" 
      <?php
        if (isset($_GET['ID'])){
          echo(" value = \"".$rowSelect['emp_Fname']." ".$rowSelect['emp_Mname']." ".$rowSelect['emp_Lname']."\" ");
        }
      ?>
      readonly="">

<!--       <label class="emp_form" for="l_earned">Earned:</label>
      <input  type="text" class="form-control" name="l_earned" id="l_earned" value="1.25" readonly="">
 -->

          <label class="emp_form">Leave Status:</label>
        <select class="form-control" name="l_status" required>
          <option></option>
          <option value="FL">Force Leave</option>
          <option value="VL">Vacation Leave</option>
          <option value="SL">Sick Leave</option>
          <option value="SPL">Special Priviledge Leave</option>
        </select>


      <label class='emp_form'>
      <input type='radio' name='rdo_status' value=' - Birthday' disabled="" /> Birthday</label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      <label class='emp_form'>
      <input type='radio' name='rdo_status' value=' - Graduation' disabled="" /> Graduation</label>&nbsp; &nbsp; &nbsp;
      <label class='emp_form'>
      <input type='radio' name='rdo_status' value=' - Anniversary' disabled="" /> Anniversary</label>
      <label class='emp_form'>
      <input type='radio' name='rdo_status' value=' - Bereavement' disabled="" /> Bereavement</label>
      <label class='emp_form'> &nbsp; &nbsp; &nbsp;
      <input type='radio' name='rdo_status' value=' - Relocation' disabled="" /> Relocation</label>
<br >
      <label class="emp_form" for="l_fdate">From:</label>
      <input  type="text" class="form-control" name="l_fdate" id="l_fdate" required>

      <label class="emp_form" for="l_tdate">To:</label>
      <input type="text" class="form-control" name="l_tdate" id="l_tdate" required>
<!--         <label class="emp_form">Evaluation:</label>
      <textarea class="form-control" rows="5" name="l_reason" required></textarea>
 -->
      <button type="submit" class="btn btn-default" style="margin-top: 10px; width: 100%; height: 50px; background-color: rgb(104, 145, 162); color: white; font-size: 20px;" onclick="return confirm('Are you sure you want to file a Leave?');">File Leave</button>
</div>
  </form>
  <!-- <?php// } ?> -->
</div>
</body>
</html>

<script>
$('select[name=l_status]').change(function () {
var prop = this.value == 'SPL';
$(':radio[name=rdo_status]').prop({ disabled: !prop, required: prop });
});

// $('select[name=l_status]').change(function () {
// var prop = this.value == 'FL';
// $(':text[name=l_fdate]').prop({ disabled: prop, required: !prop });
// $(':text[name=l_tdate]').prop({ disabled: prop, required: !prop });
// });
</script>
