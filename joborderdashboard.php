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
  $accesstype2 = $_SESSION['ACCESS_TYPE'];

}


$pieces4 = explode(",", $accesstype2);
$checker=0;
$ctr = count($pieces4);

for ($c=0;$c<$ctr;$c++)
{
	if($pieces4[$c]=="Job Order")
  {
    $checker=1;
  }
  else
  {
    $checker=0;
  }
}

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

if($checker == 0)
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


                    <!-- Content Row -->
                    <div class="row gy-5">



				<!--Image Content Row -->

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-uppercase mb-1">
                            Extrusion</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-industry fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                              Printing</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-industry fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                              1st Lamination</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-industry fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-uppercase mb-1">
                              2nd Lamination</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-industry fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <div class="row gy-5">



<!--Image Content Row -->

<div class="col-xl-3 col-md-6 mb-4">
<div class="card border-left-warning shadow h-100 py-2">
<div class="card-body">
    <div class="row no-gutters align-items-center">
        <div class="col mr-2">
            <div class="text-xs font-weight-bold  text-uppercase mb-1">
            Curing</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
        </div>
        <div class="col-auto">
            <i class="fas fa-industry fa-2x text-gray-300"></i>
        </div>
    </div>
</div>
</div>
</div>


<div class="col-xl-3 col-md-6 mb-4">
<div class="card border-left-warning shadow h-100 py-2">
<div class="card-body">
    <div class="row no-gutters align-items-center">
        <div class="col mr-2">
            <div class="text-xs font-weight-bold  text-uppercase mb-1">
              Slitting</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
        </div>
        <div class="col-auto">
            <i class="fas fa-industry fa-2x text-gray-300"></i>
        </div>
    </div>
</div>
</div>
</div>



<div class="col-xl-6 col-md-6 mb-4">
<div class="card border-left-warning shadow h-100 py-2">
<div class="card-body">
    <div class="row no-gutters align-items-center">
        <div class="col mr-2">
            <div class="text-xs font-weight-bold  text-uppercase mb-1">
              Cutting and Bagging</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>

        </div>
        <div class="col-auto">
            <i class="fas fa-industry fa-2x text-gray-300"></i>
        </div>
    </div>
</div>
</div>
</div>

</div>

                <!-- /.container-fluid -->
            <div class="row gy-5">

              <!-- DataTales Example -->
              <div class="card shadow mb-4">

                  <div class="card-header py-3">

                    <div class="row">
                      <div class="col sm-6">
                      <h6 class="m-0 font-weight-bold text-primary">Job Orders</h6>
                        </div>

                        <div border class="col sm-6">
                        </div>
                        <div border class="col sm-6">
                        </div>
                        <div border class="col sm-6">
                        </div>
                        <div border class="col sm-6">
                        </div>
                        <div border class="col sm-6">
                        </div>
                        <div border class="col sm-6">
                        </div>


                      <div border class="col sm-6">
                      <a href="#" data-toggle="modal" data-target="#AddJobOrderModal" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Job Order </a>
                        </div>
                    </div>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-bordered dataTable1" id="dataTable1" width="100%" cellspacing="0">
                              <thead>
                                  <tr>
                                      <th>Name</th>
                                      <th>Position</th>
                                      <th>Office</th>
                                      <th>Age</th>
                                      <th>Start date</th>
                                      <th>Salary</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>Donna Snider</td>
                                      <td>Customer Support</td>
                                      <td>New York</td>
                                      <td>27</td>
                                      <td>2011/01/25</td>
                                      <td>$112,000</td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>


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
</div>
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




    <div class="modal fade" id="AddJobOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
 					 <input class="qidr" type="hidden" id="qidr" name="qidr" value="<?php echo $id; ?>">
                     <button type="button" class="btn btn-primary rejectsalesorder" href="#" >Reject</button>

                 </div>
             </div>
         </div>
     </div>


<script>
$(document).ready(function() {
     $('#dataTable1').DataTable();
} );
</script>


  </body>
</html>
