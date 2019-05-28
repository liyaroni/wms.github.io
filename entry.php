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



<?php

	require_once("./classes/DBController.php");
	require_once("./classes/DBClasses.php");
	$dbc=new DBController();

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>

<link href="default.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="./javascripts/epoch_styles.css" />
<title>Inbound Entry</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<?php 

include_once("header.php");
include_once("notice.php");
include_once("back.php");
date_default_timezone_set('Asia/Dhaka');

?>

</head>

<body onLoad="startclock()">


<script> 

var QRY_ARR_WORKCODE=0;
var QRY_ARR_CATEGORY=1;
var QRY_ARR_SUBCATEGORY=2;

<?php
		$queryObjArr=$dbc->getAllQuery();
		$numObj=sizeof($queryObjArr);
		$categoryArray=array(); //distict category array tree array purpose
		print "queryArr=new Array();";
		for($i=0;$i<$numObj;$i++){
			$queryObj=$queryObjArr[$i];
			$workCode=$queryObj->getWorkCode();
			$category=$queryObj->getCategory();
			/**portion use to make the tree array**/
			$distinctCatFlag=true;
			for($j=0;$j<count($categoryArray);$j++){
				if($category==$categoryArray[$j]){
					$distinctCatFlag=false;
					break;
				}
			}
			if($distinctCatFlag){
				array_push($categoryArray,$category);
			}
			/**************************************/
			$subCategory=$queryObj->getSubCategory();
			
			
			
			print "\nqueryArr[$i]=['$workCode','$category','$subCategory'];";
		}
		/******TEST TREE ARRAY CONSTRUCTION***********/
		print "\nTREE_ITEMS=new Array();";
		print "\nTREE_ITEMS=[['Select Work Code',0,";
		for($i=0;$i<count($categoryArray);$i++){
			print "['$categoryArray[$i]',0,\n";
			for($j=0;$j<$numObj;$j++){
				$queryObj=$queryObjArr[$j];
				$category=$queryObj->getCategory();
				if($categoryArray[$i]==$category){
					$subCat=$queryObj->getSubCategory();
					
					$workCode=$queryObj->getWorkCode();
					print "['$subCat : $workCode'],\n";
				}
			}
			print "],\n";
		}
		
		print "]];\n";
		
?>
</script>



</script>

<script language="javascript" src="javascripts/entryPage.js"></script>
<script language="JavaScript" src="./javascripts/tree.js"></script>
<!--script language="JavaScript" src="./javascripts/tree_items.js"></script-->
<script language="JavaScript" src="./javascripts/tree_tpl.js"></script>

	
<script language="javascript"></script>


<table width="100%" height="100%">
  
<tr>
  	<td style="vertical-align:top;" width="30%">
	<!--p><a href="javascript:;" onClick="toggleSlide('divWorkCodeTree')"><strong>Hide/Show Tree</strong></a></p-->
	<!--div id="divWorkCodeTree" style="display:block; overflow: hidden; height: 700px;"-->
	  <span id="workCodeTree">
    	<script language="JavaScript">
			new tree (TREE_ITEMS, TREE_TPL);
		</script></span>	
	<!--/div-->
	</td>
    <td height="40%" align="left" style="vertical-align:top;">

<br><br><br><br>
<script type="text/javascript" language="JavaScript">


function empty()
{
    if ( document.frmAgentEntry.txtcardnum.value == '' )
    {
        window.alert('Please enter a valid card number')
        document.frmAgentEntry.txtcardnum.focus();
	return false;
    }
else if ( document.frmAgentEntry.txtconnum.value == '' )
    {
        window.alert('Please enter a valid contact number!')
        document.frmAgentEntry.txtconnum.focus();
	return false;
    }

else if ( document.frmAgentEntry.txtWorkCode.value == '' )
    {
        window.alert('Work Code can not be empty')
        document.frmAgentEntry.txtWorkCode.focus();
	return false;
    }

else if(!document.frmAgentEntry.radServiceType[0].checked && !document.frmAgentEntry.radServiceType[1].checked && !document.frmAgentEntry.radServiceType[2].checked){
		window.alert("Select a service type");
		return false;
	}
	
}
</script>
<?php

$user=$_SESSION["user_name"];
$datequery="select CURDATE() as date";
$dateresult=mysql_query($datequery);
$curdate=mysql_result($dateresult,0,'date');
$arr=explode("-",$curdate);
$date=$arr[0].$arr[1].$arr[2];
		

?>



<form name="frmAgentEntry" method="post" onSubmit="return empty();">

<table class="Login">

<tr>  
<td colspan="2">&nbsp;</td>
</tr>

<tr>
<td colspan="2" align="center">Welcome:<i><?php echo $user;?></i></td>
</tr>

<tr>  
<td colspan="2">&nbsp;</td>
</tr>


<tr>
    <td><div align="right">Account/Card Number</div></td>
    <td>      <div align="left">
		<input type="text" name="txtcardnum" size="30" maxlength='16'>
		<i>Valid Account/Card Number</i></input>
	
	  </div></td>
    </tr>
  <tr>
    <td><div align="right">Contact Number </div></td>
    <td>

	<div align="left">
      <input type="text" name="txtconnum" size="30" maxlength='11'><i>Valid Contact Number</i></input>  
    	
	</div></td>
    </tr>
  
<tr>
    <td><div align="right">Category</div></td>
    <td align="left">
      <div align="left" style="border:0;">
        <select name="cmbCategory" onChange="populateCmbQuery(queryArr);">
		<option></option>
		<?php
		/**get options from the database**/
		$categoryArr=$dbc->getDistinctCategory();
		//print_r($categoryArr);
		foreach($categoryArr as $cat){
			echo "<option>$cat[category]</option>";
		}
		/********************************/
		?>
        </select>
      </div></td>
    </tr>
  <tr>
    <td><div align="right">Query</div></td>
    <td align="left">
      <div align="left" style="border:0;">
        <select name="cmbQuery" id='cmbQuery' onChange="populateTxtWorkCode(queryArr);">
		</select>
      </div></td>
    </tr>
	<tr>
    <td><div align="right">Branch Name</div></td>
    <td><select name="branch_name" class="cmb">
		<option></option>        
		<option>AGRABAD BRANCH (EV)</option>
		<option>ALANKAR MORE BRANCH</option>
		<option>ASHUGANJ BRANCH</option>
		<option>ASHULIA BRANCH</option>
		<option>BAJITPUR BRANCH</option>
		<option>BANANI BRANCH (EV)</option>
		<option>BANESHWAR BRANCH (EV)</option>
		<option>BANGSHAL BRANCH (EV)</option>
		<option>BASHUNDHARA BRANCH</option>
		<option>BARISAL BRANCH (EV)</option>
		<option>BEANI BAZAR BRANCH</option>
		<option>BELKUCHI BRANCH</option>
		<option>BENAPOLE BRANCH</option>
		<option>BHOLA BRANCH</option>
		<option>BIROL BAZAR BRANCH</option>
		<option>BOARD BAZAR BRANCH</option>
		<option>BOGRA BRANCH (EV)</option>
		<option>BORO BAZAR BRANCH (EV)</option>
		<option>BRAHMANBARIA BRANCH (EV)</option>
		<option>CARD DIVISION</option>
		<option>CDA AVENUE BRANCH</option>
		<option>CHANDINA BRANCH</option>
		<option>CHANDRA SME/KRISHI BRANCH</option>
		<option>CHAPAI NAWABGANJ BRANCH</option>
		<option>CHAWK BAZAR BRANCH</option>
		<option>CHOUMUHANI BRANCH (EV)</option>
		<option>COMILLA BRANCH (EV)</option>
		<option>COMPANYGANJ BRANCH (EV)</option>
		<option>COX'S BAZAR BRANCH (EV)</option>
		<option>DANIA BRANCH</option>
		<option>DHAMRAI SME/KRISHI BRANCH</option>
		<option>DHANMONDI BRANCH (EV)</option>
		<option>DINAJPUR BRANCH (EV)</option>
		<option>DHOLAIKHAL BRANCH </option>
		<option>ELEPHANT ROAD BRANCH (EV)</option>
		<option>FARIDPUR BRANCH (EV)</option>
		<option>FATIKCHARI BRANCH</option>
		<option>FEDERATION BRANCH (EV)</option>
		<option>FENI BRANCH (EV)</option>
		<option>GABTOLI BAGBARI BRANCH</option>
		<option>GHORASAL BRANCH (EV)</option>
		<option>GOALA BAZAR BRANCH</option>
		<option>GOURIPUR BAZAR BRANCH</option>
		<option>GULSHAN BRANCH (EV)</option>
		<option>GULSHAN-TEJGAON LINK ROAD BRANCH</option>
		<option>HATHAZARI BRANCH</option>
		<option>HEAD OFFICE</option>
		<option>ISLAMPUR BRANCH (EV)</option>
		<option>JESSORE BRANCH (EV)</option>
		<option>JOYPURHAT BRANCH</option>
		<option>KALIGANJ SME/KRISHI BRANCH</option>
		<option>KASHINATHPUR SME/KRISHI BRANCH</option>
		<option>KAWRAN BAZAR BRANCH (EV)</option>
		<option>KERANIGANJ BRANCH (EV)</option>
		<option>KHATUNGANJ BRANCH (EV)</option>
		<option>KHULNA BRANCH (EV)</option>
		<option>KONABARI BRANCH</option>
		<option>KONAPARA BRANCH</option>
		<option>KUSHTIA BRANCH (EV)</option>
		<option>LALMATIA BRANCH (EV)</option>
		<option>LALDIGHI BRANCH</option>
		<option>MADAM BIBIR HAT BRANCH</option>
		<option>MADHABDI BRANCH (EV)</option>
		<option>MALIBAGH BRANCH (EV)</option>
		<option>MANIKGONJ BRANCH</option>
		<option>MIRPUR BRANCH</option>
		<option>MOHAKHALI BRANCH</option>
		<option>MOTIJHEEL BRANCH (EV)</option>
		<option>MOULVI BAZAR BRANCH (EV)</option>
		<option>MOULVI BAZAR BRANCH (DIST.) (EV)</option>
		<option>MUKTARPUR BRANCH (EV)</option>
		<option>MYMENSINGH BRANCH (EV)</option>
		<option>MOHAMMADPUR BRANCH</option>
		<option>NAOGAON BRANCH (EV)</option>
		<option>NARAYANGANJ BRANCH (EV)</option>
		<option>NARSINGDI BRANCH (EV)</option>
		<option>NAWABGANJ SME/KRISHI BRANCH</option>
		<option>NAWABPUR ROAD BRANCH (EV)</option>
		<option>NAYA PALTAN BRANCH (EV)</option>
		<option>NETAIGANJ BRANCH (EV)</option>
		<option>NOAPARA BRANCH (EV)</option>
		<option>NORTH BROOKE HALL ROAD BRANCH (EV)</option>
		<option>NOZU MIAH HAT BRANCH </option>
		<option>PABNA BRANCH (EV)</option>
		<option>PALLABI BRANCH (EV)</option>
		<option>PANCHABOTI BRANCH</option>
		<option>PORADAH BRANCH</option>
		<option>PROGOTI SARANI BRANCH</option>
		<option>RAJSHAHI BRANCH (EV)</option>
		<option>RANGAMATI BRANCH</option>
		<option>RANGPUR BRANCH (EV)</option>
		<option>RETAIL BANKING DIVISION</option>
		<option>RUPGONJ BRANCH</option>
		<option>SATKHIRA BRANCH (EV)</option>
		<option>SAVAR BAZAR BRANCH (EV)</option>
		<option>SHAH AMANAT MARKET BRANCH (EV)</option>
		<option>SHANTINAGAR BRANCH (EV)</option>
		<option>SHARIATPUR BRANCH</option>
		<option>SHETABGONJ SME/KRISHI BRANCH</option>
		<option>SHEIKH MUJIB ROAD BRANCH (EV)</option>
		<option>SHREEMONGAL BRANCH (EV)</option>
		<option>STOCK EXCHANGE BRANCH</option>
		<option>SUBID BAZAR BRANCH</option>
		<option>SYLHET BRANCH (EV)</option>
		<option>TAKERHAT BRANCH (EV)</option>
		<option>TANBAZAR BRANCH</option>
		<option>TANGAIL BRANCH</option>
		<option>TERRI BAZAR BRANCH</option>
		<option>TONGI SME/KRISHI BRANCH</option>
		<option>TULTIKAR BRANCH</option>
		<option>UPOSHOHOR BRANCH</option>
		<option>UTTARA BRANCH</option>
	</select><i>Select from list</i>
    </td>  
		<tr>
    <td><div align="right">Account & Card Type</div></td>
    <td><select name="acc_type" class="cmb">
		<option></option>        
		<option>Savings Account</option>
		<option>Super Savings Plus(More Money)</option>
		<option>Shahoz Banking Account</option>
		<option>Smart Savings Account</option>
		<option>Payroll Savings Account</option>
		<option>Current Account</option>
		<option>Special Notice Deposit(SND)</option>
		<option>Private FCY Account</option>
		<option>RFCD Account</option>
		<option>NRB Account</option>
		<option>Fiexd Deposit Receipt(FDR)</option>
		<option>Pension Savings Scheme(PSS)</option>
		<option>School Savings Plan(A Plus)</option>
		<option>Monthly Income Scheme(Protimash)</option>
		<option>Double Return Deposit Scheme(DRDS)</option>
		<option>Three Years Deposit Plus(3YDP)</option>
		<option>Millionaire Dream Plan(MDP)</option>
		<option>Flexi DPS Account(Freedom)</option>
		<option>Savings Account for Woman(Sanchita)</option>
		<option>VISA Local Classic Credit Card</option>
		<option>VISA Local Gold Credit Card</option>
		<option>VISA Dual International Classic Credit Card</option>
		<option>VISA Dual International Gold Credit Card</option>
		<option>VISA Local Debit Card</option>
		<option>VISA Business Debit Card</option>
		<option>VISA International Debit Card</option>
		<option>Prepaid Card</option>
		<option>IFIC Easy Loan</option>
		<option>Consumer Durable Loan</option>
		<option>Parua(Education Loan)</option>
		<option>Thikana(Home Loan)</option>
		<option>Flexi Loan(Any Purpose)</option>
		<option>IFIC Peshajeebi Loan</option>
		<option>IFIC Auto Loan</option>
	</select><i>Select from list</i>
    </td>  
  <tr> 
    <td><div align="right">Work Code </div></td>
    <td>
      <div align="left">
        <input type="text" name="txtWorkCode" maxlength='4' onblur="verifyCategoryNQuery(queryArr);" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" size="4">
      </div></td>
    </tr>
 <tr>
 
   <tr> 
    <td><div align="right">Remarks</div></td>
    <td>
      <div align="left">
        <textarea name="txtRemarks"></textarea>
      </div></td>
    </tr>
 <tr>

 		<td align="right">Service Type</td>
    	<td><input name="radServiceType" type="radio" value="1"</input>Information</td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td><input name="radServiceType" type="radio" value="2"</input>Service</td>
</tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="radServiceType" type="radio" value="3"</input>Complaint</td>
  </tr>

<tr>
    <td colspan="3"> 
	<div align="right">
			<input type="submit" class="button" name="store_info" value="Save" >
   	  	<input type="hidden" name="save_value" value="save_value" >	
   
 </div></td></tr>




<tr>
<td colspan="2"><div align="center">

<?php if($_REQUEST['save_value'] =="save_value"){?>

<?php 




$result = mysql_query("INSERT INTO servicedetail values('','".$_REQUEST['txtcardnum']."','".$_REQUEST['txtconnum']."','".$_REQUEST['txtWorkCode']."','".$_REQUEST['radServiceType']."','".date('Y-m-d')."','".date('H:i:s')."','".$_SESSION["user_name"]."','".$_REQUEST['txtRemarks']."','".$_REQUEST['branch_name']."','".$_REQUEST['acc_type']."') ");

if (!$result) {
   echo "DB Error, could not query the database\n";
   echo 'MySQL Error: ' . mysql_error();
   exit;
}
else
{
echo "Server Reply: Your Data Save Successfully ";
}
?>
<?php } ?></font></td>

</tr>
   
 	

	
</table>
</form>
	</td>
  </tr>
  <table>
</body>

<br><br><br><br>
<?php 
include_once("footer.php");
?>

</html>


