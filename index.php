<?php 
session_start();
include_once("db_conn.php");
?>
<?php 
if(isset($_REQUEST['login_submit']) && $_REQUEST['login_submit'] == "login_submit")
{
$sql    = 'SELECT * FROM user WHERE user_name = "'.$_REQUEST["user_name"].'" AND password = "'.md5($_REQUEST["password"]).'" ';
$result = mysql_query($sql, $link);

if (!$result) {
   echo "DB Error, could not query the database\n";
   echo 'MySQL Error: ' . mysql_error();
   exit;
}

while ($row = mysql_fetch_assoc($result)) {
  	
	                 if($row['user_type'] =="1")
					 {
	                    $_SESSION["SESS_1"]=$row['user_type'];
						$_SESSION["SESS_user_name"]=$row['user_name'];
						
						$url="Location: user_page.php";
						header($url);
						exit;
						
						}
			    if($row['user_type'] =="3")
					 {
	                    $_SESSION["SESS_1"]=$row['user_type'];
						$_SESSION["SESS_user_name"]=$row['user_name'];
						
						$url="Location: user_page.php";
						header($url);
						exit;
						
						}
						
						  if($row['user_type'] =="2")
					 {
	                    $_SESSION["SESS_1"]=$row['user_type'];
						$_SESSION["SESS_user_name"]=$row['user_name'];
						
						$url="Location: user_page.php";
						header($url);
						exit;
						
						}
}


}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<head>
<link href="default.css" rel="stylesheet" type="text/css" />
<title>Work Code Management System version 2.0</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<?php 
include_once("header.php");
?>
<?php 
include_once("notice.php");
?>

</head>


<body>

<br><br><br><br><br><br><br><br><br>



<table class="Login" align="center" bordercolor="#00CCFF">

<form name="login_form" action="#" method="post" enctype="multipart/form-data">

<tr>
    <td height="5" colspan="2">&nbsp;</td>
</tr>  

<tr>
    <td>User Name</td>
    <td><input type="text" name="user_name" size="30" ></td>
    
</tr>

<tr>
    <td>Password</td>
    <td><input type="password" name="password" size="30" ></td>
     
</tr>

<tr>
    <td>&nbsp;</td>
    
</tr>

<tr>
    <td colspan="2">
		<div align="right">
		<input type="submit" class="button" name="btnSave" value="Log In"></div>
		<input type="hidden" name="login_submit" value="login_submit" />
    </td>
</tr>   
    

</form>
</table>

</body>

<br><br><br><br><br><br><br><br><br>

<?php 
include_once("footer.php");
?>

</html>
