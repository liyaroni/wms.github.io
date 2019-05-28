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
<title>Daily Log</title>
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

<form name="searchd" action="#" method="post" onSubmit="return empty();"> 

<table class="menu" width="60%" border="1" cellspacing="1" cellpadding="1" align="center"">
 
<tr>
<td width="12%" align="center"><b>Start Date</b></td>
<td width="25%" align="center"><input type="text" name="searchstart" value="<?php echo $curdate;?>" size="20"></td>
<td width="12%" align="center"><b>End Date</b></td>
<td width="25%" align="center"><input type="text" name="searchend" value="<?php echo $curdate;?>"size="20"></td>
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

<table class='Report' border='1' style='border-collapse: collapse' cellspacing='1' align="center" width="80%" bordercolor="#333366">

<td bgcolor='#00CCFF' colspan=11 align=center><b>Daily Service Log(from <?php echo $sdate;?> to <?php echo $edate;?>)</b></td>

<tr>
	<td bgcolor='#00CCFF' align="left" width="8%">Card Number</td>
	<td bgcolor='#00CCFF' align="left" width="8%">Contact Number</td>
	<td bgcolor='#00CCFF' align="left" width="12%">Category</td>
	<td bgcolor='#00CCFF' align="left" width="20%">Query</td>
	<td bgcolor='#00CCFF' align="left" width="8%">Work Code</td>
	<td bgcolor='#00CCFF' align="left" width="12%">Service Type</td>
	<td bgcolor='#00CCFF' align="left" width="8%">Date</td>
	<td bgcolor='#00CCFF' align="left" width="8%">Time</td>
	<td bgcolor='#00CCFF' align="left" width="12%">User</td>
	

<?php
$sql    = 'SELECT *,query.workcode as "work-code",query.category as category,query.subcategory as query,servicetype.name as name,servicetype.name as name FROM servicedetail,query,servicetype WHERE (`date` between "'.$_REQUEST["searchstart"].'" AND "'.$_REQUEST["searchend"].'" AND user="'.$_SESSION["user_name"].'") AND query.workCode=serviceDetail.workCode AND servicetype.stype=serviceDetail.stype ORDER BY time DESC';
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
    	<td>{$row['contactnumber']}</td>
    	<td>{$row['category']}</td>
	<td>{$row['query']}</td>
	<td>{$row['workcode']}</td>
	<td>{$row['name']}</td>
	<td>{$row['date']}</td>
	<td>{$row['time']}</td>
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

</html>