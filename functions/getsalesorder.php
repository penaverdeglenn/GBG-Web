<?php
require_once __DIR__."/allfunctions.php";


	$con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());
	$echo="";
	$custrep = "";
	$custemail = "";
	$custnum = "";
	$custaddress = "";
	$qid = $_GET['qid'];
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

	if($qid!="")
    {
	//$si_id = getRecord('sales_inquiry_id_for_quote','tbl_quotation','quotation_id ='.$qid);
    $strSQL = "SELECT * FROM tbl_salesorder WHERE status='Approved' AND id=".$qid;
    $rs1 = mysqli_query($con,$strSQL) or die (mysqli_error($con));


    $row1 = mysqli_fetch_array($rs1 ,MYSQLI_ASSOC);
//	$cust_id = $row1["customer_id"];
//    $SI_customer_name = getRecord('customer_company_name','tbl_customer','customer_id ='.$cust_id);

	  $sales_inquiry_id = $row1["salesinquiryID"];
		$quotationID = $row1["quotationID"];
		$SI_product_id = $row1["productID"];
    $SI_product_name  = getRecord('product_name','tbl_product','product_id ='.$SI_product_id);
    $SI_product_size  = getRecord('product_size','tbl_product','product_id ='.$SI_product_id);
    $SI_product_material_type  = getRecord('product_material_type','tbl_product','product_id ='.$SI_product_id);
 	mysqli_close($con);
	}
?>

															<div class="row">

																	<input type="hidden"  class="cust_id" name="cust_id" id ="cust_id" value="<?php echo $cust_id; ?>">
																	<input type="hidden"  class="SI_product_id" name="SI_product_id" id ="SI_product_id" value="<?php echo $SI_product_id; ?>">
																	<input type="hidden"  class="sid" name="sid" id ="sid" value="<?php echo $si_id; ?>">

																	<div class="col-sm-3">
																		<p>Sales Inquiry ID:</p>
																	</div>
																	<div class="col-sm-3">
																		<p class="h5 sid"><b><?php echo $sales_inquiry_id; ?></b></p>
																	</div>

																	<div class="col-sm-3">
																		<p>Quotation ID:</p>
																	</div>
																	<div class="col-sm-3">
																		<p class="h5 sid"><b><?php echo $quotationID; ?></b></p>
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
