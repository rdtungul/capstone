<?php
	session_start();
	include('connect.php');
	mysql_select_db($dbName);
    include("nav.php");
    include('f_addemp.php');

	if(!(isset($_SESSION["uID"])))
	header("Location:user_login.php");
 //    if(!(isset($_SESSION["uID"])))
 //        header("Location:sample.php");
    
	// if(isset($_POST['mgrid'])){
	// 		$result = addMgr();
	// 	}
		
	
	$sqlError = '&nbsp';
    if (isset($_POST['e_id']))
    {
        $result = addEmp();
        if ($result != ''){
            $sqlError = $result;
        }
    }
  //   if (isset($_POST['mgrid']))
  //   {
  //       $result = valMgr();
  //       if ($result != ''){
  //           $sqlError = $result;
  //       }
  //   }


  $sql = "SELECT * FROM emp_reg ORDER BY emp_ID desc limit 1";
  $result = mysql_query($sql);
?>

<script type="text/javascript">
	var alpha = "[ A-Za-z]";
	var numeric = "[0-9]"; 
	var alphanumeric = "[ A-Za-z0-9]"; 

	function alpnmrc(e,charVal){
	    var keynum;
	    var keyChars = /[\x00\x08]/;
	    var validChars = new RegExp(charVal);
	if(window.event)
	    {
	        keynum = e.keyCode;
	    }
	else if(e.which)
	    {
	        keynum = e.which;
	    }
	    var keychar = String.fromCharCode(keynum);
	if (!validChars.test(keychar) && !keyChars.test(keychar))   {
	        return false
	} else{
	        return keychar;
	    }
	}
</script>


<script>
  $(function() {
     $("#e_fds").datepicker({ 
         beforeShowDay: $.datepicker.noWeekends 
     });
  });
</script>

<link rel="stylesheet" type="text/css" href="css/add_rec.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<div class="container">
	 <table align="center">
    <tr align="center">
        <td><h3 class="usrlog"><?php
                if ($sqlError == '&nbsp')
                    echo("Register Employee");
                else
                    echo ($sqlError);
            ?></h3></td>
    </tr>
</table>

	<?php  
	    while($row = mysql_fetch_array($result)){
	?>

	<form method="POST">
		<div class="form-group">
		  	<label class="emp_form">ID Number:</label>
		  	<input type="text" class="form-control" name="e_id" value="<?php echo $row['emp_ID'] +1; ?>">
		  	
		  	<label class="emp_form">Last Name:</label>
		  	<input type="text" class="form-control" name="e_lname" autofocus="" required onkeypress="return alpnmrc(event,alpha);"/>

		  	<label class="emp_form">First Name:</label>
		  	<input type="text" class="form-control" name="e_fname" required onkeypress="return alpnmrc(event,alpha);"/>

			<label class="emp_form">Middle Name:</label>
		  	<input type="text" class="form-control" name="e_mname" onkeypress="return alpnmrc(event,alpha);"/>

		  	<label class="emp_form">Department:</label>
		      	<select class="form-control" name="e_div" required>
		      		<option></option>
			        <option>MPDC</option>
			        <option>BUDGET</option>
			        <option>ACCOUNTING</option>
			        <option>COA</option>
			        <option>PESO</option>
			        <option>MDRRMO</option>
			        <option>MAYOR'S OFFICE</option>
			        <option>VICE MAYOR'S OFFICE</option>
			        <option>GSU</option>
			        <option>ENGINEER'S OFFICE</option>
			        <option>LCR</option>
			        <option>ASSESSOR</option>
			        <option>TREASURER</option>
			        <option>RHU I</option>
			        <option>RHU II</option>
			        <option>RHU III</option>
			        <option>MSWD</option>
			        <option>LIBRARY</option>
			        <option>MENRO</option>
			        <option>DA</option>
			        <option>GCC</option>
			        <option>MARKET</option>
			        <option>HRMO</option>
		      	</select>

		  	<label class="emp_form">Position:</label>
		  	<input type="text" class="form-control" name="e_position" onkeypress="return alpnmrc(event,alpha);"/>


			
			<label class="emp_form">Address:</label>
			<textarea class="form-control" rows="5" name="e_address" required></textarea>

			<label class="emp_form">First Day of Service:</label>
			<!-- <input type="date" class="form-control" name = "e_fds" required> -->
			<input  type="text" class="form-control" name="e_fds" id="e_fds" required>

			<button type="submit" class="btn btn-default" style="margin-top: 10px; width: 100%; height: 50px; background-color: rgb(104, 145, 162); color: white; font-size: 20px;" onclick="return confirm('Are you sure you want to Add Employee?');">Submit</button>
</div>
	</form>
	<?php } ?>
</div>
</body>
</html>