<?php
/***********Database Bin Classes of WMS***************************/

/*************User table*********/
class User{
	var $userId, $accessLevel;
	function __construct($userId="",$accessLevel=""){
		$this->userId=$userId;
		$this->accessLevel=$accessLevel;
	}
	
	function getUserId(){ return $this->userId; }
	function getAccessLevel(){ return $this->accessLevel; }
	
	function setUserId($userId){ $this->userId=$userId; }
	function setAccessLevel($accessLevel){ $this->accessLevel=$accessLevel; }

}
/***********************************/
/*************Service table*********/
class Service{
	var $callId, $msisdn, $date, $time, $userId;
	
	function __construct($callId="", $msisdn="", $date="0000-00-00", $time="00:00:00", $userId=""){
		$this->callId=$callId;
		$this->msisdn=$msisdn;
		$this->date=$date;
		$this->time=$time;
		$this->userId=$userId;
	}
	
	function getCallId(){ return $this->callId; }
	function getMsisdn(){ return $this->msisdn; }
	function getDate(){ return $this->date; }
	function getTime(){ return $this->time; }
	function getUserId(){ return $this->userId; }
	
	function setCallId($callId){ $this->callId=$callId; }
	function setMsisdn($msisdn){ $this->msisdn=$msisdn; }
	function setDate($date){ $this->date=$date; }
	function setTime($time){ $this->time=$time; }
	function setUserId($userId){ $this->userId=$userId; }
}
/***********************************/
/*************Query Table*********/
class Query{
	var $workCode, $category, $subCategory, $subSubCategory, $queryLevel;
	
	function __construct($workCode="", $category="", $subCategory="", $subSubCategory="", $queryLevel="-1"){
		$this->workCode=$workCode;
		$this->category=$category;
		$this->subCategory=$subCategory;
		$this->subSubCategory=$subSubCategory;
		$this->queryLevel=$queryLevel;
	}
	
	function getWorkCode(){ return $this->workCode; }
	function getCategory(){ return $this->category; }
	function getSubCategory(){ return $this->subCategory; }
	function getSubSubCategory(){ return $this->subSubCategory; }
	function getQueryLevel(){ return $this->queryLevel; }
	
	function setWorkCode($workCode){ $this->workCode=$workCode; }
	function setCategory($category){ $this->category=$category; }
	function setSubCategory($subCategory){ $this->subCategory=$subCategory; }
	function setSubSubCategory($subSubCategory){ $this->subSubCategory=$subSubCategory; }
	function setQueryLevel($queryLevel){ $this->queryLevel=$queryLevel; }
}
/******************************************/
/*************Service Detail table*********/
class ServiceDetail{
	var $serviceMsisdn, $serviceType, $date, $time, $callId, $workCode;
	
	function __construct($serviceMsisdn="", $serviceType="", $date="0000-00-00", $time="00:00:00", $callId="", $workCode=""){
		$this->serviceMsisdn=$serviceMsisdn;
		$this->serviceType=$serviceType;
		$this->date=$date; 
		$this->time=$time; 
		$this->callId=$callId;
		$this->workCode=$workCode;
	}
	
	function getServiceMsisdn(){ return $this->serviceMsisdn; }
	function getServiceType(){ return $this->serviceType; }
	function getDate(){ return $this->date; }
	function getTime(){ return $this->time; }
	function getCallId(){ return $this->callId; }
	function getWorkCode(){ return $this->workCode; }
	
	function setServiceMsisdn(){ $this->serviceMsisdn=$serviceMsisdn; }
	function setServiceType(){ $this->serviceType=$serviceType; }
	function setDate(){ $this->date=$date; }
	function setTime(){ $this->time=$time; }
	function setCallId(){ $this->callId=$callId; }
	function setWorkCode(){ $this->workCode=$workCode; }
}
/*******************************************************/
/*************Complaint Schema Table*********/
class ComplaintSchema{
	var $cmpTableName, $workCode, $cmpHTML, $cmpFldName;
	
	function __construct($cmpTableName="", $workCode="", $cmpHTML="", $cmpFldName=""){
		$this->cmpTableName=$cmpTableName;
		$this->workCode=$workCode;
		$this->cmpHTML=$cmpHTML;
		$this->cmpFldName=$cmpFldName;
	}
	
	function getCmpTableName(){return $this->cmpTableName;}
	function getWorkCode(){return $this->workCode;}
	function getCmpHTML(){return $this->cmpHTML;}
	function getCmpFldName(){return $this->cmpFldName;}
	
	function setCmpTableName($cmpTableName){$this->cmpTableName=$cmpTableName;}
	function setWorkCode($workCode){$this->workCode=$workCode;}
	function setCmpHTML($cmpHTML){$this->cmpHTML=$cmpHTML;}
	function setCmpFldName($cmpFldName){$this->cmpFldName=$cmpFldName;}
	
}
/*******************************************************/
/****************Frequent Callers Table****************/
class FreqCallers{
	var $msisdn, $workCode, $calledAfter, $dateFrom, $dateTo, $dateOn, $timeOn, $userId, $custType, $custQry, $action;
	function __construct(	$msisdn="", 
							$workCode="", 
							$calledAfter="", 
							$dateFrom="", 
							$dateTo="", 
							$dateOn="", 
							$timeOn="", 
							$userId="", 
							$custType="", 
							$custQry="", 
							$action="")
	{
		$this->msisdn=$msisdn; 
		$this->workCode=$workCode; 
		$this->calledAfter=$calledAfter;
		$this->dateFrom=$dateFrom;
		$this->dateTo=$dateTo; 
		$this->dateOn=$dateOn;
		$this->timeOn=$timeOn;
		$this->userId=$userId;
		$this->custType=$custType;
		$this->custQry=$custQry;
		$this->action=$action;
	}
	
	function getMsisdn(){		return $this->msisdn;}
	function getWorkCode(){		return $this->workCode;}
	function getCalledAfter(){	return $this->calledAfter;}
	function getDateFrom(){		return $this->dateFrom;}
	function getDateTo(){		return $this->dateTo;}
	function getDateOn(){		return $this->dateOn;}
	function getTimeOn(){		return $this->timeOn;}
	function getUserId(){		return $this->userId;}
	function getCustType(){		return $this->custType;}
	function getCustQry(){		return $this->custQry;}
	function getAction(){		return $this->action;}
	
	function setMsisdn($msisdn){			$this->msisdn=$msisdn;}
	function setWorkCode($workCode){		$this->workCode=$workCode;}
	function setCalledAfter($calledAfter){	$this->CalledAfter=$calledAfter;}
	function setDateFrom($dateFrom){ 		$this->dateFrom=$dateFrom;}
	function setDateTo($dateTo){	 		$this->dateTo=$dateTo;}
	function setDateOn($dateOn){	 		$this->dateOn=$dateOn;}
	function setTimeOn($timeOn){	 		$this->timeOn=$timeOn;}
	function setUserId($userId){	 		$this->userId=$userId;}
	function setCustType($custType){	 	$this->custType=$custType;}
	function setCustQry($custQry){	 		$this->custQry=$custQry;}
	function setAction($action){	 		$this->action=$action;}
}
?>