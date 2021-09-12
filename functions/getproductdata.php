<?php
require_once __DIR__."/allfunctions.php";


	$con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());
	$echo="";
	$custrep = "";
	$custemail = "";
	$custnum = "";
	$custaddress = "";
	$productID = $_GET['productID'];
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
	
	if($productID!="")
    {
    $strSQL = "SELECT * FROM tbl_product WHERE product_status='Active' AND product_id=".$productID;
	
    $rs1 = mysqli_query($con,$strSQL) or die (mysqli_error($con));
    
   
    $row1 = mysqli_fetch_array($rs1 ,MYSQLI_ASSOC);
    $filmMaterialName = $row1["product_name"];
	$productSize = $row1["product_size"];
	$productMaterialType = $row1["product_material_type"];
 	mysqli_close($con);
	}
?>
															
															<div class="form-group row proddata">
																<!--	<div class="col-sm-4">
																		<p>Film Material:</p>
																	</div>
																	<div class="col-sm-8">
																		<p class="h5 custrep"><b><?php  echo $filmMaterialName; ?></b></p>
																	</div> -->
																	
																	<div class="col-sm-6">
																		<p>Product Size:</p>
																	</div>
																	<div class="col-sm-6">
																		<p class="h6 custemail"><b><?php echo $productSize; ?></b></p>
																	</div>
																	
																	
															</div>
															
															<div class="form-group row proddata">
																<!--	<div class="col-sm-4">
																		<p>Film Material:</p>
																	</div>
																	<div class="col-sm-8">
																		<p class="h5 custrep"><b><?php  echo $filmMaterialName; ?></b></p>
																	</div> -->
																	
																	
																	<div class="col-sm-6">
																		<p>Product Material Type:</p>
																	</div>
																	<div class="col-sm-6">
																		<p class="h6 custcontact"><b><?php echo $productMaterialType; ?></b></p>
																	</div>
															</div>
														
									<!--						<div class="form-group row ">
																	<div class="col-sm-2">
																		<p>Customer Address:</p>
																	</div>
																	<div class="col-sm-6">
																		<p class="h5 custrep"><b><?php echo $custaddress; ?></b></p>
																	</div>
															</div> -->