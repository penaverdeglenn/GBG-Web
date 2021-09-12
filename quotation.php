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
                                            <div class="text-sm font-weight-bold text-info text-uppercase mb-4">Generate Quotation</div>
                                            <div class="row  align-items-center">
                                                <div class="col-auto">												
                                                    <form class="user">													
														<div class="form-group row">
														<div class="col-auto">
														<!--	<a href="#" data-toggle="modal" data-target="#createcustomerModal" class="d-none createcust d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
															class="fas fa-address-card fa-sm text-white-50"></i> Create Customer</a> -->
															Select Sales Inquiry
														</div>
														
															<div class="col-auto">
																<select class="form-control form-select salesinquiry" name="salesinquiry" id = "salesinquiry" aria-label="Default select example" onchange="testTry()">
																   <option selected value="none">Select sales inquiry</option> 
																    <?php 
               
																	echo getDropdown('tbl_sales_inquiry',"salesinquiry_status = 'Approved'",'sales_inquiry_id',"sales_inquiry_id");
																	
																	?>
																</select>
																
																
															</div>
														
														</div>	
													</form>		
																<div class="row gy-5"></div>													
														
														
														
													
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       


           
					</div>
				<!-- Product and Image Content Row -->
					<div class="row gy-5">
							<div class="col-lg-12">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Sales Inquiry Details</div>
												<div class="row  align-items-center">
													<div class="card-body">
												
														<div class="row">
																
																<div class="container salesinquirydata hidden" id="salesinquirydata">		
													
															
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
					<form action="insert_quotation.php" method="post">
					<div class="row gy-5">
							<div class="col-lg-12">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Quotation Form</div>
												<div class="row  align-items-center">
													<div class="col-auto customerdata" id="quotationdata">
													
															
															<div class="form-group row">
															<div class="col-sm-3">
																		<p>Product Price:</p>
																	</div>
																	<div class="col-sm-3">
																		<p class="h5 custrep">
																			<input type="hidden"  class="salesinquiryID" name="salesinquiryID" id ="salesinquiryID" value="">
																			<input type="text" class="form-control prodsizeval" name="prodpriceval" required  placeholder="Enter product price" aria-label="Product price" aria-describedby="basic-addon2">
																			</p>
																	</div>
																	
																	
																	<div class="col-sm-2">
																		<p>Product Color:</p>
																	</div>
																	<div class="col-sm-4">
																		<p class="h5 custemail">
																		<input type="text" class="form-control prodsizeval" name="prodcolorval" required  placeholder="Enter Product Color" aria-label="Product color" aria-describedby="basic-addon2">
																		</p>
																	</div>
																	
																	
																	<div class="col-sm-3">
																		<p>Product Construction:</p>
																	</div>
																	<div class="col-sm-3">
																		<p class="h5 custcontact">
																		<input type="text" class="form-control prodsizeval" name="prodconstruction" required  placeholder="Enter product construction" aria-label="Product Construction" aria-describedby="basic-addon2">
																		</p>
																	</div>
														<!--	</div>
															
															<div class="form-group row"> -->
																	
																	
																	
																	
															
															</div>
															
															<div class="form-group row ">
																	<div class="col-sm-6">
																		<p>Production Tolerance:</p>
																	</div>
																	<div class="col-sm-8">
																		<p class="h5 custrep">
																		<textarea class="form-control prodsizeval" name="prodtolerance" required  placeholder="Enter production tolerance" aria-label="Product Construction" aria-describedby="basic-addon2"></textarea>
																		</p>
																	</div>
																	<div class="col-sm-6">
																		<p>Delivery Terms:</p>
																	</div>
																	<div class="col-sm-8">
																		<textarea class="form-control custaddval" name="deliveryterms" required="" placeholder="Enter delivery terms" aria-label="Delivery Terms" aria-describedby="basic-addon2"></textarea>
																	</div>
																	<div class="col-sm-6">
																		<p>Delivery Schedule:</p>
																	</div>
																	<div class="col-sm-8">
																		<textarea class="form-control custaddval" name="deliveryschedule" required="" placeholder="Enter delivery schedule" aria-label="Delivery Schedule" aria-describedby="basic-addon2"></textarea>
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
					
					
					
					
					<div class="row gy-5 align-items-center">
					
						<div class="col-lg-3">
						  
						</div>
						<div class="col-lg-6">
						<button type="submit" class="btn btn-success btn-lg btn-block submitquotation" >Submit</button>
						
						</div>
						</form>
					
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

	<script>
		function testTry()
		{
			document.getElementById("salesinquiryData").value = document.getElementById("salesinquiry").value;
		
		}
		
	</script>
	

    
   
    
  </body>
</html