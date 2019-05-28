<?php 

session_start();



if($_SESSION["SESS_1"] !=  "")
{
 
 
 }
else
{
session_destroy();
						$url="Location: index.php";
						header($url);

}

?>

<html>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
<link href="default.css" rel="stylesheet" type="text/css" />
<title>Summary Report</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="calendar.css" rel="stylesheet" type="text/css">
 <script type="text/javascript" src="calendar_date_picker.js"></script>
 <script type="text/javascript">
 var cdp1 = new CalendarDatePicker();
 var props = {
	debug :			true,
	excludeDays :		[6,0,1],
	excludeDates :		['20081225','20081226','20091225','20091226'],
	minimumFutureDate :	5,
	formatDate :		'%y-%m-%d'
	};
 var cdp2 = new CalendarDatePicker(props);
 props.formatDate = '%d-%m-%y';
 var cdp3 = new CalendarDatePicker(props);
 cdp3.endYear = cdp3.startYear + 1;
 </script>
<?php 
include_once("db_conn.php");
include_once("header.php");
include_once("notice.php");
include_once("back.php");
?>
</head>

<?php

$datequery="select CURDATE() as date";
$dateresult=mysql_query($datequery);
$curdate=mysql_result($dateresult,0,'date');

?>
<body>

<form name="searchd" action="#" method="post">

<table class="login" align="center">

<tr><td colspan=2 align=center><b><i>::Summary Report::</i></b></td></tr> 

<tr>	<td>Start Date</td>
	<td><input type="text" name="searchstart"><a href="#" onclick="cdp1.showCalendar(this, 'searchstart'); return false;"><img src="images/calendar.png" border="0"></a></td>
</tr>

<tr>	<td>End Date</td>
	<td><input type="text" name="searchend"><a href="#" onclick="cdp1.showCalendar(this, 'searchend'); return false;"><img src="images/calendar.png" border="0"></a></td>
</tr>
<tr>
<td colspan=2 align=right>
<input type="hidden" name="value_search1" value="value_search1">
<input type="submit" value="Search" name="search d" class="button">
</td>
</tr>
</table>

<br>

<?php 
$sdate=$_REQUEST["searchstart"];
$edate=$_REQUEST["searchend"];
?>

<?php if($_REQUEST['value_search1'] =="value_search1"){?>

<table class='table' border='1' style='border-collapse: collapse' cellspacing='1' align="center" width="50%" bordercolor="red">

<td bgcolor='#CCFFCC' colspan=3 align=center><b><i>Summary Report(From <?php echo $sdate;?> To <?php echo $edate;?>)</i></b></td>

<tr bgcolor='#CCFFCC'>
	<td align="left" width="30%"><b><i>Date</i></b></td>
	<td align="left" width="40%"><b><i>Number of work code</b></i></td>
	<td align="left" width="30%"><b><i>User</b></i></td>
</tr>	
	

<?php
$sql    = 'SELECT date,user,count(date) as count FROM servicedetail WHERE (`date` between "'.$_REQUEST["searchstart"].'" AND "'.$_REQUEST["searchend"].'") AND (user="'.$_SESSION["user_name"].'") GROUP BY date';
$result = mysql_query($sql, $link);

if (!$result) {
   echo "DB Error, could not query the database\n";
   echo 'MySQL Error: ' . mysql_error();
   exit;
}
if(mysql_num_rows($result)>0)
{

while ($row = mysql_fetch_assoc($result)) {
 
    echo "<tr>
    	<td>{$row['date']}</td>
    	<td>{$row['count']}</td>
	<td>{$row['user']}</td>
    	</tr>";


}
}
else
{
echo "<tr><td colspan=10 align=center>No data found</td></tr>";
}

echo '</table>';
}
?>

</form>

</body>
<table id="calendarTable">
<tbody id="calendarTableHead">
<tr>
 <td colspan="4" align="left">
	<select id="selectMonth">
	 <option value="0">January</option>
	 <option value="1">February</option>
	 <option value="2">March</option>
	 <option value="3">April</option>
	 <option value="4">May</option>
	 <option value="5">June</option>
	 <option value="6">July</option>
	 <option value="7">August</option>
	 <option value="8">September</option>
	 <option value="9">October</option>
	 <option value="10">November</option>
	 <option value="11">December</option>
	</select>
 </td>
 <td colspan="2" align="center"><select id="selectYear"></select></td>
 <td align="right"><a href="#" id="closeCalendarLink">X</a></td>
</tr>
</tbody>
<tbody id="calendarTableDays">
<tr id="calenderDaysIndex">
 <td >Su</td><td>Mo</td><td>Tu</td><td>We</td><td>Thu</td><td>Fr</td><td>Sa</td>
</tr>
</tbody>
<tbody id="calendar"></tbody>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php 

include_once("footer.php");

?>

</html>