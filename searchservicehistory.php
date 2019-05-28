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

<link href="default.css" rel="stylesheet" type="text/css"/>
<title>Search Service History</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<?php 

include_once("db_conn.php");
include_once("header.php");
include_once("notice.php");
include_once("back.php");
?>
</head>
<script type="text/javascript" language="JavaScript">

function empty()
{
    if ( document.searchf.search1.value == '' )
    {
        window.alert('No CARD NUMBER specified for searching')
        document.searchf.search1.focus();
	return false;
    }

	
}
</script>

<body>

<form name="searchf" method="post" onSubmit="return empty()";> 

<br>

<table class="menu" width="40%" border="1" cellspacing="1" cellpadding="1" align="center">
 
	<tr>

		<td width="40%" align="center"><b>Card/Account Number</b></td>     
		<td width="40%"align="center"><input type="text" name="search1" value="" size="30" maxlength='16'></td> 
		<td width="20%" align="center"><input type="hidden" name="value_search" value="value_search">
		<input type="submit" value="Search" name="search v" class="button"></td>
	</tr>
</table>

</form>


<?php if($_REQUEST['value_search'] =="value_search"){?>

<?php 
$card=$_REQUEST["search1"];

?>

<table class='table' border='1' style='border-collapse: collapse' cellspacing='1' align="center" width="90%" bordercolor="red" >

  <td bgcolor="#CCFFCC" colspan=9 align="center"><b><i>History(Card &amp; A/C# <?php echo $card;?>)</i></b></td>

<tr bgcolor="#CCFFCC">
	
	<td align="left" width="10%"><b><i>Card &amp; A/C Number</b></i></td>
	<td align="left" width="10%"><b><i>Contact Number</b></i></td>
	<td align="left" width="12%"><b><i>Category</b></i></td>
	<td align="left" width="14%"><b><i>Query</b></i></td>
	<td align="left" width="8%"><b><i>Work Code</b></i></td>
	<td align="left" width="14%"><b><i>Branch Name</b></i></td>
	<td align="left" width="14%"><b><i>Account & card Type</b></i></td>
	<td align="left" width="20%"><b><i>Remarks</b></i></td>
	<td align="left" width="10%"><b><i>Type</b></i></td>
	<td align="left" width="8%"><b><i>Date</b></i></td>
	<td align="left" width="8%"><b><i>Time</b></i></td>
	<td align="left" width="8%"><b><i>User</b></i></td>
	

<?php
$sql    = 'SELECT  *,query.workcode as "work-code",query.category as category,query.subcategory as query,servicetype.name as name,servicetype.name as name FROM servicedetail,query,servicetype WHERE cardnumber="'.$_REQUEST["search1"].'" AND query.workCode=serviceDetail.workCode AND servicetype.stype=serviceDetail.stype ORDER BY date DESC';
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
	<td>{$row['branch_name']}</td>
	<td>{$row['acc_type']}</td>
	<td>{$row['remarks']}</td>
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



</body>
</html>