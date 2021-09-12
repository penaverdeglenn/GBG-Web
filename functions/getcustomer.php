<?php
require_once __DIR__."/allfunctions.php";


	$con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());
	$echo="";
	$custrep = "";
	$custemail = "";
	$custnum = "";
	$custaddress = "";
	$customerID = $_GET['customerid'];
 	$echo.='<div class="form-group row">';
	
	$echo.='<div class="col-auto">';
	$echo.='<p>Customer Representative:</p> ';
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
	
	if($customerID!="")
    {
    $strSQL = "SELECT * FROM tbl_customer WHERE customer_status='Active' AND customer_id=".$customerID;
    $rs1 = mysqli_query($con,$strSQL) or die (mysqli_error($con));
    
   
    $row1 = mysqli_fetch_array($rs1 ,MYSQLI_ASSOC);
    $custrep = $row1["customer_representative"];
	$custemail = $row1["customer_email"];
	$custnum = $row1["customer_contact_no"];
	$custaddress = $row1["customer_address"];
 	mysqli_close($con);
	}
?>

															<div class="form-group row">
															
																
																	<div class="col-sm-3">
																		<p>Customer Representative:</p>
																	</div>
																	<div class="col-sm-3">
																		<p class="h5 custrep"><b><?php echo $custrep; ?></b></p>
																	</div>
																	
																	
																	<div class="col-sm-2">
																		<p>Customer Email:</p>
																	</div>
																	<div class="col-sm-4">
																		<p class="h5 custemail"><b><?php echo $custemail; ?></b></p>
																	</div>
																	
																	
																	<div class="col-sm-3">
																		<p>Customer Contact:</p>
																	</div>
																	<div class="col-sm-3">
																		<p class="h5 custcontact"><b><?php echo $custnum; ?></b></p>
																	</div>
														<!--	</div>
															
															<div class="form-group row"> -->
																	<div class="col-sm-2">
																		<p>Customer Address:</p>
																	</div>
																	<div class="col-sm-4">
																		<p class="h5 custrep"><b><?php echo $custaddress; ?></b></p>
																	</div>
															</div>