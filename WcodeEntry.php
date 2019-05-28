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
<title>New Work Code</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<?php 

include_once("db_conn.php");
include_once("header.php");
include_once("notice.php");
include_once("back.php");
$user=$_SESSION["user_name"];
?>
</head>

<br><br><br><br><br><br>

<?php

$query="SELECT MAX(workCode) AS maxCode FROM query";
$result=mysql_query($query);
$workCode=mysql_result($result,0,"maxCode");
$workCode+=1;
?>

<script type="text/javascript" language="JavaScript">

function empty()
{
    if ( document.frmWcodeEntry.txtsubcategory.value == '' )
    {
        window.alert('Please Select Category & Type SUB-CATEGORY Name')
        document.frmWcodeEntry.txtsubcategory.focus();
	return false;
    }

	
}
</script>
<body>

<form name="frmWcodeEntry" method="post" action="wcodeentrydb.php" onSubmit="return empty()"; >

<table width="27%" align="center" bordercolor="#00CCFF" class="Login">
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" align="center">Welcome:<i><?php echo $user;?></i></td></tr>  
<tr><td colspan="2">&nbsp;</td></tr>

<tr>
    <td align="left">Work Code</td>
    <td><input type="text" name="txtwcode" size="4" value='<?php echo $workCode;?>'disabled/></td>
    <input name="txtwcode" type="hidden" value='<?php echo $workCode;?>'>
</tr>
 
  <tr>
    <td align="left">Category</td>
    <td align="left">
     	<select name="cmbcategory">
		<option>Select</option>
        	<option>General Bank:Information</option>
		<option>General Bank:Instruction</option>
		<option>General Bank:Complaint</option>
		<option>Visa Credit Card:Information</option>
		<option>Visa Credit Card:Instruction</option>
		<option>Visa Credit Card:Complaint</option>
		<option>Corporate Card:Information</option>
		<option>Corporate Card:Instruction</option>
		<option>Corporate Card:Complaint</option>
		<option>Debit Card:Information</option>
		<option>Debit Card:Instruction</option>
		<option>Debit Card:Complaint</option>
		<option>Others</option>
</select>
  </tr>
  
  <tr>
    <td align="left">Sub-Category</td>
    <td><input type="text" name="txtsubcategory" size="35" ></td>
  </tr>
  <tr>
    <td colspan="2">
			  <div align="right">
			  <input type="submit" value="Save" class="button"></div></td>
  </tr>
  
</table>
</form>
<br><br>
</body>
</html>




