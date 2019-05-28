<?php

$workcode=$_POST['txtwcode'];
$category=$_POST['cmbcategory'];
$subcategory=$_POST['txtsubcategory'];


//insert new workcode into dbase

include_once('db_conn.php');

$query="INSERT INTO query(workcode, category, subcategory) VALUES('$workcode', '$category', '$subcategory')";
$result=mysql_query($query);

if($result <= 0) die('Workcode not inserted,Please contact Niaz');
include("WcodeEntry.php");

?>
