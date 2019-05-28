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
<title>Notice board message upload</title>
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


<script type="text/javascript" language="JavaScript">

function empty()
{
    if ( document.frmmessage.txtmsg.value == '' )
    {
        window.alert('Please Type Your Message')
        document.frmmessage.txtmsg.focus();
	return false;
    }

	
}
</script>
<body>

<form name="frmmessage" method="post" action="#" onSubmit="return empty()"; >

<table align="center" bordercolor="#00CCFF" class="Login">
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" align="center">Welcome:<i><?php echo $user;?></i></td></tr>  
<tr><td colspan="2">&nbsp;</td></tr>

<tr>
	<td align="right"><b><i>Message</i></b></td>
	<td align="left" ><p align="left"><textarea name="txtmsg" rows="4" cols="35"></textarea>
	</td>
</tr>
  
<tr>
    <td colspan="2">
		<div align="right">
		<input type="submit" class="button" name="btnSave" value="Upload">
		<input type="hidden" name="save_value" value="save_value" >
		</div>
    </td>
</tr>


<tr>
    <td colspan="2" align="center">


<?php if($_REQUEST['save_value'] =="save_value"){?>

<?php 


$message=$_REQUEST['txtmsg'];
$user=$_SESSION["user_name"];

$result = mysql_query(" UPDATE notice set notice_text ='$message', user ='$user' where sl='1' ");

if (!$result) {
   echo "DB Error, could not query the database\n";
   echo 'MySQL Error: ' . mysql_error();
   exit;
}
else
{
echo "Server Reply: Your New Message Upload Successfully";
}
?>
<?php } ?>


  
</table>
</form>
<br><br>
</body>
</html>




