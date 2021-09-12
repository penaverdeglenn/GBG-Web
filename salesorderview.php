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

if(empty($_SESSION["MEMBER_ID"]) && empty($_SESSION["TYPE"]) && empty($_SESSION["DEPT"]) && empty($_SESSION["FIRST_NAME"]) && empty($_SESSION["ACCESS_TYPE"]))
{
    $itemarray = array();
  $memberid = "";
  $type = "";
  $firstname = "";
  $dept = "";
  $accesstype = "";
}
else
{
  $memberid = $_SESSION['MEMBER_ID'];
  $type = $_SESSION['TYPE'];
  $firstname = $_SESSION['FIRST_NAME'];
  $dept = $_SESSION['DEPT'];
  $accesstype = $_SESSION['ACCESS_TYPE'];

}
$pieces4 = explode(",", $accesstype);
					$checker=0;
					$ctr = count($accesstype);



																		for ($c=0;$c<=$ctr;$c++)
																		{


																			if($pieces4[$c]=="Quotation")
																			{

																				$checker=1;
																			}
																		}

if(empty($_GET['sid']))
{


}
else
{
	$sales_inquiry_id = $_GET['sid'];

}

if(empty($_GET['qid']))
{


}
else
{
	$qid = $_GET['qid'];

}

if(empty( $_GET['action']))
{


}
else
{
	$action =  $_GET['action'];

}


if(empty($_GET['id']))
{


}
else
{
	$id = $_GET['id'];

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
<script>
$(document).ready(function(){
    $('select[name="salesinquiry"]').val("<?php echo $sales_inquiry_id;?>").change();
    //alert("ready! "+ $('select[name="salesinquiry"]').val());
});
</script>
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
                        <div class="col-sm-12 hidden">
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
																<select class="form-control form-select salesinquiry" name="salesinquiry" aria-label="Default select example">
																   <option selected value="none">Select sales inquiry</option>
																    <?php

																	echo getDropdownselect('tbl_sales_inquiry',"salesinquiry_status = 'Approved' AND sales_inquiry_id ='".$sales_inquiry_id."'",'sales_inquiry_id',"sales_inquiry_id");

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
												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Sales Order Details</div>
												<div class="row  align-items-center">
													<div class="card-body">

														<div class="row">

														<div class="row  align-items-center">

											<div class="col sm-12">
											<?php if($dept=="Purchasing" AND $action=="assign" AND $type =="Sales Associate")
												{?>


												<a href="#" data-toggle="modal" data-target="#assignModal" class="d-none d-sm-inline-block btn btn-lg btn-info shadow-lg"><i class="fas fa-people-arrows fa-sm text-white-50"></i> Assign </a>

											<?php } else if($dept=="Purchasing" AND $action=="approve" AND $action=="approve" AND ($checker == 1 )) { ?>

												<a href="#" data-toggle="modal" data-target="#assignModal" class="d-none d-sm-inline-block btn btn-lg btn-info shadow-lg"><i class="fas fa-people-arrows fa-sm text-white-50"></i> Assign </a>

												<a href="#" data-toggle="modal" data-target="#approveModal" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-lg"><i class="fas fa-address-card fa-sm text-white-50"></i> Approve </a>

												<a href="#" data-toggle="modal" data-target="#rejectModal" class="d-none d-sm-inline-block btn btn-lg btn-danger shadow-lg"><i class="fas fa-address-card fa-sm text-white-50"></i> Reject </a>


											<?php }  ?>




											<?php $custid = $_GET['custid'];
												  $qid = $_GET['qid'];?>



										<a href="#" class="d-none d-sm-inline-block btn btn-lg btn-info shadow-lg" onclick="quotationprint('<?php echo $custid; ?>','<?php echo $sales_inquiry_id; ?>','<?php echo $qid; ?>');"><i class="fas fa-print fa-sm text-white-50"></i></i> Print </a>


												<a href="javascript:history.back();" class="d-none d-sm-inline-block btn btn-lg btn-warning shadow-lg"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back </a>
											</div>


											</div>
																<div class="row gy-5"></div>
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


					<div class="row gy-5">
							<div class="col-lg-12">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Sales Order Form</div>
												<div class="row  align-items-center">
													<div class="col-12 customerdata" id="quotationdata">
															 <div class="form-group col-12" >


														<?php $resultlist = getsalesorderdata($id);

																	while($row=mysqli_fetch_array($resultlist,MYSQLI_ASSOC)) { ?>


														<input type="hidden"  class="formtypeview" name="formtypeview" id ="formtypeview" value="<?php echo $row['FormType']; ?>">
															<div class="form-group col-12 row" >
																	<div class="col-sm-2 row">
																		<b>PO Number:</b>
																	</div>

																	<div class="col-sm-3 row">
																		<p class="h5"><?php echo $row['POnumber']; ?></p>

																	</div>

																	<div class="col-sm-2 row">
																		<b>PO Date:</b>
																	</div>

																	<div class="col-sm-3 row">
																		<p class="h5"><?php echo $row['POdate']; ?></p>

																	</div>

															</div>


															<div class="form-group col-12 row" >
																<div class="col-sm-2 row" >
																		<b>Form Type:</b>
																</div>

																<div class="col-sm-2 row" >
																	<p class="h5"><?php

																		if($row['FormType']== "bag_form")
																		{
																		 echo "Bag Form";
																		}
																		else if($row['FormType']== "roll_form")
																		{
																		 echo "Roll Form";
																		}
																		?></p>
																</div>

															</div>



														<div class="row gy-5"></div>



															<!--  BAG FORM  -->

															<?php if($row['FormType']== "bag_form") { ?>
															<div class="form-group row bagform1view">




																	<div class="col-sm-2">
																		<b>Substrate and Size:</b>
																	</div>
																	<div class="col-sm-4">
																		<p class="h5">
																		<?php echo $row['bagsubstrate']; ?>
																		</p>
																	</div>


																	<div class="col-sm-2">
																		<b>Quantity</b>
																	</div>
																	<div class="col-sm-4">
																		<p class="h5">
																		<?php echo $row['bagqty']; ?>
																		</p>
																	</div>
																	<div class="col-sm-2">
																		<b>Bag Width</b>
																	</div>
																	<div class="col-sm-4">
																		<p class="h5">
																		<?php echo $row['bagwidth']; ?>
																		</p>
																	</div>

																	<div class="col-sm-2">
																		<b>Bag Length</b>
																	</div>
																	<div class="col-sm-4">
																		<p class="h5">
																		<?php echo $row['baglength']; ?>
																		</p>
																	</div>
																	<div class="col-sm-2">
																		<b>Bag Gusset</b>
																	</div>
																	<div class="col-sm-4">
																		<p class="h5">
																		<?php echo $row['baggusset']; ?>
																		</p>
																	</div>
																	<div class="col-sm-2">
																		<b>Seal Portion</b>
																	</div>
																	<div class="col-sm-4">
																		<p class="h5">
																		<?php echo $row['bagsealportion']; ?>
																		</p>
																	</div>
																	<div class="col-sm-2">
																		<b>Pcs per Bundle</b>
																	</div>
																	<div class="col-sm-4">
																		<p class="h5">
																		<?php echo $row['bagpcsperbundle']; ?>
																		</p>
																	</div>

															</div>

															<div class="form-group row bagform2view">
																	<div class="col-sm-6">
																		<b>Others</b>
																	</div>
																	<div class="col-sm-8">
																		<p class="h5">
																		<?php echo $row['bagothers']; ?>
																		</p>
																	</div>
																	<div class="col-sm-6">
																		<b>Remarks</b>
																	</div>
																	<div class="col-sm-8">
																		<p class="h5">
																		<?php echo $row['bagremarks']; ?>
																		</p>
																	</div>
																	<div class="col-sm-6">
																		<b>Special Instruction</b>
																	</div>
																	<div class="col-sm-8">
																		<p class="h5">
																		<?php echo $row['bagspecialinstructions']; ?>
																		</p>
																	</div>

															</div>

													<!-- END OF BAG FORM -->


															<?php } else if($row['FormType']== "roll_form") { ?>
													<!-- ROLL FORM -->
															<div class="form-group row rollform1" >
																<div class="col-sm-2">
																		<b>Substrate and Size:</b>
																	</div>
																	<div class="col-sm-4">
																		<p class="h5">
																		<?php echo $row['rollsubstrate']; ?>
																		</p>
																	</div>


																	<div class="col-sm-2">
																		<b>Quantity / Roll</b>
																	</div>
																	<div class="col-sm-4">
																		<p class="h5">
																		<?php echo $row['rollqty']; ?>
																		</p>
																	</div>
																	<div class="col-sm-2">
																		<b>No. of Outs</b>
																	</div>
																	<div class="col-sm-4">
																		<p class="h5">
																		<?php echo $row['rollnoofouts']; ?>
																		</p>
																	</div>

																	<div class="col-sm-2">
																		<b>KGS</b>
																	</div>
																	<div class="col-sm-4">
																		<p class="h5">
																		<?php echo $row['rollkgs']; ?>
																		</p>
																	</div>
																	<div class="col-sm-2">
																		<b>Slitting Width</b>
																	</div>
																	<div class="col-sm-4">
																		<p class="h5">
																		<?php echo $row['rollslittingwidth']; ?>
																		</p>
																	</div>
																	<div class="col-sm-2">
																		<b>Meters</b>
																	</div>
																	<div class="col-sm-4">
																		<p class="h5">
																		<?php echo $row['rollmeters']; ?>
																		</p>
																	</div>
																	<div class="col-sm-2">
																		<b>Repeat Length</b>
																	</div>
																	<div class="col-sm-4">
																		<p class="h5">
																		<?php echo $row['rollrepeatlength']; ?>
																		</p>
																	</div>
																	<div class="col-sm-2">
																		<b>PCS</b>
																	</div>
																	<div class="col-sm-4">
																		<p class="h5">
																		<?php echo $row['rollpcs']; ?>
																		</p>
																	</div>
																</div>
																<div class="form-group row rollform2 hidden">
																	<div class="col-sm-6">
																		<b>Winding Direction</b>
																	</div>
																	<div class="col-sm-8">
																		<p class="h5">
																		<?php echo $row['rollwindingdirection']; ?>
																		</p>
																	</div>
																	<div class="col-sm-6">
																		<b>Max No.of Splices</b>
																	</div>
																	<div class="col-sm-8">
																		<p class="h5">
																		<?php echo $row['rollnoofsplice']; ?>
																		</p>
																	</div>
																	<div class="col-sm-6">
																		<b>Tape to use</b>
																	</div>
																	<div class="col-sm-8">
																		<p class="h5">
																		<?php echo $row['rolltapetouse']; ?>
																		</p>
																	</div>
																	<div class="col-sm-6">
																		<b>Remarks</b>
																	</div>
																	<div class="col-sm-8">
																		<p class="h5">
																		<?php echo $row['rollremarks']; ?>
																		</p>
																	</div>
																	<div class="col-sm-6">
																		<b>Special Instruction</b>
																	</div>
																	<div class="col-sm-8">
																		<p class="h5">
																		<?php echo $row['rollspecialinstructions']; ?>
																		</p>
																	</div>

																</div>
																<?php } ?>
																<!-- END OF ROLL FORM -->
															</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>
					</div>
																	<?php } ?>

					</div>




					<div class="row gy-5 align-items-center">

						<div class="col-lg-3">

						</div>
						<!-- <div class="col-lg-6">
						<button type="button" class="btn btn-success btn-lg btn-block submitquotation">Submit</button>
						</div> -->
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


	<!-- Assign Modal-->
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
                <div class="modal-body">Assign Quotation Approver</div>
                <div class="modal-footer">
				<?php
				?>
					<select class="form-control form-select assignperson" name="assignperson" aria-label="Default select example">
																   <option selected value="none">Select employee</option>

			<?php
																	echo getDropdownuserassign('users',"USER_TYPE = 'Approver 2' AND ACCESS_TYPE LIKE '%Quotation%'",'id',"FIRST_NAME",$memberid);



             ?>
					<option  value="Unassigned">Unassigned</option>
					</select>
					<input class="qid" type="hidden" id="qid" name="qid" value="<?php echo $qid; ?>">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

					<button class="btn btn-primary quotassign" href="#" >Assign</button>
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
                <div class="modal-body">
				Are you sure about this action? </div>
                <div class="modal-footer">
					<input class="qidas" type="hidden" id="qidas" name="qidas" value="<?php echo $qid; ?>">
					<input class="assignperson" type="hidden" id="assignperson" name="assignperson" value="<?php echo $memberid; ?>">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary approvequotation" href="#" >Approve</button>

                </div>
            </div>
        </div>
    </div>


	<!-- Reject Modal-->
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
					 <input class="qidr" type="hidden" id="qidr" name="qidr" value="<?php echo $qid; ?>">
                    <button type="button" class="btn btn-primary rejectdataquotation" href="#" >Reject</button>

                </div>
            </div>
        </div>
    </div>
  </body>
</html
