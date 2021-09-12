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
$sales_inquiry_id = $_GET['sid'];
$action = $_GET['action'];

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
	
?>

<!DOCTYPE html>
<head>
    <title>GBG Enterprise - Dashboard</title>

</head>

      <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="img/gbg.jpg" alt="Company Logo" class="img-thumbnail">
                </div>
                <div class="sidebar-brand-text mx-3">GBG Enterprise</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
			<div class="sidebar-heading">
                Sales
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Sales Inquiry</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Components:</h6>
                        <a class="collapse-item" href="salesinquiry.php">Generate Sales Inquiry </a>
                        <a class="collapse-item" href="salesinquiryview.php">Sales Inquiry History</a>
                    </div>
                </div>
            </li>



            <!-- Divider -->
       <!--     <hr class="sidebar-divider">-->



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">



        </ul>
        <!-- End of Sidebar -->

          <!-- Content Wrapper -->
          <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                  
                     

                        <!-- Nav Item - User Information -->
                      <?php echo logindetails(); ?>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
				


                    <!-- customer data -->
					<form action="salesinquiryupdate.php" novalidate method="POST" enctype="multipart/form-data">
					<div class="row gy-5">
							<div class="col-lg-12">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
                     
												
												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Sales Inquiry Details</div>
												
											<div class="row  align-items-center">
											<div class="col sm-4">
												
											</div>
											
											<div class="col sm-4">
												
											</div>
											</div>
												
                        <div class="row  align-items-center">
													<div class="card-body" >
                          <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">

                                        <?php
											
											$cust_id = $_GET['custid'];
											$sales_id = $_GET['sid'];
											$_SESSION['cust_id'] = $cust_id;
											$_SESSION['sales_id'] = $sales_id;
                                             $SI_customer_name = getRecord('customer_company_name','tbl_customer','customer_id ='.$cust_id);
                                             $SI_contact_num = getRecord('customer_contact_no','tbl_customer','customer_id ='.$cust_id);
                                             $SI_customer_rep = getRecord('customer_representative','tbl_customer','customer_id='.$cust_id);
                                             $SI_customer_email = getRecord('customer_email','tbl_customer','customer_id='.$cust_id);
                                             $SI_customer_address = getRecord('customer_address','tbl_customer','customer_id='.$cust_id);
											 
                                            echo '<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Customer Name:'. $SI_customer_name .'</div>
                                            <div class="row  align-items-center">
                                                <div class="col-auto">
                                                    <form class="user">
                                                      <div class="form-group row">
                                                      <div class="col-auto">
                                                        </div>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        <div class="col-auto customerdata" id="customerdata">

                                                      <!-- customer details -->
                                                      <div class="form-group row">
                                                      
                                                        
                                                          <div class="col-sm-3">
                                                            <p>Customer Representative:</p>
                                                          </div>
                                                          <div class="col-sm-3">
                                                            <p class="h5 custrep"><b>
															<input type="text" class="form-control prodnameval" name="si_customer_rep" required  placeholder=""aria-label="" aria-describedby="basic-addon2" value="'. $SI_customer_rep .'">
															</b></p>
                                                          </div>
                                                          
                                                          
                                                          <div class="col-sm-2">
                                                            <p>Customer Email:</p>
                                                          </div>
                                                          <div class="col-sm-4">
                                                            <p class="h5 custemail"><b>
															<input type="text" class="form-control prodnameval" name="si_customer_email" required  placeholder=""aria-label="" aria-describedby="basic-addon2" value="'. $SI_customer_email .'">
															</b></p>
                                                          </div>
                                                          
                                                          
                                                          <div class="col-sm-3">
                                                            <p>Customer Contact:</p>
                                                          </div>
                                                          <div class="col-sm-3">
                                                            <p class="h5 custcontact"><b>
															<input type="text" class="form-control prodnameval" name="si_customer_contact_num" required  placeholder=""aria-label="" aria-describedby="basic-addon2" value="' . $SI_contact_num . '">
															</b></p>
                                                          </div>
                                                    <!--	</div>
                                                      
                                                      <div class="form-group row"> -->
                                                          <div class="col-sm-2">
                                                            <p>Customer Address:</p>
                                                          </div>
                                                          <div class="col-sm-4">
                                                            <p class="h5 custrep"><b>
															<input type="text" class="form-control prodnameval" name="si_customer_address" required  placeholder=""aria-label="" aria-describedby="basic-addon2" value="' . $SI_customer_address . '">
															</b></p>
                                                          </div>
                                                      </div></div>
                                                        </div>
                                                        </div>';
                                          ?>
                                          
                                      
														          
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					  </div>
					<!-- end customer data -->
					 <!-- product image -->
					 <div class="row gy-5">
							<div class="col-lg-12">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Image</div>
												<!--<input type="file"  class="form-control-user chooseFile" accept="image/*"  name="fileToUpload" id="fileToUpload" multiple>-->
												<input type="file" accept="image/*"  name="fileToUpload" id="fileToUpload">
												<script type="text/javascript">
															$(document).ready(function(){

															$("#fileToUpload").change(function(){

															  $('#image_preview').html("");

															  var total_file=document.getElementById("fileToUpload").files.length;

																for(var i=0;i<total_file;i++)
																{
																	$('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'></br> </br></br> </br>");
																}


															});

														});
												</script>
															
												<div class="row  align-items-center">
													<div class="card-body">
                            <?php 
								echo '<div class="col-sm-4">
								<p class="h5 custemail"><b>Current Image</b></p>
							  </div>';
                              $sales_id = $_GET['sid'];
                              $image_data = getRecord('product_image','tbl_sales_inquiry','sales_inquiry_id ='.$sales_id);
							  $commaList = explode(",", $image_data);							  
							  $ctr = count($commaList);
							  
							  for ($c=1;$c<$ctr;$c++)
							 {

                       
							  ?>
                              <div id="image_preview"><img src="img/<?php echo $commaList[$c]; ?>"><br> <br><br> <br></div>
                              <!--	<img src="img/imgprev.png" alt="Preview Image" class="img-fluid imgPlaceholder" id="imgPlaceholder"> -->
                                <div class="row gy-5 align-items-center"></div><br><br>
							<?php }
                            ?>
                            
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>
          <!-- end product image-->
         <!-- material -->
		      <div class="row gy-5">
						<div class="col-lg-4">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Product</div>
												<div class="row  align-items-center">
													<div class="card-body">
													 		<form class="user">
														<div class="form-group row">
														
														<div class="col-lg-3">
															<a href="#" data-toggle="modal" data-target="#createprodModal" class="d-none createprod d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-box-open fa-sm text-white-50"></i> Create Product</a>
														</div>
														
																<div class="col-sm-8">
																
																	<select class="form-control form-select productdropdownedit" name="product" aria-label="Default select example">
																	  <?php
                                              $customerID = $_GET["custid"];
                                              $sales_id = $_GET['sid'];
                                              $SI_product_id  = getRecord('product_id','tbl_sales_inquiry','sales_inquiry_id ='.$sales_id);
                                              $SI_product_name  = getRecord('product_name','tbl_product','product_id ='.$SI_product_id);
                                              $con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());
                                                      $result = "";
                                                      $query = mysqli_query($con,"select * FROM tbl_product where product_status='Active' and customer_id=".$customerID." ");
                                                      $numRows = mysqli_num_rows($query);
                                                      
                                              if(empty($numRows))
                                              {
                                                echo "<option value='none'>Select Product</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='none'>Select Product</option>";
                                                while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
                                                    echo "<option value=".$row['product_id'].">".$row['product_name']."</option>";
                                                }
                                              }
                                                     mysqli_close($con);
                                    ?>
																		
																	</select>
																</div>
															
																<div class="row gy-5">
																</div>
																
																<div class="col-auto productdata visible" id="productdata">
																<?php 
																		$sales_id = $_GET['sid'];
																		$SI_product_id  = getRecord('product_id','tbl_sales_inquiry','sales_inquiry_id ='.$sales_id);
																		$SI_product_name  = getRecord('product_name','tbl_product','product_id ='.$SI_product_id);
																		$SI_product_size  = getRecord('product_size','tbl_product','product_id ='.$SI_product_id);
																		$SI_product_material_type  = getRecord('product_material_type','tbl_product','product_id ='.$SI_product_id);
																		echo '
																			<div class="col-sm-6">
																				<p>Product Size:</p>
																			</div>
																			<div class="col-sm-6">
																				<p class="h6 custemail"><b>' . $SI_product_size . '</b></p>
																			</div>
																			<div class="form-group row proddata">
																				<div class="col-sm-6">
																				<p>Product Material Type:</p>
																				</div>
																				<div class="col-sm-6">
																				<p class="h6 custcontact"><b>'. $SI_product_material_type .'</b></p>
																				</div>
																			</div>';
																	?>
															
																</div>
																
															</form>
																<div class="col-auto productadd hidden">
															    <!-- Logout Modal-->
															<div class="modal fade" id="createprodModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
																aria-hidden="true">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title" id="exampleModalLabel1">Create Product</h5>
																			<button class="close" type="button" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">×</span>
																			</button>
																		</div>
																		<div class="modal-body">
																		
																		
																		<div class="row" id="notif2" style="display:none;">
																				<div class="col-md-12">
																					<div class="alert alert-success" id="notitext2">
																					</div>
																				</div>
																			</div>
																		<div class="form-group row ">
																			<!-- <form class="user prodadddataEDIT" name="prodadddataEDIT"  id="prodadddataEDIT"> -->
																			<div class="col-sm-6">
																				<p>Product Name:</p>
																			</div>
																			<div class="col-sm-6">
                                      <input class="custid" type="hidden" id="custid" name="custid" value="<?php echo $_GET["custid"]; ?>">
																					<input type="text" class="form-control prodnamedata" name="prodnamedata" required  placeholder="Enter Product name" aria-label="Recipient's username" aria-describedby="basic-addon2">
																			</div>
																		<!--	<div class="col-sm-6">
																				<p>Material:</p>
																			</div>
																			<div class="col-sm-6">
																					<input type="text" class="form-control" placeholder="Enter Material name" aria-label="Recipient's username" aria-describedby="basic-addon2">
																			</div> -->
																			
																			<div class="col-sm-6">
																				<p>Product Sizeaa:</p>
																			</div>
																			<div class="col-sm-6">
																					<input type="text" class="form-control prodsizeval" name="prodsizeval" required  placeholder="Enter Product size" aria-label="Recipient's username" aria-describedby="basic-addon2">
																			</div>
																			
																			<div class="col-sm-6">
																				<p>Product Material Type:</p>
																			</div>
																			<div class="col-sm-6">
																					<input type="text" class="form-control prodmattypeval" name="prodmattypeval" required placeholder="Enter Material type" aria-label="Recipient's username" aria-describedby="basic-addon2">
																			</div>
																		</div>
														
																	
																																				
																		</div>
																	<div class="modal-footer">
																		<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
																		<button class="btn btn-primary prodadddataEDIT" name="prodadddataEDIT" id="prodadddataEDIT" type="button" >Submit</button>
																	</div>
																		</form>
																	</div>
																</div>
															</div>
																
														
															
														</div>
																
															
														</div>
														
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					<!--end of product name-->
                                              	<!-- material -->
					<div class="col-lg-4">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Material</div>
												<div class="row  align-items-center">
													<div class="card-body">
													
														<div class="form-group row ">
																													
															
															
													<!--		<select class="selectpicker form-control materialdata" multiple data-live-search="true"   >
															 <?php
				   
																		echo getDropdown('tbl_material',"material_status='Active'",'material_id',"material_name");
				 
																		?>
															</select> -->
															
															
															<div class="col-lg-8">
																<select class="form-control selecttable"	id="inv" >
																 <?php
					   
																			echo getDropdown('tbl_material',"material_status='Active'",'material_id',"material_name");
					 
																			?>
																</select>
															</div>
															
															
															<div class="col-lg-4">
																<a href="#"  class="btn btn-sm btn-primary shadow-sm" onclick="addMaterial(); return false"><i class="far fa-plus-square"></i> Add Item</a>
															</div>

															
															<div class="row gy-5"></div>
															
															
													<!--	<button class="btn btn-primary test"  type="button" >Submit</button>			-->
													
														</div>
														<div class="form-group row txtResult1" id="txtResult1">
															
																															<table class="table table-bordered materialtable" id="materialtable" width="100%" cellspacing="0">
																		<thead>
																			<th>ID</th>
																			<th>Material Name</th>
																			<th></th>
																		</thead>
																	<tbody>
																	<?php
																	for($a=0;$a<count($itemarray);$a++)
																	{
																		$MaterialListDetails = MaterialListDetails($itemarray[$a]);
																		
	
																		if($MaterialListDetails["material_id"]!="")
																		{
																	?>
																			<tr>
																	<td><?php echo $itemarray[$a]; ?> </td>
																	<td><?php echo strtoupper($MaterialListDetails["material_name"]); ?> </td>
																	<td> <a href="#"  class="btn btn-sm btn-primary shadow-sm" onclick="deleteMaterial(<?php echo $a; ?>); return false"><i class="far fa-trash-alt"></i></a></td>
																			</tr>
																	
																	
																	<?php     }
																	}?>
																
																	
																	</tbody>
																	
																   
																 
																</table>
																
														</div>
													
													
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
              
					<!-- end of material name -->
					<!-- manufacturing process -->
					<div class="col-lg-4">
              <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
												  <div class="text-sm font-weight-bold text-info text-uppercase mb-4">Manufacturing Process</div>
                          <div class="row  align-items-center">
													<div class="card-body">
														<?php 
                              $sales_id = $_GET['sid'];
                              $SI_product_manufacturing_process  = getRecord('product_manufacturing_process','tbl_sales_inquiry','sales_inquiry_id ='.$sales_id);

                              
                              $str_arr = explode (",", $SI_product_manufacturing_process); 
                              $_extrusion = false;
                              $_printing = false;
                              $_1stLamination = false;
                              $_2ndLamination = false;
                              $_curing = false;
                              $_slitting = false;
                              $_cuttingandbagging = false;

                              echo'<div class="row gy-5"></div>';
														
                             
                              if (in_array("extrusion", $str_arr))
                              {
                                echo '<div class="form-check">
                                <input class="form-check-input" type="checkbox" value="extrusion" name="chkbx_extrusion" id="extrusion" checked="checked">
                                <label class="form-check-label" for="flexCheckDefault">
                                Extrusion
                                </label>
                                </div>';
                              }
                              else
                              {
                                echo '<div class="form-check">
                                <input class="form-check-input" type="checkbox" value="extrusion" name="chkbx_extrusion" id="extrusion" >
                                <label class="form-check-label" for="flexCheckDefault">
                                Extrusion
                                </label>
                                </div>';
                              }
                              
                              if (in_array("printing", $str_arr))
                              {
                                echo '<div class="form-check">
                                <input class="form-check-input" type="checkbox" value="printing" name="chkbx_printing" id="printing" checked="checked">
                                <label class="form-check-label" for="flexCheckDefault">
                                Printing
                                </label>
                              </div>';
                              }
                              else
                              {
                                echo '<div class="form-check">
                                <input class="form-check-input" type="checkbox" value="printing" name="chkbx_printing"  id="printing" >
                                <label class="form-check-label" for="flexCheckDefault">
                                Printing
                                </label>
                                </div>';
                              }
                              if (in_array("1stlamination", $str_arr))
                              {
                                echo '<div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1stlamination" name="chkbx_1stlamination"  id="1stlamination" checked="checked">
                                <label class="form-check-label" for="flexCheckDefault">
                                1st Lamination
                                </label>
														    </div>';
                              }
                              else
                              {
                                echo '<div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1stlamination" name="chkbx_1stlamination"  id="1stlamination">
                                <label class="form-check-label" for="flexCheckDefault">
                                1st Lamination
                                </label>
														    </div>';
                              }
                              if (in_array("2ndlaminication", $str_arr))
                              {
                                echo '<div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="2ndlamination" name="chkbx_2ndlamination"  id="2ndlamination" checked="checked">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    2nd Lamination
                                    </label>
                                  </div>';
                              }
                              else
                              {
                                echo '<div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="2ndlamination" name="chkbx_2ndlamination"  id="2ndlamination">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    2nd Lamination
                                    </label>
                                  </div>';
                              }
                              if (in_array("curing", $str_arr))
                              {
                                echo '<div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="curing" name="chkbx_curing" id="curing"  checked="checked">
                                      <label class="form-check-label" for="flexCheckDefault">
                                      Curing
                                      </label>
                                    </div>';
                              }
                              else
                              {
                                echo '<div class="form-check">
                                <input class="form-check-input" type="checkbox" value="curing" name="chkbx_curing"  id="curing">
                                <label class="form-check-label" for="flexCheckDefault">
                                Curing
                                </label>
                              </div>';
                              }
                              if (in_array("slitting", $str_arr))
                              {
                                echo '<div class="form-check">
                                <input class="form-check-input" type="checkbox" value="slitting" name="chkbx_slitting"  id="slitting" checked="checked">
                                <label class="form-check-label" for="flexCheckDefault">
                                Slitting
                                </label>
                              </div>';
                              }
                              else
                              {
                                echo '<div class="form-check">
                                <input class="form-check-input" type="checkbox" value="slitting" name="chkbx_slitting"  id="slitting">
                                <label class="form-check-label" for="flexCheckDefault">
                                Slitting
                                </label>
                              </div>';
                              }
                              if (in_array("cuttingandbagging", $str_arr))
                              {
                                echo '<div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="cuttingandbagging"  name="chkbx_cuttingbagging" id="cuttingandbagging" checked="checked">
                                      <label class="form-check-label" for="flexCheckDefault">
                                      Cutting and Bagging
                                      </label>
                                    </div>';
                              }
                              else
                              {
                                echo '<div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="cuttingandbagging"  name="chkbx_cuttingbagging" id="cuttingandbagging">
                                      <label class="form-check-label" for="flexCheckDefault">
                                      Cutting and Bagging
                                      </label>
                                    </div>';
                              }

                            ?>
                            </div>
                            </div>
                        </div>
                      </div>
                    </div>
              </div>    
          </div>
          
					  <div class="row gy-5 align-items-center">
					
						<div class="col-lg-3">
						  
						</div>
						<div class="col-lg-6">
						<button type="submit" class="btn btn-success btn-lg btn-block" name="submitSIEdit" value="submitSIEdit">Submit</button>
						</div>
						<div class="col-lg-3">
						 
						</div>
						
					
					</form>
					
					
<!-- Footer -->
<footer class="sticky-footer bg-white">
                <div class="container my-auto ">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; GBG 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../gbgv2/destroy.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

	<div class="modal fade" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                
				</div>
            </div>
        </div>
    </div>
    
   
    
  </body>
</html>