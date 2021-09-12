<?php session_start();
	
include_once('includes/headerincludes.php');
include_once("includes/dbconfig.php");
include_once("functions/allfunctions.php");


if(empty($_SESSION["MEMBER_ID"]) && empty($_SESSION["TYPE"]))
{
    $itemarray = array();
}
else
{
  $memberid = $_SESSION['MEMBER_ID'];
  $type = $_SESSION['TYPE'];
}

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
<html>
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

            <!-- Divider -->
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
				 <?php $taskcount=gettaskcount($memberid,$type);

				if($taskcount>0)
				{
				 ?>
				     <!-- Earnings (Monthly) Card Example -->
                          <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-10 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Alert</div>
                                             <div class="col h5 mb-2 font-weight-bold text-gray-800">
											<a href="tasklist.php">   There are <?php  echo $taskcount; ?> that needs action. </a>
											</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

				<?php } ?>
                    
	<!--						<div class="alert alert-warning" role="alert">
							<div class="col-sm-4">
								<i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>	        
								
								
								<a href="tasklist.php">   There are <?php $taskcount=gettaskcount($memberid); echo $taskcount; ?> that needs action. </a>
							</div>
							</div> -->
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>
					
					

                    <!-- Content Row -->
                    <div class="row col-lg-8">
					<div class="row gy-5"> </div>
					<div class="row gy-5"> </div>
					<div class="row gy-5"> </div>
					<div class="row gy-5"> </div>
					<div class="row gy-5"> </div>
					<div class="row gy-5"> </div>
					<div class="row gy-5"> </div>
					<div class="row gy-5"> </div>
					<div class="row gy-5"> </div>
					<div class="row gy-5"> </div>
					<div class="row gy-5"> </div>
					<div class="row gy-5"> </div>
					<div class="row gy-5"> </div>
					<div class="row gy-5"> </div>
					
					
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
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