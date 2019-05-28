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

<html>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
<link href="default.css" rel="stylesheet" type="text/css" />
<title>Outbound Entry</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="calendar.css" rel="stylesheet" type="text/css">
 <script type="text/javascript" src="calendar_date_picker.js"></script>
 <script type="text/javascript">
 var cdp1 = new CalendarDatePicker();
 var props = {
	debug :			true,
	excludeDays :		[6,0,1],
	excludeDates :		['20081225','20081226','20091225','20091226'],
	minimumFutureDate :	5,
	formatDate :		'%y-%m-%d'
	};
 var cdp2 = new CalendarDatePicker(props);
 props.formatDate = '%d-%m-%y';
 var cdp3 = new CalendarDatePicker(props);
 cdp3.endYear = cdp3.startYear + 1;
 </script>

<?php 
include_once("db_conn.php");
include_once("header.php");
include_once("notice.php");
include_once("back.php");
$user=$_SESSION["user_name"];
date_default_timezone_set('Asia/Dhaka');
?>

<style>
table.Agententry tr td{

font-size:11px;
}
</style>
</head>

<body >

<br><br><br>

<script type="text/javascript" language="JavaScript">

function empty()
{
    if ( document.frmentry.txtcardnum.value == '' )
    {
        window.alert('Please enter a valid card number')
        document.frmentry.txtcardnum.focus();
	return false;
    }
if ( document.frmentry.txtconnum.value == '' )
    {
        window.alert('Please Enter Valid Contact Number')
        document.frmentry.txtconnum.focus();
	return false;
    }

}

</script>

<div style=" width:600px; padding:10px; border:#FF0000 1px solid; margin:auto">
<form name="frmentry" method="post" onSubmit="return empty();">

<table class="Agententry" align="center">
  
<tr>
    <td height="5" colspan="2" ></td>
</tr>
 
<tr>
<td colspan="2" align="center"><i><b>Welcome:<?php echo $user;?></b></i></td>
</tr>
  
<tr>
    <td height="5" colspan="2" ></td>
</tr>

<tr>
    <td><b><i>Card/Account Number</i></b></td>
    <td><input type="text" name="txtcardnum" size="20" maxlength='16'><i>{Valid card/Account number}</i></td>
</tr>
  

<tr>
    <td><b><i>Contact Number<i></b></td>
    <td><input type="text" name="txtconnum" size="20" maxlength='11'><i>{Valid contact number}</i></td>
  </tr>
<tr>
    <td><b><i>Branch Name</i></b></td>
    <td><select name="branch_name" class="cmb">
		<option></option> 
		<option value="Agrabad Branch">AGRABAD BRANCH (EV)</option>       
		<option value="Alankar More Branch">ALANKAR MORE BRANCH</option>
		<option value="Ashuganj Branch">ASHUGANJ BRANCH</option>
		<option value="Ashulia Branch">ASHULIA BRANCH</option>
		<option value="Bajitpur Branch">BAJITPUR BRANCH</option>
		<option value="Banani Branch">BANANI BRANCH (EV)</option>
		<option value="Baneshwar Branch">BANESHWAR BRANCH (EV)</option>
		<option value="Bangshal Branch">BANGSHAL BRANCH (EV)</option>
		<option value="Bashundhara Branch">BASHUNDHARA BRANCH</option>
		<option value="Barisal Branch">BARISAL BRANCH (EV)</option>
		<option value="Beani Bazar Branch">BEANI BAZAR BRANCH</option>
		<option value="Belkuchi Branch">BELKUCHI BRANCH</option>
		<option value="Benapole Branch">BENAPOLE BRANCH</option>
		<option value="Bhola Branch">BHOLA BRANCH</option>
		<option value="Birol Bazar Branch">BIROL BAZAR BRANCH</option>
		<option value="Board Bazar Branch">BOARD BAZAR BRANCH</option>
		<option value="Bogra Branch">BOGRA BRANCH (EV)</option>
		<option value="Boro Bazar Branch">BORO BAZAR BRANCH (EV)</option>
		<option value="Brahmanbaria Branch">BRAHMANBARIA BRANCH (EV)</option>
		<option value="CDA Avenue Branch">CDA AVENUE BRANCH</option>
		<option value="Chandina Branch">CHANDINA BRANCH</option>
		<option value="Chandra SME/Krishi Branch">CHANDRA SME/KRISHI BRANCH</option>
		<option value="Chapai Nawabganj Branch">CHAPAI NAWABGANJ BRANCH</option>
		<option value="Chawk Bazar Branch">CHAWK BAZAR BRANCH</option>
		<option value="Choumuhani Branch">CHOUMUHANI BRANCH (EV)</option>
		<option value="Comilla Branch">COMILLA BRANCH (EV)</option>
		<option value="Companyganj Branch">COMPANYGANJ BRANCH (EV)</option>
		<option value="Cox's Bazar Branch">COX'S BAZAR BRANCH (EV)</option>
		<option value="Dania Branch">DANIA BRANCH</option>
		<option value="Dhamrai SME/Krishi Branch">DHAMRAI SME/KRISHI BRANCH</option>
		<option value="Dhanmondi Branch">DHANMONDI BRANCH (EV)</option>
		<option value="Dholaikhal Branch">DHOLAIKHAL BRANCH </option>
		<option value="Dinajpur Branch">DINAJPUR BRANCH (EV)</option>
		<option value="Elephant Road Branch">ELEPHANT ROAD BRANCH (EV)</option>
		<option value="Faridpur Branch">FARIDPUR BRANCH (EV)</option>
		<option value="Fatikchari Branch">FATIKCHARI BRANCH</option>
		<option value="Federation Branch">FEDERATION BRANCH (EV)</option>
		<option value="Feni Branch">FENI BRANCH (EV)</option>
		<option value="Gabtoli Bagbari Branch">GABTOLI BAGBARI BRANCH</option>
		<option value="Ghorasal Branch">GHORASAL BRANCH (EV)</option>
		<option value="Goala Bazar Branch">GOALA BAZAR BRANCH</option>
		<option value="Gouripur Bazar Branch">GOURIPUR BAZAR BRANCH</option>
		<option value="Gulshan Branch">GULSHAN BRANCH (EV)</option>
		<option value="Gulshan-Tejgaon Link Road Branch">GULSHAN-TEJGAON LINK ROAD BRANCH</option>
		<option value="Hathazari Branch">HATHAZARI BRANCH</option>
		<option value="Islampur Branch">ISLAMPUR BRANCH (EV)</option>
		<option value="Jessore Branch">JESSORE BRANCH (EV)</option>
		<option value="Joypurhat Branch">JOYPURHAT BRANCH</option>
		<option value="Kaliganj SME/Krishi Branch">KALIGANJ SME/KRISHI BRANCH</option>
		<option value="Kashinathpur SME/Krishi Branch">KASHINATHPUR SME/KRISHI BRANCH</option>
		<option value="Kawran Bazar Branch">KAWRAN BAZAR BRANCH (EV)</option>
		<option value="Keraniganj Branch">KERANIGANJ BRANCH (EV)</option>
		<option value="Khatunganj Branch">KHATUNGANJ BRANCH (EV)</option>
		<option value="Khulna Branch">KHULNA BRANCH (EV)</option>
		<option value="Konabari Branch">KONABARI BRANCH</option>
		<option value="Konapara Branch">KONAPARA BRANCH</option>
		<option value="Kushtia Branch">KUSHTIA BRANCH (EV)</option>
		<option value="Lalmatia Branch">LALMATIA BRANCH (EV)</option>
		<option value="Madam Bibir Hat Branch">MADAM BIBIR HAT BRANCH</option>
		<option value="Madhabdi Branch">MADHABDI BRANCH (EV)</option>
		<option value="Malibagh Branch">MALIBAGH BRANCH (EV)</option>
		<option value="Manikgonj Branch">MANIKGONJ BRANCH</option>
		<option value="Mirpur Branch">MIRPUR BRANCH</option>
		<option value="Mohakhali Branch">MOHAKHALI BRANCH</option>
		<option value="Motijheel Branch">MOTIJHEEL BRANCH (EV)</option>
		<option value="Moulvi Bazar Branch">MOULVI BAZAR BRANCH (EV)</option>
		<option value="Moulvi Bazar Branch (Dist.)">MOULVI BAZAR BRANCH (DIST.) (EV)</option>
		<option value="Muktarpur Branch">MUKTARPUR BRANCH (EV)</option>
		<option value="Mymensingh Branch">MYMENSINGH BRANCH (EV)</option>
		<option value="Mohammadpur Branch">MOHAMMADPUR BRANCH</option>
		<option value="Naogaon Branch">NAOGAON BRANCH (EV)</option>
		<option value="Narayanganj Branch">NARAYANGANJ BRANCH (EV)</option>
		<option value="Narsingdi Branch">NARSINGDI BRANCH (EV)</option>
		<option value="Nawabganj SME/Krishi Branch">NAWABGANJ SME/KRISHI BRANCH</option>
		<option value="Nawabpur Road Branch">NAWABPUR ROAD BRANCH (EV)</option>
		<option value="Naya Paltan Branch">NAYA PALTAN BRANCH (EV)</option>
		<option value="Netaiganj Branch">NETAIGANJ BRANCH (EV)</option>
		<option value="Noapara Branch">NOAPARA BRANCH (EV)</option>
		<option value="North Brooke Hall Road Branch">NORTH BROOKE HALL ROAD BRANCH (EV)</option>
		<option value="Nozu Miah Hat Branch">NOZU MIAH HAT BRANCH </option>
		<option value="Pabna Branch">PABNA BRANCH (EV)</option>
		<option value="Pallabi Branch">PALLABI BRANCH (EV)</option>
		<option value="Panchaboti Branch">PANCHABOTI BRANCH</option>
		<option value="Poradah Branch">PORADAH BRANCH</option>
		<option value="Progoti Sarani Branch">PROGOTI SARANI BRANCH</option>
		<option value="Rajshahi Branch">RAJSHAHI BRANCH (EV)</option>
		<option value="Rangamati Branch">RANGAMATI BRANCH</option>
		<option value="Rangpur Branch">RANGPUR BRANCH (EV)</option>
		<option value="Rupgonj Branch">RUPGONJ BRANCH</option>
		<option value="Satkhira Branch">SATKHIRA BRANCH (EV)</option>
		<option value="Savar Bazar Branch">SAVAR BAZAR BRANCH (EV)</option>
		<option value="Shah Amanat Market Branch">SHAH AMANAT MARKET BRANCH (EV)</option>
		<option value="Shantinagar Branch">SHANTINAGAR BRANCH (EV)</option>
		<option value="Shariatpur Branch">SHARIATPUR BRANCH</option>
		<option value="Shetabgonj SME/Krishi Branch">SHETABGONJ SME/KRISHI BRANCH</option>
		<option value="Sheikh Mujib Road Branch">SHEIKH MUJIB ROAD BRANCH (EV)</option>
		<option value="Shreemongal Branch">SHREEMONGAL BRANCH (EV)</option>
		<option value="Stock Exchange Branch">STOCK EXCHANGE BRANCH</option>
		<option value="Subid Bazar Branch">SUBID BAZAR BRANCH</option>
		<option value="Sylhet Branch">SYLHET BRANCH (EV)</option>
		<option value="Takerhat Branch">TAKERHAT BRANCH (EV)</option>
		<option value="Tanbazar Branch">TANBAZAR BRANCH</option>
		<option value="Tangail Branch">TANGAIL BRANCH</option>
		<option value="Terri Bazar Branch">TERRI BAZAR BRANCH</option>
		<option value="Tongi SME/Krishi Branch">TONGI SME/KRISHI BRANCH</option>
		<option value="Tultikar Branch">TULTIKAR BRANCH</option>
		<option value="Uposhohor Branch">UPOSHOHOR BRANCH</option>
		<option value="Uttara Branch">UTTARA BRANCH</option>
	</select><i>{Select from list}</i>
    </td>  
<tr>
    <td><b><i>Card/Account Type</i></b></td>
    <td><select name="cmbctype" class="cmb">
		<option></option>        
		<option>FDR</option>
		<option>Visa (Credit)</option>
		<option>DPS</option>
		<option>Account</option>
		<option>All IFIC Product</option>
	</select><i>{Select from list}</i>
    </td>
</tr>

<tr>
    <td><b><i>Call Category</i></b></td>
    <td><select name="cmbcategory" class="cmb">;
		<option></option>        
		<option>Welcome Call</option>
		<option>Abandon Call</option>
		<option>Not Interested</option>
		<option>Follow_Up</option>
		<option>Motivation Call</option>
		<option>Receive Call</option>
		<option>Feedback Call</option>
		<option>Project Call</option>
		<option>Retention Call</option>
		<option>Liabilities Products</option>
		<option>Savings Account</option>
		<option>Smart Savings Account</option>
		<option>Current Account</option>
		<option>FDR Related Call</option>
		<option>SND Related Call</option>
		<option>PSS Related Call</option>
		<option>Super Savings Plus-More Money</option>
		<option>School savings Plus-A Plus</option>
		<option>MIS-Protimash</option>
		<option>DRDS Related call</option>
		<option>3YDP Related call</option>
		<option>Millionaire Dream Plan</option>
		<option>IFIC Easy Loan</option>
		<option>Card Activation</option>		
		<option>Consumer Durable Loan</option>
		<option>Education Loan</option>
		<option>Home Loan</option>
		<option>Flexi Loan</option>
		<option>IFIC Peshajibi Loan</option>
		<option>Overseas Call</option>
		<option>Endorsement Call</option>
		<option>IFIC Auto Loan</option>
		<option>Inoperative Account Call</option>
		<option>Returned Statement</option>

</select><i>{Select from list}</i>
   </td>
</tr>

<tr>
    <td><b><i>Call Status</i></b></td>
    <td><select name="cmbstatus" class="cmb">
		<option></option>        
		<option>Reached</option>
		<option>Not Reached</option>        
		<option>Invalid Number</option>
	</select><i>{Select from list}</i>
    </td>
</tr>

<tr>
    <td><b><i>Call Remarks</i></b></td>
    <td><select name="cmbrem" class="cmb">
		<option></option>        
		<option>Mobile switch off</option>
		<option>Does not pick the call</option>
		<option>Customer Call Later</option>
		<option>I Will call Later</option>        
		<option>Invalid number</option>
		<option>No number</option>        
		<option>Card activated</option>
		<option>Card already activated</option>        
		<option>Will activate card later</option>
		<option>Will call for activation</option>        
		<option>Not interested to activate the card</option>
		<option>Card did not get yet</option>        
		<option>Card and Pin did not get yet</option>
		<option>Pin did not get yet</option>        
		<option>Did not reach card member</option>
		<option>Not interested to talk</option>
		<option>Not interested at now for our product</option>        
		<option>FDR did not get yet</option>
		<option>Informed accordingly</option>        
		<option>Address updated in system, please resend</option>
		<option>Address is ok CM instructed to resend the card/pin</option>        
		<option>Address is ok CM wants to get the card/pin from branch</option>
		<option>Wants to cancel the card</option>        
		<option>Informed outstanding and address updated in the system</option>
		<option>Informed outstanding and address is ok in the system</option>        
		<option>Ageing problem. Does not make call</option>
		<option>Card temporary blocked and instruct CM to collect</option>        
		<option>CM already collect the captured card</option>
		<option>Confirmed for supplementary</option>        
		<option>Did not want supplementary</option>
		<option>Will submit</option>        
		<option>Not interested to submit</option>
		<option>CM did not want card</option>
		<option>CM is busy</option>        
		<option>Card canceled, so did not make call</option>
		<option>Customer have already our Product, so did not interested at now</option>
		<option>Tried more than twice for RTN statement</option>
		<option>Received Card/PIN/Voucher</option>
		<option>Address updated</option>
		<option>Already done</option>
		<option>Received E-statement</option>
		<option>Received statement</option>
		<option>Update placed in OSD</option>
		<option>Already complain submitted in OSD</option>
		<option>Already done by ATM team</option>
		<option>Not on us card</option>
		<option>Emergency endorsement </option>




	</select><i>{Select from list}</i>
    </td>
</tr>

<tr>
	<td><b><i>Notes</i></b></td>
	<td align="left" colspan="4"><p align="left"><textarea name="txtnotes" rows="3" cols="47"></textarea>
	</td>
</tr>  
<tr>
    <td><b><i>Date</i></b></td>
    <td><input type="text" name="idate"><a href="#" onclick="cdp1.showCalendar(this, 'idate'); return false;"><img src="images/calendar.png" border="0"></a><i>{Select from calender}</i></td>
</tr>  
  
<tr>
    <td>&nbsp;</td>
    
</tr>
  
<tr>
    <td colspan="2">
		<div align="right">
		<input type="submit" class="button" name="btnSave" value="Save">
		<input type="hidden" name="save_value" value="save_value" >
		</div>
    </td>
</tr>
  
<tr>
    <td colspan="2" align="center">


<?php if($_REQUEST['save_value'] =="save_value"){?>

<?php 




$result = mysql_query("INSERT INTO servicedetails values('','".$_REQUEST['txtcardnum']."','".$_REQUEST['txtconnum']."','".$_REQUEST['cmbctype']."','".$_REQUEST['cmbcategory']."','".$_REQUEST['cmbstatus']."','".$_REQUEST['cmbrem']."','".$_REQUEST['txtnotes']."','".$_REQUEST['idate']."','".date('Y-m-d')."','".date('H:i:s')."','".$_SESSION["user_name"]."','".$_REQUEST['branch_name']."') ");
//echo "INSERT INTO servicedetails values('','".$_REQUEST['txtcardnum']."','".$_REQUEST['txtconnum']."','".$_REQUEST['cmbctype']."','".$_REQUEST['cmbcategory']."','".$_REQUEST['cmbstatus']."','".$_REQUEST['cmbrem']."','".$_REQUEST['txtnotes']."','".$_REQUEST['idate']."','".date('Y-m-d')."','".date('H:i:s')."','".$_SESSION["user_name"]."') ";
if (!$result) {
   echo "DB Error, could not query the database\n";
   echo 'MySQL Error: ' . mysql_error();
   exit;
}
else
{
echo "Server Reply: Your Data Save Successfully";
}
?>
<?php } ?>

</td>
</tr>

</table>
</form>
</div>

</body>

<br><br>
<?php 
include_once("footer.php");
?>
<table id="calendarTable">
<tbody id="calendarTableHead">
<tr>
 <td colspan="4" align="left">
	<select id="selectMonth">
	 <option value="0">January</option>
	 <option value="1">February</option>
	 <option value="2">March</option>
	 <option value="3">April</option>
	 <option value="4">May</option>
	 <option value="5">June</option>
	 <option value="6">July</option>
	 <option value="7">August</option>
	 <option value="8">September</option>
	 <option value="9">October</option>
	 <option value="10">November</option>
	 <option value="11">December</option>
	</select>
 </td>
 <td colspan="2" align="center"><select id="selectYear"></select></td>
 <td align="right"><a href="#" id="closeCalendarLink">X</a></td>
</tr>
</tbody>
<tbody id="calendarTableDays">
<tr id="calenderDaysIndex">
 <td >Su</td><td>Mo</td><td>Tu</td><td>We</td><td>Thu</td><td>Fr</td><td>Sa</td>
</tr>
</tbody>
<tbody id="calendar"></tbody>
</table>



</html>


