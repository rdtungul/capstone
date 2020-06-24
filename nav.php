<?php
  include('connect.php');
  mysql_select_db($dbName);

  if(!(isset($_SESSION["uID"])))
  header("Location:user_login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>HRMO Guagua</title>
  <meta charset="utf-8">
  <link href="img/Glogo.png" rel="icon">
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
      <li class="active"><a href="m_page.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Record Files <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="add_record.php">Add Record</a></li>
          <li><a href="reports.php">Reports</a></li>
          <!-- <li><a href="update_points.php">Monthly Points</a></li> -->
          <!-- <li><a href="update_balance.php">Yearly Balance</a></li> -->
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="c_apword.php" onclick="return confirm('Change Administrator password?');"><span class="glyphicon glyphicon-cog"></span> <?php echo $_SESSION["Name"];?></span></a></li>
      <li><a href=""><span>|</span></a></li>
      <li><a href="f_logout.php" onclick="return confirm('Are you sure you want to logout?');"><span class="glyphicon glyphicon-log-out"></span> Logout</span></a></li>
    </ul>
  </div>
</nav>