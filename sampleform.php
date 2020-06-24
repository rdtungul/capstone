<?php
include ("connect.php");
mysql_select_db($dbName);

// function empLeave()
// {

//     $leaveID1 = $_POST['l_id'];
//     $sqlError = '';
//     //$time_Date4 = $_POST['time_date'];
//     // $vlstatus = $_POST['l_status'];
//     $dstart = $_POST['l_fdate']; // starting date
//     $estart = $_POST['l_tdate']; // end date

//     $day = (strtotime($estart) - strtotime($dstart))/24/3600+1;

// $nextWeek = time() + (7 * 24 * 60 * 60);
//                    // 7 days; 24 hours; 60 mins; 60 secs
// echo 'Now:       '. date('m/d/Y') ."\n";
// $nw1 = 'Next Week: '. date('m/d/Y', $nextWeek) ."\n";
// $nw = $nw1 * 1.25;
// echo ($nw);
// or using strtotime():
// echo 'Next Week: '. date('m/d/Y', strtotime('+1 week')) ."\n";
// $date=date_create("03/15/2018");
// date_sub($date,date_interval_create_from_date_string("30 days"));
// echo date_format($date,"m/d/Y");
// $date1=date_create("2013-01-01");
// $date2 = date_sub( '2015-11-20',  );
// // $diff=date_diff($date1,$date2);

// // %a outputs the total number of days
// echo $diff;
    // $e_fds = "01/05/2018";
    // $cdate = date("m/d/Y");
    // $fds = (($cdate) + strtotime(+$e_fds))-1;
    // $ubl = $fds * 1.25;
    // echo($e_fds);
    // echo '<br >';
    // echo($cdate);
    // echo '<br >';
    // echo($fds);
    // echo '<br >';
    // echo($ubl);

$last_login_date = "05/23/2017";
$current_date = date("m/d/Y");

$day = round(abs(strtotime($current_date)-strtotime($last_login_date))/20655200);
$pro = $day * 1.25;

echo($day);
echo '<br >';
echo($pro);
?>
<!-- <script type="text/javascript">
    function dateDiff($start, $end) {

  $start_ts = strtotime($start);

  $end_ts = strtotime($end);

  $difference = $end_ts - $start_ts;

  return round($difference / 86400);


 }
</script> -->