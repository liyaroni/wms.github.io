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
<title>Sales lead for Consumer cards</title>
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
    if ( document.frmsaleslead.txtname.value == '' )
    {
        window.alert('Please Enter Applicant Name')
        document.frmsaleslead.txtname.focus();
	return false;
    }

 if ( document.frmsaleslead.txtcont.value == '' )
    {
        window.alert('Please Enter Contact Number')
        document.frmsaleslead.txtcont.focus();
	return false;
    }

if ( document.frmsaleslead.txtpro.value == '' )
    
{
        window.alert('Please Enter Profession')
        document.frmsaleslead.txtpro.focus();
	return false;
    }


if ( document.frmsaleslead.txtint.value == '' )
    
{
        window.alert('Interested for?')
        document.frmsaleslead.txtint.focus();
	return false;
    }

if ( document.frmsaleslead.address.value == '' )
    
{
        window.alert('Please Enter Address')
        document.frmsaleslead.address.focus();
	return false;
    }



if ( document.frmsaleslead.txtdist.value == '' )
    
{
        window.alert('Please Enter District')
        document.frmsaleslead.txtdist.focus();
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
    <td align="left">Applicant Name</td>
    <td><input type="text" name="txtname" size="45"/>*</td>
    
</tr>
 
<tr>
    <td align="left">Contact Number</td>
    <td><input type="text" name="txtcont" size="45"/>*</td>
    
</tr>

<tr>
    <td align="left">Profession</td>
    <td><input type="text" name="txtpro" size="30"/>*</td>
    
</tr>

<tr>
    <td align="left">Interested for</td>
    <td><!--<input type="text" name="txtint" size="30"/>-->
	<select name="txtint">
	<option value=""></option>
	<option value="FDR">FDR</option>
	<option value="ACCOUNT">ACCOUNT</option>
	<option value="DPS">DPS</option>
	</select>*</td>
    
</tr>

<tr>
	<td>Address</td>
	<td><p align="left"><textarea name="address" rows="3" cols="35"></textarea>
	*</td>
</tr>

<tr>
    <td align="left">District</td>
    <td><input type="text" name="txtdist" size="30"/>*</td>
    
</tr>


<tr>
	<td>Remarks</td>
	<td><p align="left"><textarea name="remarks" rows="3" cols="35"></textarea>
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


$result = mysql_query("INSERT INTO cons_sales  values('','".$_REQUEST['txtname']."','".$_REQUEST['txtcont']."','".$_REQUEST['txtpro']."','".$_REQUEST['txtint']."','".$_REQUEST['address']."','".$_REQUEST['txtdist']."','".$_REQUEST['remarks']."','".date('Y-m-d')."','".date('H:i:s')."','".$_SESSION["user_name"]."') ");

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




