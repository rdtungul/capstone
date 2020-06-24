<?php
	session_start();
	include('connect.php');
	mysql_select_db($dbName);
    include("nav.php");
    include('f_updatepoints.php');

	if(!(isset($_SESSION["uID"])))
	header("Location:user_login.php");
 //    if(!(isset($_SESSION["uID"])))
 //        header("Location:sample.php");
    
	// if(isset($_POST['mgrid'])){
	// 		$result = addMgr();
	// 	}
		
	
	$sqlError = '&nbsp';
    if (isset($_POST['e_earned']))
    {
        $result = editPoints();
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


<script>
  $(function() {
     $("#e_date").datepicker({ 
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
                    echo("Monthly Points");
                else
                    echo ($sqlError);
            ?></h3></td>
    </tr>
</table>

	<form method="POST">

			<label class="emp_form">ID Number:</label>
		  	<input type="text" class="form-control" name="e_id" 
      <?php
  			if (isset($_GET['ID'])){
  				echo(" value = \"".$rowSelect['emp_ID']."\" ");
  			}
		  ?>
		  	readonly="">
			<label class="emp_form">Date:</label>
			<input  type="text" class="form-control" name="e_date" id="e_date" required="">

			<label class="emp_form">Update Points:</label>
		  	<input type="text" class="form-control" name="e_earned" value="1.25" required="">

			<button type="submit" class="btn btn-default" style="margin-top: 10px; width: 100%; height: 50px; background-color: rgb(104, 145, 162); color: white; font-size: 20px;" onclick="return confirm('Are you sure you want to Update Monthly Points?');">UPDATE</button>
</div>
	</form>
</div>
</body>
</html>