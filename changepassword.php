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

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
<link href="default.css" rel="stylesheet" type="text/css" />

<title>Change Password</title>

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
    if ( document.pass_form.password.value == '' )
    {
        window.alert('Please ENTER new Password')
        document.pass_form.password.focus();
	return false;
    }

	
}
</script>


<body>

<br><br><br><br><br><br>

<form name="pass_form" action="#" method="post" onSubmit="return empty();">


<table class="Login" align="center" bordercolor="#00CCFF">
    
<tr>
   <td align="left">New Password</td>
   <td><input name="password" type="password"></td>
  </tr>
    
<tr>
     	<td colspan="2" align="right">
     	<input type="submit" name="password_change" value="Change" class="button"></td>
	<input type="hidden" name="pass_submit" value="pass_submit" />
</tr>

<tr>

<td colspan="2"><div align="center">

<?php if($_REQUEST['password_change'] =="Change"){?>

<?php 




$result = mysql_query("UPDATE user SET password= MD5( '".$_REQUEST["password"]."' ) WHERE user_name ='".$_SESSION["user_name"]."'");

if (!$result) {
   echo "DB Error, could not query the database\n";
   echo 'MySQL Error: ' . mysql_error();
   exit;
}
else
{
echo "Reply:Changed successfully ";
}
?>
<?php } ?></font></td>

</tr>
</table>
 </form>
<br><br><br>

</body>

</html>
