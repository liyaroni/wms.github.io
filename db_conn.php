<?php 

if (!$link = mysql_connect('localhost', 'root', 'rootroot8497')) {
   echo 'Could not connect to mysql';
   exit;
}

if (!mysql_select_db('db_wms', $link)) {
   echo 'Could not select database';
   exit;
}
?>