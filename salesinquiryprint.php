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


$sales_id = $_GET["sid"];
$pid = $_GET["pid"];
$cust_id = $_GET["custid"];



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
    <title>GBG Enterprise - Dashboard</title>
<script type="text/javascript">
<!--
window.print();
//-->
</script>
</head>

      <body id="page-top">
	  <p class=MsoNormal align=center style='text-align:center;tab-stops:39.0pt'><span
style='font-size:14.0pt;line-height:107%'><o:p>&nbsp;</o:p></span></p>

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



<div align=center>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0 width="80%">
 <tr >

  <td><span style='font-size:16.0pt'>SALES INQUIRY ID</span></p>
  </td>
  <td>
  <span style='font-size:16.0pt'>
  <?php 
  
  echo $sales_id;
  ?>
  </span>
  </td>
 </tr>
 
 
  <tr>

  <th  width="30%" colspan="2">
  <h3 style='font-size:16.0pt' align="center"><b>CUSTOMER INFORMATION</b></h3>
  </th>

 </tr>
 
 
 <tr >
  <td>
	<span style='font-size:16.0pt'>CUSTOMER NAME</span>
  </td>
  <td>
  <span style='font-size:16.0pt'>
<?php
                   //     $cust_id = $_SESSION['custid'];
                        $SI_customer_name = getRecord('customer_company_name','tbl_customer','customer_id ='.$cust_id);
                        echo "" . $SI_customer_name ;?>
  </span>
  </td>
  
  
 </tr>
 
 
  <tr>	
  <td >
  <span style='font-size:16.0pt'>CUSTOMER REPRESENTATIVE</span>
  </td>
  <td>
 <span style='font-size:16.0pt'>
<?php
                        //$cust_id = $_SESSION['custid'];
                        $custrep = getRecord('customer_representative','tbl_customer','customer_id ='.$cust_id);
                        echo "" . $custrep;?>
  </span>
  </td>
 </tr>
 <tr >
  <td><span style='font-size:16.0pt'>ADDRESS</span></p>
  </td>
  <td>
<span style='font-size:16.0pt'>
<?php
                        //$cust_id = $_SESSION['custid'];
                        $address = getRecord('customer_address','tbl_customer','customer_id ='.$cust_id);
                        echo "" . $address ;?>
  </span>
  </td>
 </tr>
 
 <tr>
  <td>
<span style='font-size:16.0pt'>PHONE NUMBER</span>
  </td>
  <td >
<span style='font-size:16.0pt'>
 <?php
                        //$cust_id = $_SESSION['custid'];
                        $SI_customer_number = getRecord('customer_contact_no','tbl_customer','customer_id ='.$cust_id);
                        echo $SI_customer_number ;?>  
</span>
  </td>
 </tr>


  <tr>

  <th  width="30%" colspan="2">
  <h3 style='font-size:16.0pt' align="center"><b>PRODUCT INFORMATION</b></h3>
  </th>

 </tr>


 <tr>
  <td>
<span style='font-size:16.0pt'>PRODUCT NAME:</span>
  </td>
  <td >
<span style='font-size:16.0pt'>
                <?php //$sales_id = $_SESSION['sid'];
                       $SI_product_id  = getRecord('product_id','tbl_sales_inquiry','sales_inquiry_id ='.$sales_id);
                       $SI_product_name  = getRecord('product_name','tbl_product','product_id ='.$SI_product_id);
                        echo  $SI_product_name; ?>
</span>
  </td>
 </tr>
 
  <tr>
  <td>
<span style='font-size:16.0pt'>PRODUCT SIZE:</span>
  </td>
  <td >
<span style='font-size:16.0pt'>
                <?php 
                       $SI_product_size  = getRecord('product_size','tbl_product','product_id ='.$SI_product_id);
                
                        echo  $SI_product_size; ?>
</span>
  </td>
 </tr>
 
 
   <tr>
  <td>
<span style='font-size:16.0pt'>PRODUCT MATERIAL TYPE:</span>
  </td>
  <td >
<span style='font-size:16.0pt'>
                <?php 
							$SI_product_material_type  = getRecord('product_material_type','tbl_product','product_id ='.$SI_product_id);
                        echo  $SI_product_material_type; ?>
</span>
  </td>
 </tr>


  <tr>

  <th  width="30%" colspan="2">
  <h3 style='font-size:16.0pt' align="center"><b>&nbsp;</b></h3>
  </th>

 </tr>
 
   <tr>

  <th  width="30%" colspan="2">
  <h3 style='font-size:16.0pt' align="center"><b>&nbsp;</b></h3>
  </th>

 </tr>


  <tr>

  <th  width="30%" colspan="2">
  <h3 style='font-size:16.0pt' align="center"><b>ACTUAL SAMPLE</b></h3>
  </th>

 </tr>


   <tr>

  <th  width="30%" colspan="2">
  <h3 style='font-size:16.0pt' align="center"><b>&nbsp;</b></h3>
  </th>

 </tr>
 
 
    <tr>

  <th  width="30%" colspan="2">
  <h3 style='font-size:16.0pt' align="center">
  <?php 
                            //$sales_id = $_SESSION['sid'];
                              $image_data = getRecord('product_image','tbl_sales_inquiry','sales_inquiry_id ='.$sales_id);
							  $commaList = explode(",", $image_data);							  
							  $ctr = count($commaList);
							  
							  for ($c=1;$c<$ctr;$c++)
							 {

								
						
							  ?>
                              <img src="/gbgv2/img/<?php echo $commaList[$c]; ?>"><br> <br><br> <br>
                              <!--	<img src="img/imgprev.png" alt="Preview Image" class="img-fluid imgPlaceholder" id="imgPlaceholder"> -->
                                <div class="row gy-5 align-items-center"></div><br><br>
							<?php }
                            ?>
  </h3>
  </th>

 </tr>

</table>

</div>
      
     
              
             
  <!--        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Product Name</th>
                <th width="30%">Size</th>
                <th width="30%">Material</th>
                
              </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                <?php $sales_id = $_SESSION['sid'];
                       $SI_product_id  = getRecord('product_id','tbl_sales_inquiry','sales_inquiry_id ='.$sales_id);
                       $SI_product_name  = getRecord('product_name','tbl_product','product_id ='.$SI_product_id);
                       $SI_product_size  = getRecord('product_size','tbl_product','product_id ='.$SI_product_id);
                       $SI_product_material_type  = getRecord('product_material_type','tbl_product','product_id ='.$SI_product_id);
                        echo  $SI_product_name; ?>
                        </td>
                <td><?php
                    $sales_id = $_SESSION['sid'];
                    $SI_product_id  = getRecord('product_id','tbl_sales_inquiry','sales_inquiry_id ='.$sales_id);
                    $SI_product_name  = getRecord('product_name','tbl_product','product_id ='.$SI_product_id);
                    $SI_product_size  = getRecord('product_size','tbl_product','product_id ='.$SI_product_id);
                    $SI_product_material_type  = getRecord('product_material_type','tbl_product','product_id ='.$SI_product_id);
                     echo  $SI_product_size; ?>
                </td>
                <td><?php
                    $sales_id = $_SESSION['sid'];
                    $SI_product_id  = getRecord('product_id','tbl_sales_inquiry','sales_inquiry_id ='.$sales_id);
                    $SI_product_name  = getRecord('product_name','tbl_product','product_id ='.$SI_product_id);
                    $SI_product_size  = getRecord('product_size','tbl_product','product_id ='.$SI_product_id);
                    $SI_product_material_type  = getRecord('product_material_type','tbl_product','product_id ='.$SI_product_id);
                     echo  $SI_product_material_type; ?>
                </td>
                
                
                
               
                                
                </tr>  
                <tr>
                    
                </tr>           
                </tbody>
          </table>
		  -->
		  

       
        
  </body>
</html>