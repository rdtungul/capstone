<?php
  include('connect.php');
  mysql_select_db($dbName);

  if(!(isset($_SESSION["uID"])))
  header("Location:user_login.php");

    if (isset($_SESSION["uID"]))
  {
    $sql = "SELECT * FROM emp_reg WHERE emp_ID = '".$_SESSION["uID"]."'";
    $result = mysql_query($sql);
    // $row = mysql_fetch_array($result);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>HRMO Guagua</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">HRMO Guagua</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="e_page.php">Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
<!--       <?php  
              //while($row = mysql_fetch_array($result)){
          ?>
      <li><a <?php //echo("onclick=\"location='update_record2.php?ID=".$row['emp_ID']."'\" ") ?> ><span class="glyphicon glyphicon-cog"></span> Account Setttings</span></a></li>
    <?php //} ?> -->
      <!-- <li><a href=""><span>|</span></a></li> -->
      <li><a href="f_logout.php" onclick="return confirm('Are you sure you want to logout?');"><span class="glyphicon glyphicon-log-out"></span>  <?php echo $_SESSION["Name"];?></span></a></li>
    </ul>
  </div>
</nav>