<?php


$con = mysql_connect("localhost","root","rootroot8497");
if (!$con)
  {
  die('Could Not Connect The Database:' . mysql_error());
  }

if (!mysql_select_db('db_wms', $con)) {
   echo 'Could not select database';
   exit;
}


if($_POST){
//print_r($_POST);

$result = mysql_query("INSERT INTO `user` (`user_name`, `password`, `user_type`, `name`, `mail_add`, `emp_id`, `mobile`) VALUES ('".$_POST['user_name']."', MD5('".$_POST['password']."'), '".$_POST['user_type']."', '".$_POST['name']."', '".$_POST['mail_add']."', '".$_POST['emp_id']."', '".$_POST['mobile']."');");

if (!$result) {
   echo "DB Error, could not query the database\n";
   echo 'MySQL Error: ' . mysql_error();
   exit;
}
else
{
echo "Server Reply: Your Data Save Successfully ";
}

}



//INSERT INTO `db_wms`.`user` (`user_name`, `password`, `user_type`, `name`, `mail_add`, `emp_id`, `mobile`) VALUES ('tofael', 'd0e7d597489bbd60dee61373db1f38e6', '1', 'fddfdfdfdfd', '', '', '');

?>

<form method="post" action="" enctype="multipart/form-data">

<table width="400" border="0">
  <tr>
    <th scope="col">username: </th>
    <td scope="col"><input type="text" name="user_name" value="" /></td>
  </tr>
  <tr>
    <th scope="row">password: </th>
    <td><input type="text" name="password" value="" /></td>
  </tr>
  <tr>
    <th scope="row">type:</th>
    <td><input type="text" name="user_type" value="" /></td>
  </tr>
  <tr>
    <th scope="row">name:</th>
    <td><input type="text" name="name" value="" /></td>
  </tr>
  <tr>
    <th scope="row">eamil:</th>
    <td><input type="text" name="mail_add" value="" /></td>
  </tr>
  <tr>
    <th scope="row">emp_id:</th>
    <td><input type="text" name="emp_id" value="" /></td>
  </tr>
  
  <tr>
    <th scope="row">mobile:</th>
    <td><input type="text" name="mobile" value="" /></td>
  </tr>
</table>




<input type="submit" value="Submit" />

</form>