<?php
	session_start();
	include('connect.php');
	mysql_select_db($dbName);
    include("nav.php");
    include('f_updatebalance.php');

	if(!(isset($_SESSION["uID"])))
	header("Location:user_login.php");
 //    if(!(isset($_SESSION["uID"])))
 //        header("Location:sample.php");
    
	// if(isset($_POST['mgrid'])){
	// 		$result = addMgr();
	// 	}
		
	
	$sqlError = '&nbsp';
    if (isset($_POST['e_ybalance']))
    {
        $result = editBalance();
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
                    echo("Yearly Balance");
                else
                    echo ($sqlError);
            ?></h3></td>
    </tr>
</table>

	<form method="POST">

			<label class="emp_form">Yearly Balance:</label>
		  	<input type="text" class="form-control" name="e_ybalance" required onkeypress="return alpnmrc(event,numeric);"/>

			<button type="submit" class="btn btn-default" style="margin-top: 10px; width: 100%; height: 50px; background-color: rgb(104, 145, 162); color: white;" onclick="return confirm('Are you sure you want to Update Yearly Balance?');">UPDATE</button>
</div>
	</form>
</div>
</body>
</html>