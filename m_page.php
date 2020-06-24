<?php
	session_start();
	include('connect.php');
	mysql_select_db($dbName);

	if(!(isset($_SESSION["uID"])))
	header("Location:user_login.php");

    include("nav.php");
    // include("leave_status.php");

	$sql = "SELECT * FROM emp_reg ORDER BY emp_ID asc";
	$result = mysql_query($sql);

	$srch = $_POST['e_search'];
	$sql = "SELECT * FROM emp_reg WHERE emp_Fname LIKE '%$srch%' or emp_Lname LIKE '%$srch%' or emp_Fds LIKE '%$srch%' or emp_Status LIKE '%$srch%' or emp_Div LIKE '%$srch%'";
	$result = mysql_query($sql);

?>


<div class="container">
	<h1 align="center">EMPLOYEE'S RECORD</h1>
	<p align="center"><strong>(Please click the highlighted row to see employees leave record.)</strong></p>
	<br>
		<!-- code for seach bar -->
		<form method="POST">
	    <div class="input-group">
	      <input type="text" class="form-control" placeholder="Search Record..." name="e_search">
	      <div class="input-group-btn">
	        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
	      </div>
	    </div>
	</form>

	    <!-- code for display emp records -->
		<br>
	<form method="POST">
  	<table class="table table-hover">
	    <thead>
	      <tr>
	      	<th></th>
	      	<th></th>
	      	<th></th>
	      	<!-- <th></th> -->
	        <th>Full Name</th>
	        <!-- <th>Middle Name</th>
	        <th>Last Name</th> -->
	        <th>Position</th>
	        <th>Division</th>
	        <!-- <th>Address</th> -->
	        <th>First Day of Service</th>
	        <th>VL</th>
	        <th>SL</th>
	        <th>Used VL</th>
	        <th>Used SL</th>
	        <th>Total VL</th>
	        <!-- <th>Leave Points</th> -->
	        <th>Total SL</th>
	        <th>Status</th>
	      </tr>
	    </thead>

			<?php  
	            while($row = mysql_fetch_array($result)){
	        ?>
  <!-- <?php //echo("onclick=\"location='e_leave.php?ID=".$row['emp_ID']."'\" ") ?> --> 
	    <tbody>
	      <tr>
		    <tr <?php echo("onclick=\"location='d_empleave.php?ID=".$row['emp_ID']."'\" ") ?> ><!-- <a  href="time_log.php">Time</a> -->
		    <td><a href="e_leave.php?ID=<?php echo($row['emp_ID']); ?>">Leave</a></td>
		    <!-- <td><a style="color: red;" href="time_log.php?ID=<?php //echo($row['emp_ID']); ?>">Time</a></td> -->
		    <td><a style="color: orange;" href="update_points.php?ID=<?php echo($row['emp_ID']); ?>">Monthly Points</a></td>
		    <td><a style="color: green;" href="update_record.php?ID=<?php echo($row['emp_ID']); ?>">Edit</a></td>
		    <td><?php echo $row['emp_Fname'] . " " . $row['emp_Mname'] . " " . $row['emp_Lname']; ?></td>
		    <!-- <td><?php //echo $row['emp_Mname']; ?></td>
		    <td><?php //echo $row['emp_Lname']; ?></td> -->
		    <td><?php echo $row['emp_Position']; ?></td>
		    <td><?php echo $row['emp_Div']; ?></td> 
		    <!-- <td><?php //echo $row['emp_Address']; ?></td> --> 
		    <td><?php echo $row['emp_Fds']; ?></td>
			<!-- <td><?php //echo $row['emp_VLBal']; ?></td> -->
		    <td><?php echo $row['emp_VLBal']; ?></td>
		    <td><?php echo $row['emp_SLBal']; ?></td>
		    <td><?php echo $row['emp_TVL']; ?></td>
		    <td><?php echo $row['emp_TSL']; ?></td>
		    <td><?php echo $row['emp_VL']; ?></td>
		    <td><?php echo $row['emp_SL']; ?></td>
		    <td><?php echo $row['emp_Status']; ?></td>
	      </tr>
	    </tbody>
	    	<?php } ?>
  	</table>
</div>

</body>
</html>
