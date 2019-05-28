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
<title>Hotel Offer</title>
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
$user=$_SESSION["user_name"];
date_default_timezone_set('Asia/Dhaka');
?>
</head>

<body>

<form name="searchd" action="#" method="post">

<table class="login" align="center">

<tr><td><b>Start Date</b></td>
    <td><input type="text" name="searchstart"><a href="#" onclick="cdp1.showCalendar(this, 'searchstart'); return false;"><img src="images/calendar.png" border="0"></a></td>
    <td><b>End Date</b></td>
    <td><input type="text" name="searchend"><a href="#" onclick="cdp1.showCalendar(this, 'searchend'); return false;"><img src="images/calendar.png" border="0"></a></td>
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

<table class='Report' border='1' style='border-collapse: collapse' cellspacing='1' align="center" width="100%" bordercolor="black">

<td bgcolor='#FFFFCC' colspan=11 align=center><b>Report ( From <?php echo $sdate;?> To <?php echo $edate;?>)</b></td>

<tr bgcolor='#FFFFCC'>
	
	<td width="12%"><b>Name</b></td>
	<td width="8%"><b>Card Number</b></td>
	<td width="17%"><b>Address</b></td>
	<td width="9%"><b>Phone No</b></td>
	<td width="12%"><b>Email Address</b></td>
	<td width="10%"><b>Preferred Hotel</b></td>
	<td width="8%"><b>Check In Date</b></td>
	<td width="8%"><b>Check Out Date</b></td>
	<td width="10%"><b>Submitted by</b></td>
	<td width="9%"><b>Date</b></td>
	<td width="7%"><b>Time</b></td>
	

</tr>	
	

<?php
$sql    = 'SELECT  * FROM hotel_offer WHERE (`date` between "'.$_REQUEST["searchstart"].'" AND "'.$_REQUEST["searchend"].'") ORDER BY date,time';
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
    
	<td>{$row['Name']}</td>
    	<td>{$row['CardNumber']}</td>
	<td>{$row['Address']}</td>
	<td>{$row['Phone']}</td>
	<td>{$row['Email']}</td>
	<td>{$row['HotelName']}</td>
	<td>{$row['CheckIn']}</td>
	<td>{$row['CheckOut']}</td>
	<td>{$row['user']}</td>
	<td>{$row['date']}</td>
	<td>{$row['time']}</td>

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
</html>