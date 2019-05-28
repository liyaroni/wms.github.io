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

<title>Outbound Log Details</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

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



<form name="searchd" action="#" method="post" onSubmit="return empty()";> 

<table class="menu" width="65%" border="1" cellspacing="1" cellpadding="1" align="center"">
 
<tr>
<td width="12%" align="center"><b>Start Date</b></td>
<td width="25%" align="center"><input type="text" name="searchstart" value="<?php echo $curdate;?>" size="25"></td>
<td width="12%" align="center"><b>End Date</b></td>
<td width="25%"><input type="text" name="searchend" value="<?php echo $curdate;?>"size="25"></td>
<td align="center" width="12%">
<input type="hidden" name="value_search1" value="value_search1">
<input type="submit" value=">Search<" name="search d" class="button">
</td>
</tr>

</table>
<br>

<?php 
$sdate=$_REQUEST["searchstart"];
$edate=$_REQUEST["searchend"];
?>

<?php if($_REQUEST['value_search1'] =="value_search1"){?>

<table class='Report' border='1' style='border-collapse: collapse' bordercolor='#333366' cellspacing='1' align="center" width="98%">

<td bgcolor='#00CCFF' colspan=10 align=center><b>Call Details ( From <?php echo $sdate;?> To <?php echo $edate;?> )</i></b></td>

<tr>
	<td bgcolor='#00CCFF' align="center" width="7%">Card & A/C Number</td>
	<td bgcolor='#00CCFF' align="center" width="7%">Contact Number</td>
	<td bgcolor='#00CCFF' align="center" width="7%">Card & A/C Type</td>
	<td bgcolor='#00CCFF' align="center" width="8%">Branch Name</td>
	<td bgcolor='#00CCFF' align="center" width="8%">Call Category</td>
	<td bgcolor='#00CCFF' align="center" width="6%">Call Status</td>
	<td bgcolor='#00CCFF' align="center" width="5%">Date</td>
	<td bgcolor='#00CCFF' align="center" width="5%">Time</td>
	<td bgcolor='#00CCFF' align="center" width="6%">User</td>
	<td bgcolor='#00CCFF' align="center" width="15%">Call Remarks</td>
	<td bgcolor='#00CCFF' align="center" width="100%">Notes</td>

<?php
$sql    = 'SELECT  * FROM servicedetails WHERE (`date` between "'.$_REQUEST["searchstart"].'" AND "'.$_REQUEST["searchend"].'") ORDER BY date';
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
    		<td>{$row['cardnumber']}</td>
    		<td>{$row['contnumber']}</td>
		<td>{$row['cardtype']}</td>
		<td>{$row['branch_name']}</td>
		<td>{$row['callcategory']}</td>
		<td>{$row['callstatus']}</td>
		<td>{$row['date']}</td>
		<td>{$row['time']}</td>
		<td>{$row['user']}</td>
		<td>{$row['callremarks']}</td>
		<td>{$row['notes']}</td>
	
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

</html>