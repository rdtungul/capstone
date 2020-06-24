<?php
	session_start();
	include('connect.php');
	mysql_select_db($dbName);
    include("nav2.php");
    include('f_updateemp2.php');

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
        $result = editEmp();
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


		if (isset($_GET['ID']))
	{
		$sqlSelect = "SELECT * FROM emp_reg WHERE emp_ID = '".$_GET['ID']."'";
		$resultSelect = mysql_query($sqlSelect);
		$rowSelect = mysql_fetch_array($resultSelect);
	}


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

<link rel="stylesheet" type="text/css" href="css/add_rec.css">




<div class="container">
	 <table align="center">
    <tr align="center">
        <td><h3 class="usrlog"><?php
                if ($sqlError == '&nbsp')
                    echo("Edit Information");
                else
                    echo ($sqlError);
            ?></h3></td>
    </tr>
</table>

	<form method="POST">
		<div class="form-group">
		  	<label class="emp_form">ID Number:</label>
		  	<input type="text" class="form-control" name="e_id" 
		  <?php
  			if (isset($_GET['ID'])){
  				echo(" value = \"".$rowSelect['emp_ID']."\" ");
  			}
		  ?>
		  	readonly="">
		  	
		  	<label class="emp_form">Last Name:</label>
		  	<input type="text" class="form-control" name="e_lname"  
		  <?php
  			if (isset($_GET['ID'])){
  				echo(" value = \"".$rowSelect['emp_Lname']."\" ");
  			}
		  ?>
		  	onkeypress="return alpnmrc(event,alpha);"/>

		  	<label class="emp_form">First Name:</label>
		  	<input type="text" class="form-control" name="e_fname"  
		  <?php
  			if (isset($_GET['ID'])){
  				echo(" value = \"".$rowSelect['emp_Fname']."\" ");
  			}
		  ?>
		  	onkeypress="return alpnmrc(event,alpha);"/>

			<label class="emp_form">Middle Name:</label>
		  	<input type="text" class="form-control" name="e_mname"  
		  <?php
  			if (isset($_GET['ID'])){
  				echo(" value = \"".$rowSelect['emp_Mname']."\" ");
  			}
		  ?>
		  	onkeypress="return alpnmrc(event,alpha);"/>

        
 			<!-- <label class="emp_form">Leave Points:</label>
		  	<input type="text" class="form-control" name="e_lpoints"  
		  <?php
  			 // if (isset($_GET['ID'])){
  				 //echo(" value = \"".$rowSelect['emp_SLBal']."\" ");
  			//}
		  ?>
		  	onkeypress="return alpnmrc(event,alpha);"/> -->

			<!-- <label class="emp_form">Leave Balance:</label>
		  	<input type="text" class="form-control" name="e_balance" readonly 
		  <?php
  			// if (isset($_GET['ID'])){
  				// echo(" value = \"".$rowSelect['emp_Balance']."\" ");
  			//}
		  ?> -->
		  	<!-- onkeypress="return alpnmrc(event,alpha);"/> -->

<!-- 			<label class="emp_form">Earned Points:</label>
		  	<input type="text" class="form-control" name="e_points"> -->

			<!-- <label class="emp_form">Yearly Balance:</label> -->
		  	<!-- <input type="text" class="form-control" name="e_ybalance"> -->

			<button type="submit" class="btn btn-default" style="margin-top: 10px; width: 100%; height: 50px; background-color: rgb(104, 145, 162); color: white; font-size: 20px;" onclick="return confirm('Are you sure you want to Edit Information?');">EDIT</button>
</div>
	</form>
</div>
</body>
</html>