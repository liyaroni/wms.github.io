<?php 

session_start();
include_once("db_conn.php");


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

<title>Work Code Data</title>

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

<form name="wcodedata" action="#" method="post"> 

<table class="menu" width="70%" border="1" cellspacing="1" cellpadding="1" align="center"">
 <tr>
<td width="8%" align="center"><b>Start Date</b></td>
<td width="16%" align="center"><input type="text" name="searchstart" value="<?php echo $curdate;?>" size="20"></td>
<td width="8%" align="center"><b>End Date</b></td>
<td width="16%" align="center"><input type="text" name="searchend" value="<?php echo $curdate;?>"size="20"></td>
<td width="12%" align="center"><b>Work Code</b></td>
<td width="16%" align="center"><input type="text" name="wcode" value=""size="8" maxlength='4'></td>
</td>
<td align="center" width="12%">
<input type="hidden" name="value_data" value="value_data">
<input type="submit" value=">Search<" name="search d" class="button">
</td>
</tr>
</table>

<br>

<?php 
$sdate=$_REQUEST["searchstart"];
$edate=$_REQUEST["searchend"];
$wcode=$_REQUEST['wcode'];

?>

<?php if($_REQUEST['value_data'] =="value_data"){?>

<table class='Report' border='1' style='border-collapse: collapse' bordercolor='#333366' cellspacing='1' align="center" width="70%">

<td bgcolor='#00CCFF' colspan=7 align=center><b>Work Code Data(From <?php echo $sdate;?> To <?php echo $edate;?> Where Work Code:<?php echo $wcode;?>)</b></td>

<tr>
	<td bgcolor='#00CCFF' align="center" width="7%">Card Number</td>	
	<td bgcolor='#00CCFF' align="center" width="6%">Contact Number</td>
	<td bgcolor='#00CCFF' align="center" width="4%">Work Code</td>
	<td bgcolor='#00CCFF' align="center" width="25%">Query</td>
	<td bgcolor='#00CCFF' align="center" width="6%">Date</td>
	<td bgcolor='#00CCFF' align="center" width="6%">Time</td>
	<td bgcolor='#00CCFF' align="center" width="6%">User</td>
	
	

<?php
$sql    = 'SELECT *,query.workcode as "work-code",query.subcategory as query FROM servicedetail,query WHERE (`date` between "'.$_REQUEST["searchstart"].'" AND "'.$_REQUEST["searchend"].'") AND (servicedetail.workcode="'.$_REQUEST["wcode"].'") AND query.workCode=serviceDetail.workCode ';
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
    	<td>{$row['workcode']}</td>
	<td>{$row['query']}</td>
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