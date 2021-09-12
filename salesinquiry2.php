<?php 

include_once('includes/headerincludes.php');
include_once("includes/dbconfig.php");
include_once("functions/allfunctions.php");

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
                        <a class="collapse-item" href="index.php">Sales Inquiry History</a>
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
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Sales Associate</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
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
                        </li>

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
															<a href="#" data-toggle="modal" data-target="#createcustomerModal" class="d-none createcust d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
															class="fas fa-address-card fa-sm text-white-50"></i> Create Customer</a>
														</div>
															<div class="col-auto">
																<select class="form-control form-select customer" name="customer" aria-label="Default select example">
																   <option selected value="none">Select customer</option> 
																    <?php 
               
																	echo getDropdown('customer',"status = '1'",'customerID',"customerName");
             
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
																		<form class="user">	
																		<div class="form-group row ">
																		
																			
																			<div class="col-sm-6">
																				<p>Customer Company Name:</p> 
																			</div>
																			<div class="col-sm-6">
																					<input type="text" class="form-control" placeholder="Enter Company Name " aria-label="Recipient's username" aria-describedby="basic-addon2">
																			</div>
																			<div class="col-sm-6">
																				<p>Customer Representative:</p> 
																			</div>
																			<div class="col-sm-6">
																					<input type="text" class="form-control" placeholder="Enter Representative " aria-label="Recipient's username" aria-describedby="basic-addon2">
																			</div>
																			
																			<div class="col-sm-6">
																				<p>Customer Email:</p> 
																			</div>
																			<div class="col-sm-6">
																					<input type="email" class="form-control" placeholder="Enter Email" aria-label="Recipient's username" aria-describedby="basic-addon2">
																			</div>
																			
																			<div class="col-sm-6">
																				<p>Customer Contact:</p> 
																			</div>
																			<div class="col-sm-6">
																					<input type="text" class="form-control" placeholder="Enter Contact Number" aria-label="Recipient's username" aria-describedby="basic-addon2">
																			</div>
																		</div>
															
																		<div class="form-group row ">
																				<div class="col-sm-6">
																					<p>Customer Address:</p> 
																				</div>
																				<div class="col-sm-12">
																					<input type="text" class="form-control" placeholder="Enter Address" aria-label="Recipient's username" aria-describedby="basic-addon2">
																				</div>
																		</div>
																	</form>
																																				
																		</div>
																		<div class="modal-footer">
																			<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
																			<a class="btn btn-primary" href="#">Submit</a>
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

                       


           
					</div>
				<!-- Product and Image Content Row -->
					<div class="row gy-5">
							<div class="col-lg-12">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Product</div>
												<div class="row  align-items-center">
													<div class="card-body">
													 <form class="user">													
														<div class="form-group row">
														<div class="col-auto">
															<a href="#" data-toggle="modal" data-target="#createprodModal" class="d-none createprod d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-box-open fa-sm text-white-50"></i> Create Product</a>
														</div>
																<div class="col-sm-8">
																
																	<select class="form-control form-select product " name="product" aria-label="Default select example">
																	   <option selected value="none">Select Product</option> 
																		
																	</select>
																</div>
																<div class="row gy-5">
																</div>
																
																<div class="col-auto productdata hidden" id="productdata">		
													
															
																</div>
																
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
																		<form class="user">	
																		<div class="form-group row ">
																		
																			<div class="col-sm-6">
																				<p>Product Name:</p> 
																			</div>
																			<div class="col-sm-6">
																					<input type="text" required class="form-control" placeholder="Enter Product name" aria-label="Recipient's username" aria-describedby="basic-addon2">
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
																					<input type="email" class="form-control" placeholder="Enter Product size" aria-label="Recipient's username" aria-describedby="basic-addon2">
																			</div>
																			
																			<div class="col-sm-6">
																				<p>Product Material Type:</p> 
																			</div>
																			<div class="col-sm-6">
																					<input type="text" class="form-control" placeholder="Enter Material type" aria-label="Recipient's username" aria-describedby="basic-addon2">
																			</div>
																		</div>
														
																	</form>
																																				
																		</div>
																		<div class="modal-footer">
																			<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
																			<a class="btn btn-primary" href="#">Submit</a>
																		</div>
																	</div>
																</div>
															</div>
														
														
															
														</div>
																
															
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
					
					<div class="row gy-5">
							<div class="col-lg-12">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Image</div>
												<div class="row  align-items-center">
													<div class="card-body">													
														<img src="img/Slide1.jpg" alt="Company Logo" class="img-fluid">
														<div class="row gy-5 align-items-center"></br></div>
														<input type="file" class="form-control-user imagefile" id="customFile" />
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>
					
					
					<!-- Material and MFG Process Row -->
					<div class="row gy-5">
							<div class="col-lg-6">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Material</div>
												<div class="row  align-items-center">
													<div class="card-body">
													
													<div class="form-group row ">
													
															<div class="form-group col-sm-5">
															  <select multiple="multiple"  class="form-control lstBox1" size="15">
																<?php 
               
																	echo getDropdown('material',"status = 'Active'",'materialID',"materialName");
             
																	?>
															  </select>
															</div>
															
															
															<div class="text-center col-lg-2">															  
															   
															<div class="row gy-5">
															<a  class="d-none createprod d-sm-inline-block btn btn-sm btn-primary shadow-sm btnAllRight">
															<i class="fas fa-angle-double-right fa-sm text-white-50"></i> </a><br /><br />
															</div>
															
															<div class="row gy-5">
															<a  class="d-none createprod d-sm-inline-block btn btn-sm btn-primary shadow-sm btnRight">
															<i class="fas fa-angle-right fa-sm text-white-50"></i> </a><br />
															</div>
															
															<div class="row gy-5">
															<a  class="d-none createprod d-sm-inline-block btn btn-sm btn-primary shadow-sm btnAllLeft">
															<i class="fas fa-angle-double-left fa-sm text-white-50"></i> </a><br />
															</div> 
															
															<div class="row gy-5">
															<a  class="d-none createprod d-sm-inline-block btn btn-sm btn-primary shadow-sm btnLeft">
															<i class="fas fa-angle-left fa-sm text-white-50"></i> </a><br />
															</div>
															
															</div>
															
															
															<div class="form-group col-sm-5">
															  <select multiple="multiple"  class="form-control lstBox2" size="15">
																
															  </select>
															</div>
															
														
													
													</div>
													
                             
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-lg-6">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Manufacturing Process</div>
												<div class="row  align-items-center">
													<div class="card-body">
														
														<div class="row gy-5"></div>
														
														<div class="input-group mb-3">
														  <div class="input-group-prepend">
															<div class="input-group-text">
															  <input type="checkbox" aria-label="Checkbox for following text input">
															</div>
														  </div>
														  <label type="text" class="form-control" aria-label="Text input with checkbox">Extrusion</label>
														  
														</div>
														
														<div class="input-group mb-3">
														  <div class="input-group-prepend">
															<div class="input-group-text">
															  <input type="checkbox" aria-label="Checkbox for following text input">
															</div>
														  </div>
														  <label type="text" class="form-control" aria-label="Text input with checkbox">Printing</label>
														  
														</div>
														
														<div class="input-group mb-3">
														  <div class="input-group-prepend">
															<div class="input-group-text">
															  <input type="checkbox" aria-label="Checkbox for following text input">
															</div>
														  </div>
														  <label type="text" class="form-control" aria-label="Text input with checkbox">1st Lamination</label>
														  
														</div>
														
														<div class="input-group mb-3">
														  <div class="input-group-prepend">
															<div class="input-group-text">
															  <input type="checkbox" aria-label="Checkbox for following text input">
															</div>
														  </div>
														  <label type="text" class="form-control" aria-label="Text input with checkbox">2nd Lamination</label>
														  
														</div>
														
														<div class="input-group mb-3">
														  <div class="input-group-prepend">
															<div class="input-group-text">
															  <input type="checkbox" aria-label="Checkbox for following text input">
															</div>
														  </div>
														  <label type="text" class="form-control" aria-label="Text input with checkbox">Curing</label>
														  
														</div>
														
														<div class="input-group mb-3">
														  <div class="input-group-prepend">
															<div class="input-group-text">
															  <input type="checkbox" aria-label="Checkbox for following text input">
															</div>
														  </div>
														  <label type="text" class="form-control" aria-label="Text input with checkbox">Slitting</label>
														  
														</div>
														
														<div class="input-group mb-3">
														  <div class="input-group-prepend">
															<div class="input-group-text">
															  <input type="checkbox" aria-label="Checkbox for following text input">
															</div>
														  </div>
														  <label type="text" class="form-control" aria-label="Text input with checkbox">Cutting and Bagging</label>
														  
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
						<button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>



    
   
    
  </body>
</html