<?php session_start();

require_once __DIR__."/includes/headerincludes.php";
require_once __DIR__."/includes/dbconfig.php";
require_once __DIR__."/functions/allfunctions.php";



if(empty($_SESSION["itemarrayinventory"]))
{
    $itemarray = array();
}
else
{
  $itemarray = $_SESSION["itemarrayinventory"];
}

if(empty($_SESSION["MEMBER_ID"]) && empty($_SESSION["TYPE"]) && empty($_SESSION["FIRST_NAME"]))
{
    $itemarray = array();
}
else
{
  $memberid = $_SESSION['MEMBER_ID'];
  $type = $_SESSION['TYPE'];
  $firstname = $_SESSION['FIRST_NAME'];
  
}

$sales_id_data = $_GET["sid"];
$quotation_id_data = $_GET["qid"];
$cust_id_data = $_GET["custid"];

//echo $sales_id_data;
//echo $quotation_id_data;
//echo $cust_id_data;






//before we store information of our member, we need to start first the session
	

	//create a new function to check if the session variable member_id is on set
	function logged_in() {
		return isset($_SESSION['MEMBER_ID']);
        
	}
	//this function if session member is not set then it will be redirected to index.php
	function confirm_logged_in() {
		if (!logged_in()) { 	

?>
			<script type="text/javascript">
				window.location = "pages/login.php";
			</script>
<?php
		}
	}
	confirm_logged_in();
	
//$_SESSION['custid'];


?>

<!DOCTYPE html>
<head>
    <head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 15">
<meta name=Originator content="Microsoft Word 15">
<link rel=File-List
href="GB%20and%20G%20Provider%20Enterprise_files/filelist.xml">
<link rel=Edit-Time-Data
href="GB%20and%20G%20Provider%20Enterprise_files/editdata.mso">
<link rel=themeData
href="GB%20and%20G%20Provider%20Enterprise_files/themedata.thmx">
<link rel=colorSchemeMapping
href="GB%20and%20G%20Provider%20Enterprise_files/colorschememapping.xml">
<style>
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:3 0 0 0 1 0;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-536859905 1073786111 1 0 511 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin-top:0in;
	margin-right:0in;
	margin-bottom:8.0pt;
	margin-left:0in;
	line-height:107%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;}
a:link, span.MsoHyperlink
	{mso-style-priority:99;
	color:#0563C1;
	mso-themecolor:hyperlink;
	text-decoration:underline;
	text-underline:single;}
a:visited, span.MsoHyperlinkFollowed
	{mso-style-noshow:yes;
	mso-style-priority:99;
	color:#954F72;
	mso-themecolor:followedhyperlink;
	text-decoration:underline;
	text-underline:single;}
span.SpellE
	{mso-style-name:"";
	mso-spl-e:yes;}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;}
.MsoPapDefault
	{mso-style-type:export-only;
	margin-bottom:8.0pt;
	line-height:107%;}
@page
	{
	margin:20mm
	}
@media print {
   
   
   button {display: none;}
   
   
}
div.WordSection1
	{page:WordSection1;}
-->
</style>
<script type="text/javascript">
<!--
window.print();
//-->
</script>
</head>
	<body lang=EN-US link="#0563C1" vlink="#954F72" style='tab-interval:.5in;
word-wrap:break-word'>


              <div class="form-group row text-left mb-0">
                
<div class=WordSection1>

<p class=MsoNormal align=center style='text-align:center;tab-stops:39.0pt'><span
style='font-size:14.0pt;line-height:107%'><o:p>&nbsp;</o:p></span></p>

<div align=center>

<table bclass=MsoTableGrid border=0 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 5.4pt 0in 5.4pt;mso-border-insideh:none;mso-border-insidev:none'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes;
  height:1.5in'>
  <td width=160 valign=top align=right s>
  <img width=200 height=133
  src="GB%20and%20G%20Provider%20Enterprise_files/image003.jpg" align=left
  hspace=12 v:shapes="Picture_x0020_1">
  
  </td>
  <td width=600 valign=top style='width:600pt;padding:0in 5.4pt 0in 5.4pt;
  height:1.5in'>
  <p class=MsoNormal style='width:500pt;margin-bottom:0in;text-align:center;
  line-height:normal;tab-stops:39.0pt'><span style='font-size:24.0pt'>GB and G Provider
  Enterprise</span><span style='font-size:20.0pt'> <br>Blk 1 Lot 2, Hon. Circle St., Sterling
  Industrial Park, <span class=SpellE>Meycauyan</span> Bulacan<o:p></o:p></span></p>
  <p class=MsoNormal align=center style='width:500pt;margin-bottom:0in;text-align:center;
  line-height:normal;tab-stops:39.0pt'><span style='font-size:20.0pt'>Tel. No.
  (02) 401-9991 Mobile: 0917-821-9007<br>
  Email Address: <a href="mailto:gbg_providerenterprise.ph@gmail.com">gbg_providerenterprise.ph@gmail.com</a><br>
  Tax Identification No. 216-338-230-000</span><span style='font-size:14.0pt'><br
  style='mso-special-character:line-break'>
 <br style='mso-special-character:line-break'>
  </span><span style='font-size:24.0pt'></span></p>
  </td>
 </tr>
</table>

</div>

<h3 class=MsoNormal align=center style='text-align:center;tab-stops:39.0pt'><span
style='font-size:28.0pt;line-height:107%;color:black;mso-themecolor:text1'>QUOTATION</span></h3>
</br>
<div align=center>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 5.4pt 0in 5.4pt;mso-border-insideh:none;mso-border-insidev:none'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=155 valign=top style='width:.6pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>
  Date:
  </span></p>
  </td>
  <td width=439 valign=top style='width:500.2pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>
  <?php 
  $quote_date = getrecord('quotation_date_created','tbl_quotation','quotation_id ='. $quotation_id_data .' AND sales_inquiry_id_for_quote =' . $sales_id_data  );
  echo $quote_date;
  ?>
  <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1'>
  <td width=155 valign=top style='width:116.6pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>Company<o:p></o:p></span></p>
  </td>
  <td width=439 valign=top style='width:500.2pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>
  <?php 
  $company_name = getrecord('customer_company_name','tbl_customer','customer_id='. $cust_id_data);
  echo $company_name;
  ?>
  <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2;mso-yfti-lastrow:yes'>
  <td width=155 valign=top style='width:116.6pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>Attention To<o:p></o:p></span></p>
  </td>
  <td width=439 valign=top style='width:500.2pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>
  <?php 
  $company_rep = getrecord('customer_representative','tbl_customer','customer_id='. $cust_id_data);
  echo $company_rep;
  ?>
  <o:p></o:p></span></p>
  </td>
 </tr>
</table>

</div>

<p class=MsoNormal style='tab-stops:39.0pt'><span style='font-size:24.0pt;
line-height:107%'><o:p>&nbsp;</o:p></span></p>

<div align=center>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 5.4pt 0in 5.4pt;mso-border-insideh:none;mso-border-insidev:none'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes'>
  <td width=594 valign=top style='width:600.8pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal;tab-stops:39.0pt'><span style='font-size:16.0pt'>We are <span
  class=SpellE>please</span> to submit to you our quotation base on requirement
  of your inquiry<o:p></o:p></span></p>
  </td>
 </tr>
</table>

</div>

<p class=MsoNormal style='tab-stops:39.0pt'><span style='font-size:24.0pt;
line-height:107%'><o:p>&nbsp;</o:p></span></p>

<div align=center>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 5.4pt 0in 5.4pt;mso-border-insideh:none;mso-border-insidev:none'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=161 valign=top style='width:121.1pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>PRODUCT<o:p></o:p></span></p>
  </td>
  <td width=438 valign=top style='width:558.8pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>
  <?php 
  $product_id = getrecord('product_id','tbl_sales_inquiry','customer_id ='. $cust_id_data .' AND sales_inquiry_id =' . $sales_id_data );
  $product_name =getrecord('product_name','tbl_product','customer_id ='. $cust_id_data .' AND product_id =' . $product_id );
  echo $product_name;
  ?>
  <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1'>
  <td width=161 valign=top style='width:121.1pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>SPECS<o:p></o:p></span></p>
  </td>
  <td width=438 valign=top style='width:558.8pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>
   <?php 
  $product_id = getrecord('product_id','tbl_sales_inquiry','customer_id ='. $cust_id_data .' AND sales_inquiry_id =' . $sales_id_data );
  $product_material =getrecord('product_material','tbl_product','customer_id ='. $cust_id_data .' AND product_id =' . $product_id );
  echo $product_material;
  ?>
  <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2'>
  <td width=161 valign=top style='width:121.1pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>SIZE<o:p></o:p></span></p>
  </td>
  <td width=438 valign=top style='width:558.8pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>
   <?php 
  $product_id = getrecord('product_id','tbl_sales_inquiry','customer_id ='. $cust_id_data .' AND sales_inquiry_id =' . $sales_id_data );
  $product_size =getrecord('product_size','tbl_product','customer_id ='. $cust_id_data .' AND product_id =' . $product_id );
  echo $product_size;
  ?>
  <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:3'>
  <td width=161 valign=top style='width:121.1pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>PRICE<o:p></o:p></span></p>
  </td>
  <td width=438 valign=top style='width:558.8pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>
  <?php 
  $quote_price = getrecord('quotation_price','tbl_quotation','quotation_id ='. $quotation_id_data .' AND sales_inquiry_id_for_quote =' . $sales_id_data  );
  echo $quote_price;
  ?>
  <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:4'>
  <td width=161 valign=top style='width:121.1pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>COLOR<o:p></o:p></span></p>
  </td>
  <td width=438 valign=top style='width:558.8pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>
  <?php 
  $quote_color = getrecord('quotation_prod_color','tbl_quotation','quotation_id ='. $quotation_id_data .' AND sales_inquiry_id_for_quote =' . $sales_id_data  );
  echo $quote_color;
  ?>
  <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:5;mso-yfti-lastrow:yes'>
  <td width=161 valign=top style='width:121.1pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>CONSTRUCTION<o:p></o:p></span></p>
  </td>
  <td width=438 valign=top style='width:558.8pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>
  <?php 
  $quote_construction = getrecord('quotation_prod_construction','tbl_quotation','quotation_id ='. $quotation_id_data .' AND sales_inquiry_id_for_quote =' . $sales_id_data  );
  echo $quote_construction;
  ?>
  <o:p></o:p></span></p>
  </td>
 </tr>
</table>

</div>

<p class=MsoNormal align=center style='text-align:center;tab-stops:39.0pt'><span
style='font-size:24.0pt;line-height:107%'><o:p>&nbsp;</o:p></span></p>

<div align=center>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 5.4pt 0in 5.4pt;mso-border-insideh:none;mso-border-insidev:none'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=167 valign=top style='width:180.6pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>Production Tolerance<o:p></o:p></span></p>
  </td>
  <td width=438 valign=top style='width:558.8pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>
  <?php 
  $quote_tolerance = getrecord('quotation_prod_tolerance','tbl_quotation','quotation_id ='. $quotation_id_data .' AND sales_inquiry_id_for_quote =' . $sales_id_data  );
  echo $quote_tolerance;
  ?>
  <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1'>
  <td width=167 valign=top style='width:180.6pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>Delivery Terms<o:p></o:p></span></p>
  </td>
  <td width=438 valign=top style='width:358.8pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>
  <?php 
  $quote_delivery_terms = getrecord('quotation_delivery_terms','tbl_quotation','quotation_id ='. $quotation_id_data .' AND sales_inquiry_id_for_quote =' . $sales_id_data  );
  echo $quote_delivery_terms;
  ?>
  <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2;mso-yfti-lastrow:yes'>
  <td width=167 valign=top style='width:180.6pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>Delivery Schedule</span></p>
  </td>
  <td width=438 valign=top style='width:558.8pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal;tab-stops:
  39.0pt'><span style='font-size:16.0pt'>
  <?php 
  $quote_delivery_sched = getrecord('quotation_delivery_schedule','tbl_quotation','quotation_id ='. $quotation_id_data .' AND sales_inquiry_id_for_quote =' . $sales_id_data  );
  echo $quote_delivery_sched;
  ?>
  <o:p></o:p></span></p>
  </td>
 </tr>
</table>

</div>

<p class=MsoNormal style='tab-stops:39.0pt'><span style='font-size:24.0pt;
line-height:107%'><o:p>&nbsp;</o:p></span></p>

<div align=center>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 5.4pt 0in 5.4pt;mso-border-insideh:none;mso-border-insidev:none'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes'>
  <td width=612 valign=top style='width:600.9pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal;tab-stops:39.0pt'><span style='font-size:16.0pt'>***Above prices and
  conditions are subject to change without prior notice and depending on availability
  of raw materials unless confirmed<o:p></o:p></span></p>
  </td>
 </tr>
</table>

</div>

<p class=MsoNormal style='tab-stops:39.0pt'><span style='font-size:24.0pt;
line-height:107%'><o:p>&nbsp;</o:p></span></p>

<div align=center>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 5.4pt 0in 5.4pt;mso-border-insideh:none;mso-border-insidev:none'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=300 valign=top style='width:225.15pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal;tab-stops:39.0pt'><span style='font-size:16.0pt'>Approved
  By:<o:p></o:p></span></p>
  </td>
  <td width=312 valign=top style='width:233.75pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal;tab-stops:39.0pt'><span style='font-size:16.0pt'>Received
  By:<o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes;height:16.15pt'>
  <td width=300 valign=top style='width:600.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:16.15pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal;tab-stops:39.0pt'><span style='font-size:16.0pt'>
  <?php 
  $quote_approver = getrecord('quotation_approver_1','tbl_quotation','quotation_id ='. $quotation_id_data .' AND sales_inquiry_id_for_quote =' . $sales_id_data  );
  echo $quote_approver;
  ?>
  <o:p></o:p></span></p>
  </td>
  <td width=312 valign=top style='width:600.75pt;padding:0in 5.4pt 0in 5.4pt;
  height:16.15pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal;tab-stops:39.0pt'><span style='font-size:16.0pt'>Received
  By Data<o:p></o:p></span></p>
  </td>
 </tr>
</table>

</div>

<p class=MsoNormal align=center style='text-align:center;tab-stops:39.0pt'><span
style='font-size:24.0pt;line-height:107%'><o:p>&nbsp;</o:p></span></p>

      </div>
      </div>
      
  <!--    <button type="button" onClick="window.print()" >Print</button>
      <a class="btn btn-primary pull-right" onclick="printsalesorders('.$sono.');"><i class="fa fa-print"></i>Print</a>
	  <a class="btn btn-danger pull-right" onclick="javascript:window.close();"><i class="fa fa-times-circle-o"></i>Close Window</a> -->
  </body>
</html>