<?php
$con = mysql_connect("localhost","root","rootroot8497");
if (!$con)
  {
  die('Could Not Connect The Database:' . mysql_error());
  }

mysql_select_db("db_wms", $con);
$result = mysql_query("SELECT * FROM notice");

while($row = mysql_fetch_array($result))
  {
	echo $row['notice_text'] . " # Message uploaded by – " . $row['user'];
  }

?> 
