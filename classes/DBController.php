<?php
include_once("DBConnection.php");
include_once("DBClasses.php");

class DBController {
	var $dbConn;
	
	function __construct(){
		$this->dbConn=new DBConnection();
		$this->dbConn->connect();
	}
	
/**getting all distinct category name as array**/
	
function getDistinctCategory(){
			$query="SELECT DISTINCT(category) FROM Query ORDER BY category";
			$result=mysql_query($query);
			if(!$result) {return NULL;}
			$arr=$this->db_result_to_array($result);
			return $arr;

	}
	
/**getting all Query object**/
	
function getAllQuery(){
		$query="SELECT workCode,category,subCategory FROM Query ORDER BY category,subCategory";
		$result=mysql_query($query);
		if(!$result) {return NULL;}
		$numRows=mysql_num_rows($result);
		$queryObjArr=array();
		for($i=0;$i<$numRows;$i++){
			$row=mysql_fetch_assoc($result);
			$queryObjArr[$i]=new Query($row['workCode'], $row['category'], $row['subCategory']);
		}
		return $queryObjArr;
	}
	
	
	

	/**Helper functions**/
	private function db_result_to_array($result)
	{
   		$res_array = array();
	    for ($count=0; $row = @mysql_fetch_array($result); $count++)
     		$res_array[$count] = $row;
	    return $res_array;
	}
	
	
	

}


?>