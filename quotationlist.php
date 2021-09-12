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
																			
																			
																			if($pieces4[$c]==" Quotation" OR $pieces4[$c]=="Quotation")
																			{
																				
																				$checker=1;
																			}
																			else
																			{
																				$checker=0;
																			}
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
					
						<div class="row gy-5">
							<div class="col-lg-12">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Quotation History</div>
												<div class="row  align-items-center">
													<div class="card-body">

														<div class="form-group row txtResult1" id="txtResult1">
															
																															<table class="table table-bordered materialtable" id="materialtable" width="100%" cellspacing="0">
																		<thead>
																			<th>Date Created</th>
																			<th>Sales Inquiry ID</th>
																			<th>Customer Name</th>
																			<th>Product  Name</th>
																			<th>Status</th>
																			<th>Assigned To</th>
																			<th>Actions</th>
																		</thead>
																	<tbody>
																	<?php
																	//$salesinquiryrow =  getTblNumRows('tbl_sales_inquiry',"salesinquiry_status = 'Added'");
																
																	//$salesinquirydata =  getRecord('product_id','tbl_sales_inquiry',"salesinquiry_status = 'Added'");
																	
																	$resultlist = getquotation();
																	//echo $memberid;
																	while($row=mysqli_fetch_array($resultlist,MYSQLI_ASSOC)) {
																		
																		
																		
																		$salesinquirycustomer = getRecord('customer_id','tbl_sales_inquiry','sales_inquiry_id ='.$row['sales_inquiry_id_for_quote'].'');
																		$salesinquiryproduct = getRecord('product_id','tbl_sales_inquiry','sales_inquiry_id ='.$row['sales_inquiry_id_for_quote'].'');
																		
																		$salesinquirydatacustomer = getRecord('customer_company_name','tbl_customer','customer_id ='.$salesinquirycustomer.'');
																		$salesinquirydataproduct = getRecord('product_name','tbl_product','product_id ='.$salesinquiryproduct.'');
																		$status = $row['quotation_status'];
																		$quotation_id = $row['quotation_id'];
																		//$firstapprover = $row['approver'];
																		//$secondapprover = $row['secondapprover'];
																		
																		
																		
																				echo '<tr>';
																				echo '<td>'. $row['quotation_date_created'] . '</td>';
																				echo '<td>'. $row['sales_inquiry_id_for_quote'] . '</td>';
																				echo '<td>'. $salesinquirydatacustomer . '</td>';
																				echo '<td>'. $salesinquirydataproduct . '</td>';
																				echo '<td>'. $status . '</td>';
																				 
																			   if(!empty($row['quotation_approver_1']))
																			   {
																				    $user = getUser($row['quotation_approver_1']);
																					echo '<td>'. $user. '</td>';
																				 
																			   }
																			   else
																			   {
																				   
																				   echo '<td>Unassigned</td>';
																			   }
																			   
																			   
																			   echo '<td>
																						<a type="button" class="btn btn-sm btn-primary shadow-sm" href="quotationview.php?action=view&custid='.$salesinquirycustomer . '&sid='. $row['sales_inquiry_id_for_quote'] .'&qid='. $row['quotation_id'] .'"><i class="far fa-eye"></i></a> 
																						';
																			   
																				if(empty($row['quotation_approver_1']) AND $type =="Sales Associate" AND $checker ==1)
																				{
																					
																					
																				
																					
																					echo '
																						<a type="button" class="btn btn-sm btn-primary shadow-sm" href="quotationedit.php?action=edit&sid='.$row['sales_inquiry_id_for_quote']  . '&qid='. $quotation_id .'"><i class="far fa-edit"></i></a>
																						';
																					
																					echo '
																						<a type="button" class="btn btn-sm btn-primary shadow-sm" href="quotationview.php?action=assign&custid='.$salesinquirycustomer . '&sid='. $row['sales_inquiry_id_for_quote'] .'&qid='. $row['quotation_id'] .'"><i class="fas fa-people-arrows"></i></a>
																						';																					

																					
																				}			
																				elseif($checker == 1 AND $type =="Approver 2" AND  ($status =="Waiting for Approval" OR empty($status)))
																				{
																					
																					
																					echo '
																						<a type="button" class="btn btn-sm btn-primary shadow-sm" href="quotationview.php?action=approve&custid='.$salesinquirycustomer . '&sid='. $row['sales_inquiry_id_for_quote'] .'&qid='. $row['quotation_id'] .'"><i class="fas fas fa-address-card"></i></a>
																						';
																				}
																				
																				
																				
																				
																				echo '</td>';
																				echo '</tr>';
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