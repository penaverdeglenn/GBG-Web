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

if(empty($_SESSION["MEMBER_ID"]) && empty($_SESSION["TYPE"]))
{
    $itemarray = array();
}
else
{
  $memberid = $_SESSION['MEMBER_ID'];
  $type = $_SESSION['TYPE'];
}



if(empty($_GET['sid']))
{

	
}
else
{
	$sales_inquiry_id = $_GET['sid'];
	
}

if(empty( $_GET['action']))
{

	
}
else
{
	$action =  $_GET['action'];
	
}

$sales_inquiry_id = isset($sales_inquiry_id)?$sales_inquiry_id:'';
$action = isset($action)?$action:'';






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
				<a class="nav-link" href="tasklist.php">
                    <i class="fas fa-fw fa-tasks"></i>
                    <span>Task</span></a>
            </li>

            <?php echo sidebar(); ?>



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
                     <!--   <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $type; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="pic/undraw_profile.svg">
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li> -->
						<?php echo logindetails(); ?>
						

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- Content Row -->
                    <div class="row gy-5">
 

                        <!-- Customer Div -->
                        <div class="col-sm-12">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-info text-uppercase mb-4">Customer</div>
                                            <div class="row  align-items-center">
                                                <div class="col-auto">
                                                    <form class="user">
														<div class="form-group row">
														<div class="col-auto">
														<?php echo $action;
															if ($action != 'edit')
															{
																echo '<a href="#" data-toggle="modal" data-target="#createcustomerModal" class="d-none createcust d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
															class="fas fa-address-card fa-sm text-white-50"></i> Create Customer</a>';
															}
															else
															{

															}
														?>
															
														</div>
															<div class="col-auto">
																<select class="form-control form-select customerdropdown" name="customer" aria-label="Default select example">
																   <option selected value="NONE">Select customer</option>
																    <?php
               
																	echo getDropdown('tbl_customer',"customer_status = 'Active'",'customer_id',"customer_company_name");
             
																	?>
																</select>
																
																
															</div>
														</div>
													</form>
																<div class="row gy-5">
																</div>
														<div class="col-auto customerdata hidden" id="customerdata">
													
													

															
														</div>
														
														<div class="col-auto customeradd hidden">
															    <!-- Logout Modal-->
															<div class="modal fade" id="createcustomerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
																aria-hidden="true">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title" id="exampleModalLabel">Create Customer</h5>
																			<button class="close" type="button" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">×</span>
																			</button>
																		</div>
																		<div class="modal-body">
																		<form class="user custadddata" name="custadddata"  id="custadddata">
																		<div class="form-group row ">
																		
																			<div class="row" id="notif" style="display:none;">
																				<div class="col-md-12">
																					<div class="alert alert-success" id="notitext">
																					</div>
																				</div>
																			</div>
																	<div class=" form-group row" >
																			<div class="col-sm-6">
																				<p>Customer Company Name:</p>
																			</div>
																			<div class="col-sm-6">
																					<input type="text" class="form-control custnameval" name="custnameval" required placeholder="Enter Company Name " aria-label="Recipient's username" aria-describedby="basic-addon2">
																			</div>
																			<div class="col-sm-6">
																				<p>Customer Representative:</p>
																			</div>
																			<div class="col-sm-6">
																					<input type="text" class="form-control custrepval" name="custrepval" required placeholder="Enter Representative " aria-label="Recipient's username" aria-describedby="basic-addon2">
																			</div>
																			
																			<div class="col-sm-6">
																				<p>Customer Email:</p>
																			</div>
																			<div class="col-sm-6">
																					<input type="email" class="form-control custemailval" name="custemailval" required placeholder="Enter Email" aria-label="Recipient's username" aria-describedby="basic-addon2">
																			</div>
																			
																			<div class="col-sm-6">
																				<p>Customer Contact:</p>
																			</div>
																			<div class="col-sm-6">
																					<input type="number" class="form-control custcontval" name="custcontval" required placeholder="Enter Contact Number" aria-label="Recipient's username" aria-describedby="basic-addon2">
																			</div>
																		</div>
																	</div>
																		<div class="form-group row ">
																				<div class="col-sm-6">
																					<p>Customer Address:</p>
																				</div>
																				<div class="col-sm-12">
																					<input type="text" class="form-control custaddval" name="custaddval" required placeholder="Enter Address" aria-label="Recipient's username" aria-describedby="basic-addon2">
																				</div>
																		</div>
																	
																																		
																		</div>
																		<div class="modal-footer">
																			<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
																			<button class="btn btn-primary custsubmit" name="custsubmit" type="submit" id="custsubmit">Submit</button>
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
				<!--Image Content Row -->
					
						<div class="row gy-5">
							<div class="col-lg-12">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Image</div>
												<div class="row  align-items-center">
													<div class="card-body">

														<div id="image_preview"></div>
													<!--	<img src="img/imgprev.png" alt="Preview Image" class="img-fluid imgPlaceholder" id="imgPlaceholder"> -->
														<div class="row gy-5 align-items-center"></div></br></br>
														<input type="file"  class="form-control-user chooseFile" accept="image/*" name='inputfile' id='inputfile' multiple>
														
														
														<script type="text/javascript">
															$(document).ready(function(){

															$("#inputfile").change(function(){

															  $('#image_preview').html("");

															  var total_file=document.getElementById("inputfile").files.length;

																for(var i=0;i<total_file;i++)
																{
																	$('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'></br> </br></br> </br>");
																}


															});

														});
																													</script>
														
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>
					
					
					<!-- Image and Material and MFG Process Row -->
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
																
																	<select class="form-control form-select productdropdown" name="product" aria-label="Default select example">
																	   <option selected value="none">Select Product</option>
																		
																	</select>
																</div>
															
																<div class="row gy-5">
																</div>
																
																<div class="col-auto productdata hidden" id="productdata">
													
															
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
																			<form class="user prodadddata" name="prodadddata"  id="prodadddata">
																			<div class="col-sm-6">
																				<p>Product Name:</p>
																			</div>
																			<div class="col-sm-6">
																					<input type="text" class="form-control prodnameval" name="prodnameval" required  placeholder="Enter Product name" aria-label="Recipient's username" aria-describedby="basic-addon2">
																			</div>
																		<!--	<div class="col-sm-6">
																				<p>Material:</p>
																			</div>
																			<div class="col-sm-6">
																					<input type="text" class="form-control" placeholder="Enter Material name" aria-label="Recipient's username" aria-describedby="basic-addon2">
																			</div> -->
																			
																			<div class="col-sm-6">
																				<p>Product Size:</p>
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
																		<button class="btn btn-primary prodsubmit" name="prodsubmit" id="prodsubmit" type="submit" >Submit</button>
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
							
							<div class="col-lg-4">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Manufacturing Process</div>
												<div class="row  align-items-center">
													<div class="card-body">
														
														<div class="row gy-5"></div>
														
														<div class="form-check">
														  <input class="form-check-input" type="checkbox" value="extrusion" name="chk[]" id="extrusion">
														  <label class="form-check-label" for="flexCheckDefault">
															Extrusion
														  </label>
														</div>
														
														<div class="form-check">
														  <input class="form-check-input" type="checkbox" value="printing" name="chk[]" id="printing">
														  <label class="form-check-label" for="flexCheckDefault">
															Printing
														  </label>
														</div>
														
														
														<div class="form-check">
														  <input class="form-check-input" type="checkbox" value="1stlamination" name="chk[]" id="1stlamination">
														  <label class="form-check-label" for="flexCheckDefault">
															1st Lamination
														  </label>
														</div>
														
														
														<div class="form-check">
														  <input class="form-check-input" type="checkbox" value="2ndlamination" name="chk[]" id="2ndlamination">
														  <label class="form-check-label" for="flexCheckDefault">
															2nd Lamination
														  </label>
														</div>
														
														<div class="form-check">
														  <input class="form-check-input" type="checkbox" value="curing" name="chk[]" id="curing">
														  <label class="form-check-label" for="flexCheckDefault">
															Curing
														  </label>
														</div>
														
														<div class="form-check">
														  <input class="form-check-input" type="checkbox" value="slitting" name="chk[]" id="slitting">
														  <label class="form-check-label" for="flexCheckDefault">
															Slitting
														  </label>
														</div>
														
														<div class="form-check">
														  <input class="form-check-input" type="checkbox" value="cuttingandbagging" name="chk[]" id="cuttingandbagging">
														  <label class="form-check-label" for="flexCheckDefault">
															Cutting and Bagging
														  </label>
														</div>
														
													
													</div>
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
						<button type="button" class="btn btn-success btn-lg btn-block submitsalesinquiry" id="submitsalesinquiry">Submit</button>
						</div>
						<div class="col-lg-3">
						 
						</div>
						
					</div>
					
					</br></br>
					<div class="row gy-5 align-items-center">
					</div>
					
                <!-- /.container-fluid -->
					
            </div>
            <!-- End of Main Content -->

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



    
   
    
  </body>
</html>