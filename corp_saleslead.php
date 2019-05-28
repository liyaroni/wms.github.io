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
<title>Sales lead for Corporate cards</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<?php 
include_once("db_conn.php");
include_once("header.php");
include_once("notice.php");
include_once("back.php");
$user=$_SESSION["user_name"];
date_default_timezone_set('Asia/Dhaka');
?>
</head>

<br><br><br><br>

<script type="text/javascript" language="JavaScript">

function empty()
{
    if ( document.frmsaleslead.txtorg.value == '' )
    {
        window.alert('Please Enter Organization Name')
        document.frmsaleslead.txtorg.focus();
	return false;
    }

 if ( document.frmsaleslead.txtcontp.value == '' )
    {
        window.alert('Please Enter Contact Person')
        document.frmsaleslead.txtcontp.focus();
	return false;
    }

if ( document.frmsaleslead.txtdesign.value == '' )
    
{
        window.alert('Please Enter Designation')
        document.frmsaleslead.txtdesign.focus();
	return false;
    }

if ( document.frmsaleslead.txtcont1.value == '' )
    
{
        window.alert('Please Enter Contact Number')
        document.frmsaleslead.txtcont1.focus();
	return false;
    }

if ( document.frmsaleslead.address.value == '' )
    
{
        window.alert('Please Enter Complete Address')
        document.frmsaleslead.address.focus();
	return false;
    }

if ( document.frmsaleslead.txtcity.value == '' )
    
{
        window.alert('Please Enter City')
        document.frmsaleslead.txtcity.focus();
	return false;
    }

}
</script>

<body>

<form name="frmsaleslead" method="post" action="#" onSubmit="return empty()"; >

<table align="center" bordercolor="#00CCFF" class="Login">
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" align="center">Welcome:<i><?php echo $user;?></i></td></tr>  
<tr><td colspan="2">&nbsp;</td></tr>

<tr>
    <td align="left">Organization Name</td>
    <td><input type="text" name="txtorg" size="58"/>*</td>
    
</tr>
 
<tr>
    <td align="left">Contact Person</td>
    <td><input type="text" name="txtcontp" size="58"/>*</td>
    
</tr>

<tr>
    <td align="left">Designation</td>
    <td><input type="text" name="txtdesign" size="30"/>*</td>
    
</tr>

<tr>
    <td align="left">Contact Number</td>
    <td><input type="text" name="txtcont1" size="30"/>*</td>
    
</tr>

<tr>
	<td>Address</td>
	<td><p align="left"><textarea name="address" rows="3" cols="45"></textarea>
	*</td>
</tr>

<tr>
    <td align="left">City</td>
    <td><input type="text" name="txtcity" size="30"/>*</td>
    
</tr>

<tr>
	<td>Remarks</td>
	<td><p align="left"><textarea name="remarks" rows="3" cols="45"></textarea>
	</td>
</tr>
<tr>  
<td colspan="2">&nbsp;</td>
</tr>
<tr>
    <td colspan="2"> 
	<div align="right">
			<input type="submit" class="button" name="store_info" value="Save" >
   	  		<input type="hidden" name="save_value" value="save_value" ></div>
	</td>
</tr>

<tr>
<td colspan="2"><div align="center">

<?php if($_REQUEST['save_value'] =="save_value"){?>

<?php 


$result = mysql_query("INSERT INTO corp_sales values('','".$_REQUEST['txtorg']."','".$_REQUEST['txtcontp']."','".$_REQUEST['txtdesign']."','".$_REQUEST['txtcont1']."','".$_REQUEST['address']."','".$_REQUEST['txtcity']."','".$_REQUEST['remarks']."','".date('Y-m-d')."','".date('H:i:s')."','".$_SESSION["user_name"]."') ");

if (!$result) {
   echo "DB Error, could not query the database\n";
   echo 'MySQL Error: ' . mysql_error();
   exit;
}
else
{
echo "Server Reply: Your Data Save Successfully ";
}
?>
<?php } ?></font></td>

</tr>
</table>
</form>
<br><br>
</body>
</html>




