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
<title>Kolkata`s Hotel Offer</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="calendar.css" rel="stylesheet" type="text/css">
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
</head>
<body >

<script Language="JavaScript">
function validateR(){
        
		var typetext=(frmentry.txtname.value);
        if (typetext=="") {
          alert("Please Type Card Member Name");
          return false;
        }
		
		var typetext1=(frmentry.txtcardnum.value);
        if (typetext1=="") {
          alert("Please Type Card Number");
          return false;
        }
		var typetext1=(frmentry.txtphno.value);
        if (typetext1=="") {
          alert("Please Type Card Merber's Mobile/Phone Number");
          return false;
        }	
	
		var typetext1=(frmentry.txtemail.value);
        if (typetext1=="") {
          alert("Please Type Card Merber's email address");
          return false;
        }	
		var selectedCombobox=(frmentry.cmbhotelcat.value);
        if (selectedCombobox=="-1") {
          alert("Please Select Hotel Name");
          return false;
        }
        
     		var typetext1=(frmentry.checkin.value);
        if (typetext1=="") {
          alert("Please Select tentative date of Check In");
          return false;
        }
		var typetext1=(frmentry.checkout.value);
        if (typetext1=="") {
          alert("Please Select tentative date of Check Out");
          return false;
        }		
        }
</script>

<br><br><br>
<form name="frmentry" method="post" onSubmit="return validateR();">

<table class="Login" align="center">
  
<tr>
    <td height="5" colspan="2" ></td>
</tr>
 
<tr>
<td colspan="2" align="center"><b>Welcome::<?php echo $user;?></b></td>
</tr>
<tr>
    <td>&nbsp;</td>
    
</tr>  
<tr>
    <td height="5"></td>
</tr>

<tr>
    <td>Name of the Cardmember</td>
    <td ><input type="text" name="txtname" size="50">*</td>
</tr>
  

<tr>
    <td>Card Number</td>
    <td><input type="text" name="txtcardnum" size="20" maxlength='15'>*</td>
  </tr>

<tr>
	<td>Address</td>
	<td align="left"><p align="left"><textarea name="txtadd" rows="3" cols="38"></textarea>
	</td>
</tr> 
  
<tr>
    <td>Phone No</td>
    <td ><input type="text" name="txtphno" size="50">*</td>
</tr>


<tr>
    <td>Email Address</td>
    <td ><input type="text" name="txtemail" size="50">*</td>
</tr>

<tr>
    <td>Preferred Hotel</td>
    <td><select name="cmbhotelcat">
		<option value="-1">Select</option>        
		<option value="Taj Bengal Kolkata">Taj Bengal Kolkata</option>
		<option value="Hotel Hindusthan International">Hotel Hindusthan International</option>
                <option value="Emlion Hotel Bangalore">Emlion Hotel Bangalore</option>
	</select>*
    </td>
</tr>
<tr>
    <td>Tentative date of Check In</td>
    <td><input type="text" name="checkin"><a href="#" onclick="cdp1.showCalendar(this, 'checkin'); return false;"><img src="images/calendar.png" border="0"></a></td>
</tr>

<tr>
    <td>Tentative date of Check Out</td>
    <td><input type="text" name="checkout"><a href="#" onclick="cdp1.showCalendar(this, 'checkout'); return false;"><img src="images/calendar.png" border="0"></a></td>
</tr>


<tr>
    <td>&nbsp;</td>
</tr>
<tr>
    <td>&nbsp;</td>
</tr>
  
<tr>
    <td colspan="2">
		<div align="right">
		<input type="submit" class="button" name="btnSave" value="Save Info">
		<input type="hidden" name="save_value" value="save_value" >
		</div>
    </td>
</tr>
  
<tr>
    <td colspan="2" align="center">


<?php if($_REQUEST['save_value'] =="save_value"){?>

<?php 

$result = mysql_query("INSERT INTO hotel_offer values('','".$_REQUEST['txtname']."','".$_REQUEST['txtcardnum']."','".$_REQUEST['txtadd']."','".$_REQUEST['txtphno']."','".$_REQUEST['txtemail']."','".$_REQUEST['cmbhotelcat']."','".$_REQUEST['checkin']."','".$_REQUEST['checkout']."','".date('Y-m-d')."','".date('H:i:s')."','".$_SESSION["user_name"]."') ");

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
</body>

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


