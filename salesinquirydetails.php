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

if(empty($_SESSION["MEMBER_ID"]) && empty($_SESSION["TYPE"]) && empty($_SESSION["DEPT"]) && empty($_SESSION["FIRST_NAME"]))
{
    $itemarray = array();
}
else
{
  $memberid = $_SESSION['MEMBER_ID'];
  $type = $_SESSION['TYPE'];
  $firstname = $_SESSION['FIRST_NAME'];
  $dept = $_SESSION['DEPT'];

}


$sales_inquiry_id = $_GET['sid'];
$custid=$_GET['custid'];
$action = $_GET['action'];
$_SESSION['sid']=$sales_inquiry_id;


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



            <!-- Nav Item - Pages Collapse Menu -->
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
                      <?php echo logindetails(); ?>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- customer data -->
            <div class="row gy-5">
							<div class="col-lg-12">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">


												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Sales Inquiry Details


												</div>

												<?php
												$sid = $_GET['sid'];
												$status = getRecord('salesinquiry_status','tbl_sales_inquiry','sales_inquiry_id ='.$sid);
												$pid = getRecord('product_id','tbl_sales_inquiry','sales_inquiry_id ='.$sid);
												if($status == "Rejected")
												{
													echo "<h5 class='text-lg font-weight-bold text-danger text-uppercase mb-4'>".$status."</h5>";
												}
												elseif($status == "Approved")
												{
													echo "<h5 class='text-lg font-weight-bold text-success text-uppercase mb-4'>".$status."</h5>";

												}
												else
												{
												}

												?>

											<div class="row  align-items-center">

											<div class="col sm-8">
											<?php if($dept=="Purchasing" AND $action=="approve" AND $type =="Sales Associate")
												{?>


												<a href="#" data-toggle="modal" data-target="#assignModal" class="d-none d-sm-inline-block btn btn-lg btn-info shadow-lg"><i class="fas fa-people-arrows fa-sm text-white-50"></i> Assign </a>

											<?php } else if($dept=="Purchasing" AND $action=="approve" AND ($type =="Approver 1" OR $type =="Approver 2" )) { ?>

												<a href="#" data-toggle="modal" data-target="#assignModal" class="d-none d-sm-inline-block btn btn-lg btn-info shadow-lg"><i class="fas fa-people-arrows fa-sm text-white-50"></i> Assign </a>

												<a href="#" data-toggle="modal" data-target="#approveModal" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-lg"><i class="fas fa-address-card fa-sm text-white-50"></i> Approve </a>

												<a href="#" data-toggle="modal" data-target="#rejectModal" class="d-none d-sm-inline-block btn btn-lg btn-danger shadow-lg"><i class="fas fa-address-card fa-sm text-white-50"></i> Reject </a>


											<?php }  ?>
												<a href="#" class="d-none d-sm-inline-block btn btn-lg btn-info shadow-lg" onclick="salesinquiryprint('<?php echo $custid; ?>','<?php echo $sales_inquiry_id; ?>','<?php echo $pid; ?>');"><i class="fas fa-print fa-sm text-white-50"></i></i> Print </a>

												<a href="javascript:history.back();" class="d-none d-sm-inline-block btn btn-lg btn-warning shadow-lg"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back </a>

											</div>
											<div class="col sm-2">

											</div>
											</div>

                        <div class="row  align-items-center">
													<div class="card-body" >
                          <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">

                                        <?php
                                             $cust_id = $_GET['custid'];
                                             $sales_id = $_GET['sid'];
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
                                                            <p class="h5 custrep"><b>' . $SI_customer_rep . '</b></p>
                                                          </div>


                                                          <div class="col-sm-2">
                                                            <p>Customer Email:</p>
                                                          </div>
                                                          <div class="col-sm-4">
                                                            <p class="h5 custemail"><b>'. $SI_customer_email .'</b></p>
                                                          </div>


                                                          <div class="col-sm-3">
                                                            <p>Customer Contact:</p>
                                                          </div>
                                                          <div class="col-sm-3">
                                                            <p class="h5 custcontact"><b>' . $SI_contact_num . '</b></p>
                                                          </div>
                                                    <!--	</div>

                                                      <div class="form-group row"> -->
                                                          <div class="col-sm-2">
                                                            <p>Customer Address:</p>
                                                          </div>
                                                          <div class="col-sm-4">
                                                            <p class="h5 custrep"><b>' . $SI_customer_address . '</b></p>
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
            <!-- product image -->
            <div class="row gy-5">
							<div class="col-lg-12">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Image</div>
												<div class="row  align-items-center">
													<div class="card-body">
                            <?php
                              $sales_id = $_GET['sid'];
                              $image_data = getRecord('product_image','tbl_sales_inquiry','sales_inquiry_id ='.$sales_id);
							  $commaList = explode(",", $image_data);
							  $ctr = count($commaList);

							  for ($c=1;$c<$ctr;$c++)
							 {



							  ?>
                              <div id="image_preview"><img src="/gbgv2/img/<?php echo $commaList[$c]; ?>"><br> <br><br> <br></div>
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
        <!-- product -->
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

																<div class="row gy-5">
																</div>

																<div class="col-auto productdata" id="productdata" wfd-invisible="true">


															<div class="form-group row proddata">

                              <?php
                                  $sales_id = $_GET['sid'];
                                  $SI_product_id  = getRecord('product_id','tbl_sales_inquiry','sales_inquiry_id ='.$sales_id);
                                  $SI_product_name  = getRecord('product_name','tbl_product','product_id ='.$SI_product_id);
                                  $SI_product_size  = getRecord('product_size','tbl_product','product_id ='.$SI_product_id);
                                  $SI_product_material_type  = getRecord('product_material_type','tbl_product','product_id ='.$SI_product_id);
                                  echo '<div class="col-sm-6">
                                        <p>Product Name:</p>
                                      </div>
                                      <div class="col-sm-6">
                                        <p class="h6 custemail"><b>'. $SI_product_name .'</b></p>
                                      </div>

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



									<!--						<div class="form-group row ">
																	<div class="col-sm-2">
																		<p>Customer Address:</p>
																	</div>
																	<div class="col-sm-6">
																		<p class="h5 custrep"><b></b></p>
																	</div>
															</div> --></div>


																<div class="col-auto productadd hidden" wfd-invisible="true">
															    <!-- Logout Modal-->
															<div class="modal fade" id="createprodModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wfd-invisible="true">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title" id="exampleModalLabel1">Create Product</h5>
																			<button class="close" type="button" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">×</span>
																			</button>
																		</div>
																		<div class="modal-body">


																		<div class="row" id="notif2" style="display:none;" wfd-invisible="true">
																				<div class="col-md-12">
																					<div class="alert alert-success" id="notitext2">
																					</div>
																				</div>
																			</div>
																		<div class="form-group row ">
																			<form class="user prodadddata" name="prodadddata" id="prodadddata">
																			<div class="col-sm-6">
																				<p>Product Name:</p>
																			</div>
																			<div class="col-sm-6">
																					<input type="text" class="form-control prodnameval" name="prodnameval" required="" placeholder="Enter Product name" aria-label="Recipient's username" aria-describedby="basic-addon2">
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
																					<input type="text" class="form-control prodsizeval" name="prodsizeval" required="" placeholder="Enter Product size" aria-label="Recipient's username" aria-describedby="basic-addon2">
																			</div>

																			<div class="col-sm-6">
																				<p>Product Material Type:</p>
																			</div>
																			<div class="col-sm-6">
																					<input type="text" class="form-control prodmattypeval" name="prodmattypeval" required="" placeholder="Enter Material type" aria-label="Recipient's username" aria-describedby="basic-addon2">
																			</div>
																		</form></div>



																		</div>
																	<div class="modal-footer">
																		<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
																		<button class="btn btn-primary prodsubmit" name="prodsubmit" id="prodsubmit" type="submit">Submit</button>
																	</div>

																	</div>
																</div>
															</div>



														</div>


														</div></form>

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
															 <option  value='1'>PET12 X 380MM</option><option  value='2'>OPP 25 X 380MM</option><option  value='3'>CPP 25 X 380MM</option><option  value='4'>VMPET 12 X 380MM</option><option  value='5'>LDPE 50 X 380MM</option><option  value='6'>NYLON 15 X 380MM</option><option  value='7'>FOIL 7 X 380MM</option><option  value='8'>PVC 40 X 380MM</option>															</select> -->





															<div class="row gy-5"></div>


													<!--	<button class="btn btn-primary test"  type="button" >Submit</button>			-->

														</div>
														<div class="form-group row txtResult1" id="txtResult1">

																															<table class="table table-bordered materialtable" id="materialtable" width="100%" cellspacing="0">
																		<thead>
																			<tr><th>ID</th>
																			<th>Material Name</th>

																		</tr></thead>
																	<tbody>
                                    <?php
                                     $SI_material_id = explode(",",getRecord('material_name','tbl_sales_inquiry','sales_inquiry_id ='.$sales_id));
                                     //echo $mfgprocessdata;
                                     $ctr = count($SI_material_id);


                                     for ($c=0;$c<$ctr;$c++)
                                     {
                                       $SI_material_name  = getRecord('material_name','tbl_material','material_id ='. $SI_material_id[$c]);
                                       echo '<tr>
                                             <td>'. $SI_material_id[$c] .'</td>
                                             <td>'. $SI_material_name .'</td>';

                                     }

                                      ?>
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
                                <input class="form-check-input" type="checkbox" value="extrusion" name="chk[]" id="extrusion" disabled="disabled" checked="checked">
                                <label class="form-check-label" for="flexCheckDefault">
                                Extrusion
                                </label>
                                </div>';
                              }
                              else
                              {
                                echo '<div class="form-check">
                                <input class="form-check-input" type="checkbox" value="extrusion" name="chk[]" disabled="disabled" id="extrusion" >
                                <label class="form-check-label" for="flexCheckDefault">
                                Extrusion
                                </label>
                                </div>';
                              }

                              if (in_array("printing", $str_arr))
                              {
                                echo '<div class="form-check">
                                <input class="form-check-input" type="checkbox" value="printing" name="chk[]" disabled="disabled" id="printing" checked="checked">
                                <label class="form-check-label" for="flexCheckDefault">
                                Printing
                                </label>
                              </div>';
                              }
                              else
                              {
                                echo '<div class="form-check">
                                <input class="form-check-input" type="checkbox" value="printing" name="chk[]" disabled="disabled" id="printing" >
                                <label class="form-check-label" for="flexCheckDefault">
                                Printing
                                </label>
                                </div>';
                              }
                              if (in_array("1stlamination", $str_arr))
                              {
                                echo '<div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1stlamination" name="chk[]" disabled="disabled" id="1stlamination" checked="checked">
                                <label class="form-check-label" for="flexCheckDefault">
                                1st Lamination
                                </label>
														    </div>';
                              }
                              else
                              {
                                echo "not found";
                              }
                              if (in_array("2ndlaminication", $str_arr))
                              {
                                echo '<div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="2ndlamination" name="chk[]" disabled="disabled" id="2ndlamination" checked="checked">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    2nd Lamination
                                    </label>
                                  </div>';
                              }
                              else
                              {
                                echo '<div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="2ndlamination" name="chk[]" disabled="disabled" id="2ndlamination">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    2nd Lamination
                                    </label>
                                  </div>';
                              }
                              if (in_array("curing", $str_arr))
                              {
                                echo '<div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="curing" name="chk[]" id="curing" disabled="disabled" checked="checked">
                                      <label class="form-check-label" for="flexCheckDefault">
                                      Curing
                                      </label>
                                    </div>';
                              }
                              else
                              {
                                echo '<div class="form-check">
                                <input class="form-check-input" type="checkbox" value="curing" name="chk[]" disabled="disabled" id="curing">
                                <label class="form-check-label" for="flexCheckDefault">
                                Curing
                                </label>
                              </div>';
                              }
                              if (in_array("slitting", $str_arr))
                              {
                                echo '<div class="form-check">
                                <input class="form-check-input" type="checkbox" value="slitting" name="chk[]" disabled="disabled" id="slitting" checked="checked">
                                <label class="form-check-label" for="flexCheckDefault">
                                Slitting
                                </label>
                              </div>';
                              }
                              else
                              {
                                echo '<div class="form-check">
                                <input class="form-check-input" type="checkbox" value="slitting" name="chk[]" disabled="disabled" id="slitting">
                                <label class="form-check-label" for="flexCheckDefault">
                                Slitting
                                </label>
                              </div>';
                              }
                              if (in_array("cuttingandbagging", $str_arr))
                              {
                                echo '<div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="cuttingandbagging" disabled="disabled" name="chk[]" id="cuttingandbagging" checked="checked">
                                      <label class="form-check-label" for="flexCheckDefault">
                                      Cutting and Bagging
                                      </label>
                                    </div>';
                              }
                              else
                              {
                                echo '<div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="cuttingandbagging" disabled="disabled" name="chk[]" id="cuttingandbagging">
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
					</div>
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

	<!-- Approve Modal-->
   <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Approve</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body"><?php if($type == "Approver 1" AND $dept =="Purchasing") {		?>	Select the next level approver. <?php } ?>
				Are you sure about this action? </div>
                <div class="modal-footer">
								<?php if($type == "Approver 1" AND $dept =="Purchasing") {		?>
					 <select class="form-control form-select assignpersonapprove" name="assignpersonapprove" aria-label="Default select example">
																   <option selected value="none">Select employee</option>

			<?php
			echo getDropdownuserassign('users',"USER_TYPE = 'Approver 2'",'id',"FIRST_NAME",$memberid);
			 ?>
					<option  value="Unassigned">Unassigned</option>
					</select>
			<?php } ?>
					<input class="sid" type="hidden" id="sid" name="sid" value="<?php echo $sales_inquiry_id; ?>">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary approvesalesinquiry" href="#" >Approve</button>

                </div>
            </div>
        </div>
    </div>


	<!-- Approve Modal-->
   <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reject</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure about this action?</div>
                <div class="modal-footer">
			<!-- 	<form class="user rejectdata" name="rejectdata"  id="rejectdata"> -->
					<textarea class="form-control reason" id="reason" rows="3"></textarea>
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					 <input class="sidr" type="hidden" id="sidr" name="sidr" value="<?php echo $sales_inquiry_id; ?>">
                    <button type="button" class="btn btn-primary rejectdatasalesinquiry" href="#" >Reject</button>

                </div>
            </div>
        </div>
    </div>


	<!-- Approve Modal-->
   <div class="modal fade" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assign</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Assign Sales Inquiry Approver</div>
                <div class="modal-footer">
				<?php
				?>
					<select class="form-control form-select assignperson" name="assignperson" aria-label="Default select example">
																   <option selected value="none">Select employee</option>

			<?php


																	if($type == "Sales Associate" AND $dept =="Purchasing")
																	{
																		echo getDropdownuserassign('users',"USER_TYPE = 'Approver 1'",'id',"FIRST_NAME",$memberid);



																	}
																	else if($type == "Approver 1" AND $dept =="Purchasing")
																	{
																		echo getDropdownuserassign('users',"USER_TYPE = 'Approver 1'",'id',"FIRST_NAME",$memberid);

																	}

																	else if($type == "Approver 2" AND $dept =="Purchasing")
																	{
																			echo getDropdownuserassign('users',"USER_TYPE = 'Approver 2'",'id',"FIRST_NAME",$memberid);
																	}


             ?>
					<option  value="Unassigned">Unassigned</option>
					</select>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary assignapproversi" href="#">Assign</a>
                </div>
            </div>
        </div>
    </div>



  </body>
</html>
