<?php
/********Database connection class*******/
class DBConnection
{
	var $host,$user,$password,$dbName;
	function __construct()
	{
		$this->host = "localhost";
		$this->user = "root";
		$this->password = "rootroot8497";
		$this->dbName = "db_wms";
	}
	function connect()
	{
		$db_conn = @mysql_pconnect($this->host,$this->user,$this->password);
		mysql_select_db($this->dbName,$db_conn) or die("could not connect to the database");
	}
	
	
}


?>