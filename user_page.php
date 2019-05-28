<?php 

	session_start();
	include_once("db_conn.php");


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

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<head>

<link href="default.css" rel="stylesheet" type="text/css" />

<title>Work Code Management System</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link rel="stylesheet" type="text/css" href="./menu/csshorizontalmenu.css" />

<script type="text/javascript" src="./menu/csshorizontalmenu.js">

</script>

</head>



<body>

<?php
	$sql    = 'SELECT * FROM user WHERE user_type = "'.$_SESSION["SESS_1"].'" AND user_name = "'.$_SESSION["SESS_user_name"].'" ';
	$result = mysql_query($sql, $link);

	if (!$result) {
   			echo "DB Error, could not query the database\n";
   			echo 'MySQL Error: ' . mysql_error();
   			exit;
		      }
	if(mysql_num_rows($result)>0)
			{

			while ($row = mysql_fetch_assoc($result)) {
 
        			$name_published = $row['name'];
				$user_name_store = $row['user_name'];
				$_SESSION["user_name"] = $row['user_name'];

			}
			}
	else
			{
			echo "You are not valid user to access this page!";
			}

?>


<?php

	if($_SESSION["SESS_1"] != "")
	{
?>

<?php

	include_once("header.php");
	include_once("notice.php");

?>

<?php

}

?>

<?php

	if($_SESSION["SESS_1"] == "1")
 	{
?>

<table class="menu" border="1" align="right" bordercolor="#FFCCCC" width="100%"> 

<tr>
	<td width="10%" bgcolor="#CCFFCC" align="center"><b>WELCOME:</b></td>
   	<td width="27%" align="center" bgcolor="#CCFFCC"><b><?php echo $name_published;?></b></td>
	<td width="78%">

	<div class="horizontalcssmenu" align="center">

	<ul id="cssmenu1">
	<li style="border-left: 1px solid #00CCFF;"><a href="Entry_1.php" >Out Bound</a></li>

	<li><a href="#">Entry</a>
    	<ul>
    	<li><a href="entry.php" >Work Code Entry</a></li>
	<!--<li><a href="corp_saleslead.php" >Corp. Sales Lead</a></li>-->
	<li><a href="cons_saleslead.php" >Asset Sales Lead</a></li>
	<li><a href="c.php" >Liabilities Saleslead</a></li>
	<li><a href="card_saleslead.php" >Card Sales Lead</a></li>
	<!--<li><a href="Kolkata`s Hotel Offer.php">Hotel Offer</a></li>-->
    	</ul>
	</li>
	
	<li><a href="#">Service History</a>
    	<ul>
    	<li><a href="searchservicehistory.php">By Account/Card Number</a></li>
    	<li><a href="searchservicehistorybycon.php">By Contact Number</a></li>
		<li><a href="calldetails.php">Agent Wise Outbound Call Details</a></li>
		<!--<li><a href="searchservicehistory-dec-10.php">By Card Number (Till May-11)</a></li>
    	<li><a href="searchservicehistorybycon-dec-10.php">By Contact Number (Till May-11)</a></li>-->
    	</ul>
	</li>
	
	
	<li><a href="#">Report</a>
    	<ul>
    	<li><a href="servicesummary.php">Summary Report</a></li>
    	</ul>
	</li>
	<li><a href="changepassword.php">Change Password</a></li>
	<li><a href="logout.php">Logout</a></li>
	</ul>
	<br style="clear: left;" />
	</div>
	</td>
</tr>
</table>

<?php } ?>

<?php

	if($_SESSION["SESS_1"] == "3")
 	{
?>

<table class="menu" border="1" align="right" bordercolor="#FFCCCC" width="100%"> 

<tr>
	<td width="10%" bgcolor="#CCFFCC" align="center"><b>WELCOME:</b></td>
   	<td width="27%" align="center" bgcolor="#CCFFCC"><b><?php echo $name_published;?></b></td>
	<td width="78%">

	<div class="horizontalcssmenu" align="center">

	<ul id="cssmenu1">

	<li><a href="#">Entry</a>
    	<ul>
    	<li><a href="Kolkata`s Hotel Offer.php" >Hotel Offer</a></li>
	</ul>
	</li>
	
	<li><a href="#">Report</a>
    	<ul>
    	<li><a href="Hotel_Offer.php">Hotel Offer</a></li>
    	</ul>
	</li>
	<li><a href="changepassword.php">Change Password</a></li>
	<li><a href="logout.php">Logout</a></li>
	</ul>
	<br style="clear: left;" />
	</div>
	</td>
</tr>
</table>

<?php } ?>

<?php
if($_SESSION["SESS_1"] == "2")
 {
?>

<table class="menu" border="1" align="right" bordercolor="#FFCCCC" width="100%"> 

<tr>
	<td width="8%" bgcolor="#CCFFCC" align="center"><b>WELCOME:</b></td>
   	<td width="17%" align="center" bgcolor="#CCFFCC"><b><?php echo $name_published;?></b></td>
	<td width="78%">

	<div class="horizontalcssmenu" align="center">

	<ul id="cssmenu1">
	<li style="border-left: 1px solid #00CCFF;"><a href="Entry_1.php" >Out Bound</a></li>

	<li><a href="#">Entry</a>
    	<ul>
    	<li><a href="entry.php" >Work Code Entry</a></li>
	<!--<li><a href="corp_saleslead.php" >Corp. Sales Lead</a></li>-->
	<li><a href="cons_saleslead.php" >Asset Sales Lead</a></li>
	<li><a href="c.php" >Liabilities Saleslead</a></li>
	<li><a href="card_saleslead.php" >Card Sales Lead</a></li>
	<!--<li><a href="Kolkata`s Hotel Offer.php" >Kolkata`s Hotel Offer</a></li>-->
    	</ul>
	</li>
	
	<li><a href="#">Service History</a>
    	<ul>
    	<li><a href="searchservicehistory.php">By Account/Card Number</a></li>
    	<li><a href="searchservicehistorybycon.php">By Contact Number</a></li>
		<li><a href="calldetails.php">Agent wise Outbound Call Details</a></li>
		<!--<li><a href="searchservicehistory-dec-10.php">By Card Number (Till May-11)</a></li>
    	<li><a href="searchservicehistorybycon-dec-10.php">By Contact Number (Till May-11)</a></li>-->
    	</ul>
	</li>
	
	<li><a href="#">Report(Supervisor)</a>
    	<ul>
    	<li><a href="frequentcallers.php">Frequent Caller</a></li>
	<li><a href="multipleentrybycont.php">Multiple WotkCode(cont#)</a></li>
	<li><a href="multipleentrybycard.php">Multiple WotkCode(card & A/C#)</a></li>
	<li><a href="userhitcount.php">User WorkCode</a></li>
	<li><a href="toptenhit.php">Top Ten WorkCode</a></li>
	<li><a href="wcodehitcount.php">WorkCode Count</a></li>
    	<li><a href="wcodedata.php">WorkCode Wise Data</a></li>
     	<!--<li><a href="wcodedata-may-11.php">WorkCode Wise Data (Till May-11)</a></li>-->
    	<li><a href="userwisedata.php">User Wise Data</a></li>
	<li><a href="datewisedata.php">Date Wise Data</a></li>
	<li><a href="totalwcodedata.php">Total WorkCode Data</a></li>
<!--	<li><a href="totalwcodedata-dec-10.php">Total WorkCode Data (Till May-11)</a></li>-->
	<li><a href="nboard_entry.php">New Message Upload</a></li>
	<!--<li><a href="corp_saleslead_report.php">Sales Lead For Corporate Cards</a></li>-->
	<li><a href="cons_saleslead_report.php">Sales Lead For Asset/Liabilities/Card</a></li>
	<li><a href="logdetailsbycallcategory.php">logdetails by call category</a></li>
	<li><a href="logdetails.php">Outbound Call Details</a></li>
	<!--<li><a href="Hotel_Offer.php">Kolkata`s Hotel Offer</a></li>-->
	</ul>
	<li><a href="#">Create</a>
    	<ul>
    	<li><a href="WcodeEntry.php">Work Code</a></li>
	

    	</ul>

	<li><a href="changepassword.php">Change Password</a></li>
	<li><a href="logout.php">Logout</a></li>
	</ul>
	<br style="clear: left;" />
	</div>
	</td>
</tr>
</table>

<?php 

} 

?>
<br><br><br><br><br><br><br>

<table width="100%"  border="0" cellspacing="0">
	<tr>

		<td align="center">
		<img border="0" src="Logo/wmsl.jpg">
    		</td>

		
	</tr>
</table>

</body>

<br><br><br><br><br><br><br>
<?php 
include_once("footer.php");
?>

</html>
