<?php
	session_start();
	include('connect.php');
	mysql_select_db($dbName);

	if(!(isset($_SESSION["uID"])))
	header("Location:user_login.php");

    include("nav.php");
 
  $sql = "SELECT * FROM leave_record ORDER BY leave_From ASC";
  $result = mysql_query($sql);

  	$srch = $_POST['e_search'];
	$sql = "SELECT * FROM leave_record WHERE leave_From LIKE '%$srch%' or leave_Name LIKE '%$srch%'";
	$result = mysql_query($sql);
?>


<div class="container">
	<h1 align="center">LEAVE REPORTS</h1>
	<br>
		<!-- code for seach bar -->
		<form method="POST">
	    <div class="input-group">
	      <input type="text" class="form-control" placeholder="Search..." name="e_search">
	      <div class="input-group-btn">
	        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
	      </div>
	    </div>
	</form>


	    <!-- code for display emp records -->
		<br>
	<form method="POST">
  	<table border = "1" align="center" class="table">
	    <thead>
	      <tr>
	        <th>Full Name</th>
	        <!-- <th>Middle Name</th>
	        <th>Last Name</th> -->
	        <th>Date</th>
	        <th>Number of days</th>
	        <!-- <th>Address</th> -->
	        <th>Leave Status</th>

	      </tr>
	    </thead>

			<?php  
	            while($row = mysql_fetch_array($result)){
	        ?>
  <!-- <?php //echo("onclick=\"location='e_leave.php?ID=".$row['emp_ID']."'\" ") ?> --> 
	    <tbody>
	      <tr>
		    <td><?php echo $row['leave_Name']; ?></td>
		    <!-- <td><?php //echo $row['emp_Mname']; ?></td>
		    <td><?php //echo $row['emp_Lname']; ?></td> -->
		    <td><?php echo $row['leave_From']; ?></td>
		    <td><?php echo $row['leave_NoD']; ?></td> 
		    <!-- <td><?php //echo $row['emp_Address']; ?></td> --> 
		    <td><?php echo $row['leave_Status'] . $row['leave_Spl']; ?></td>

	      </tr>
	    </tbody>
	    	<?php } ?>
  	</table>
</div>

</body>
</html>
