<?php
require_once __DIR__."/allfunctions.php";


	$con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());
	$echo="";
	$custrep = "";
	$custemail = "";
	$custnum = "";
	$custaddress = "";
	$sid = $_GET['sid'];
 	$echo.='<div class="form-group row">';
	
	$echo.='<div class="col-auto">';
	$echo.='<p>Sales Inquiry ID:</p> ';
	$echo.='</div>';
	
	$echo.='<div class="col-auto">';
	$echo.='<p class="h5 custrep"><b>Test@testetestst</b></p>';
	$echo.='</div>';
	
	$echo.='<div class="col-auto">';
	$echo.='<p>Customer Email:</p> ';
	$echo.='</div>';
	
	$echo.='<div class="col-auto">';
	$echo.='<p class="h5 email"><b>Test@testetestst</b></p>';
	$echo.='</div>';
	
	if($sid!="")
    {
    $strSQL = "SELECT * FROM tbl_sales_inquiry WHERE salesinquiry_status='Approved' AND sales_inquiry_id=".$sid;
    $rs1 = mysqli_query($con,$strSQL) or die (mysqli_error($con));
    
   
    $row1 = mysqli_fetch_array($rs1 ,MYSQLI_ASSOC);
	$cust_id = $row1["customer_id"];
    $SI_customer_name = getRecord('customer_company_name','tbl_customer','customer_id ='.$cust_id);
    $SI_contact_num = getRecord('customer_contact_no','tbl_customer','customer_id ='.$cust_id);
    $SI_customer_rep = getRecord('customer_representative','tbl_customer','customer_id='.$cust_id);
    $SI_customer_email = getRecord('customer_email','tbl_customer','customer_id='.$cust_id);
    $SI_customer_address = getRecord('customer_address','tbl_customer','customer_id='.$cust_id);
	
	$SI_product_id = $row1["product_id"];
    $SI_product_name  = getRecord('product_name','tbl_product','product_id ='.$SI_product_id);
    $SI_product_size  = getRecord('product_size','tbl_product','product_id ='.$SI_product_id);
    $SI_product_material_type  = getRecord('product_material_type','tbl_product','product_id ='.$SI_product_id);
 	mysqli_close($con);
	}
?>

															<div class="row">
															
																
																	<div class="col-sm-3">
																		<p>Sales Inquiry ID:</p>
																	</div>
																	<div class="col-sm-3">
																		<p class="h5 sid"><b><?php echo $sid; ?></b></p>
																	</div>
																	<div class="col-sm-3">
																		View Details:
																		<a type="button" target="_blank" class="btn btn-sm btn-primary shadow-sm" href="salesinquirydetails.php?action=edit&custid=<?php echo $cust_id; ?>&sid=<?php echo $sid; ?>"><i class="far fa-eye"></i></a>
																	</div>
															</div>		
																	
															<div class="row gy-5"></div>
															<div class="row">
															
																	<div class="text-sm font-weight-bold text-success text-uppercase mb-4">Customer</div>
															</div>			
																	
																	
															<div class="row">		
															
																	<div class="col-sm-3">
																				<p>Customer Name:</p>
																	</div>
																			
																	<div class="col-sm-3">
																				<p class="h5 custname"><b><?php echo $SI_customer_name; ?></b></p>
																	</div>
																	
																	
																	<div class="col-sm-3">
																		<p>Customer Representative:</p>
																	</div>
																	<div class="col-sm-3">
																		<p class="h5 custrep"><b><?php echo $SI_customer_rep; ?></b></p>
																	</div>
															</div>
															<div class="row">
																	<div class="col-sm-3">
																		<p>Customer Address:</p>
																	</div>
																	<div class="col-sm-8">
																		<p class="h5 custcontact"><b><?php echo $SI_customer_address; ?></b></p>
																	</div>
															</div>
															<div class="row gy-5"></div>
															<div class="row">
															
																	<div class="text-sm font-weight-bold text-success text-uppercase mb-4">Product</div>
															</div>		

															<div class="row">		
															
																	<div class="col-sm-3">
																				<p>Product Name:</p>
																	</div>
																			
																	<div class="col-sm-3">
																				<p class="h5 custname"><b><?php echo $SI_product_name; ?></b></p>
																	</div>
																	
																	
																	<div class="col-sm-3">
																		<p>Product Size:</p>
																	</div>
																	<div class="col-sm-3">
																		<p class="h5 custrep"><b><?php echo $SI_product_size; ?></b></p>
																	</div>
															</div>	

															<div class="row">
																	<div class="col-sm-3">
																		<p>Product Material Type:</p>
																	</div>
																	<div class="col-sm-8">
																		<p class="h5 custcontact"><b><?php echo $SI_product_material_type; ?></b></p>
																	</div>
															</div>
																	