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



if(empty($_GET['id']))
{


}
else
{
	$id = $_GET['id'];

}

if(empty( $_GET['action']))
{


}
else
{
	$action =  $_GET['action'];

}

//$id = isset($idid)?$id:'';
//$action = isset($action)?$action:'';






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


  if($type != "Admin")
  {
  ?>
  <script type="text/javascript">
    window.location = "index.php";
  </script>

  <?php
  }
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




				<!-- Product and Image Content Row -->

					<form action="#" method="post">
					<div class="row gy-5">
							<div class="col-lg-12">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">View User Account</div>
												<div class="row  align-items-center">
													<div class="col-12 customerdata" id="quotationdata">
															 <div class="form-group col-12" >


                                 <?php $resultlist = getuserlistdata($id);

                                       while($row=mysqli_fetch_array($resultlist,MYSQLI_ASSOC)) { ?>

															<div class="form-group col-12 row" >
																	<div class="col-sm-2 row">
																		<p>Username:</p>
																	</div>

																	<div class="col-sm-3 row">
																<h5>	<?php echo $row['USERNAME']; ?></h5>
																	</div>


															</div>


															<div class="form-group col-12 row" >
																<div class="col-sm-2 row" >
																		<p>First Name:</p>
																</div>

                                <div class="col-sm-3 row">
                                  <h5>	<?php echo $row['FIRST_NAME']; ?></h5>

                                </div>


                                <div class="col-sm-2 row" >
                                    <p>Last Name:</p>
                                </div>

                                <div class="col-sm-3 row" >

                                    <h5>	<?php echo $row['LAST_NAME']; ?></h5>

                                </div>



															</div>
                              <div class="form-group col-12 row" >

                                <div class="col-sm-2 row" >
                                    <p>Gender:</p>
                                </div>

                                <div class="col-sm-3 row" >

                                    <h5>	<?php echo $row['GENDER']; ?></h5>

                                </div>

                              </div>




														<div class="row gy-5"></div>



															<!--  BAG FORM  -->

																<!-- END OF ROLL FORM -->
															</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>




              <div class="col-lg-12">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-sm font-weight-bold text-info text-uppercase mb-4"> User Type</div>
                        <div class="row  align-items-center">
                          <div class="col-12 " id="">



                                 <div class="form-group col-12 row" >
                                   <div class="col-sm-2 row" >
                                       <p>Department:</p>
                                   </div>

                                   <div class="col-sm-3 row">
                                       <h5>	<?php echo $row['DEPARTMENT']; ?></h5>
                                   </div>


                                   <div class="col-sm-2 row" >
                                       <p>User Type:</p>
                                   </div>

                                   <div class="col-sm-3 row" >

                                    <h5>	<?php echo $row['USER_TYPE']; ?></h5>

                                   </div>

                                 </div>





                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
           </div>


           <div class="col-lg-12">
             <div class="card border-left-info shadow h-100 py-2">
               <div class="card-body">
                 <div class="row no-gutters align-items-center">
                   <div class="col mr-2">
                     <div class="text-sm font-weight-bold text-info text-uppercase mb-4"> User Access</div>
                     <div class="row  align-items-center">
                       <div class="col-12 " id="">


                            <?php
                              $str_arr = explode (",", $row['ACCESS_TYPE']);
                             ?>
                              <div class="form-group col-12 row" >
                              <?php   if (in_array("Sales Inquiry", $str_arr)){ ?>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="Sales Inquiry" disabled  id="salesinquiry" checked="checked" readonly="true">
                                  <label class="form-check-label" for="flexCheckDefault">
                                  Sales Inquiry
                                  </label>
                                </div>
                              <?php }else{ ?>


                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="Sales Inquiry" disabled  id="salesinquiry">
                                  <label class="form-check-label" for="flexCheckDefault">
                                  Sales Inquiry
                                  </label>
                                </div>


                                  <?php }  if (in_array("Quotation", $str_arr)) {?>


                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="Quotation" disabled checked="checked" name="useraccess[]" id="quotation">
                                  <label class="form-check-label" for="flexCheckDefault">
                                  Quotation
                                  </label>
                                </div>

                                  <?php }else{ ?>

                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" disabled value="Quotation" id="quotation">
                                      <label class="form-check-label" for="flexCheckDefault">
                                      Quotation
                                      </label>
                                    </div>

                                  <?php }  if (in_array("Sales Order", $str_arr)) {?>




                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="Sales Order" disabled checked="checked" id="salesorder">
                                  <label class="form-check-label" for="flexCheckDefault">
                                  Sales Order
                                  </label>
                                </div>

                                  <?php }else{ ?>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" disabled value="Sales Order"  id="salesorder">
                                      <label class="form-check-label" for="flexCheckDefault">
                                      Sales Order
                                      </label>
                                    </div>


                                <?php }  if (in_array("Job Order", $str_arr)) {?>


                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="Job Order" disabled checked="checked" id="joborder">
                                  <label class="form-check-label" for="flexCheckDefault">
                                  Job Order
                                  </label>
                                </div>

                                <?php }else{ ?>

                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Job Order" disabled id="joborder">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Job Order
                                    </label>
                                  </div>
                                    <?php } ?>
                              </div>


                            <?php } ?>


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
