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


/*
if(empty($_SESSION["joborderitemarrayinventory"]))
{
    $itemarrayjoborder = array();
}
else
{
  $itemarrayjoborder = $_SESSION["joborderitemarrayinventory"];
}
*/


if(isset($_SESSION["joborderitemarrayinventory"]))
{
    $itemarrayjoborder = $_SESSION["joborderitemarrayinventory"];
}
else
{
 $itemarrayjoborder = array();
}
if(isset($_SESSION["joborderitemqty"]))
{
  $itemarrayquantity = $_SESSION["joborderitemqty"];
}
else
{
  $itemarrayquantity = array();
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


//echo getDropdownExistJO('tbl_salesorder',"status = 'Approved'",'salesorderID','salesorderID');
/*
$tbl = "tbl_salesorder";
$cond = "status = 'Approved'";
$param  = 'salesorderID';
$select = 'salesorderID';

  $con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());
  $result = "";
  $query = mysqli_query($con,"select * FROM ".$tbl." WHERE ".$cond. " ");

  mysqli_close($con);

  while($row = mysqli_fetch_array($query ,MYSQLI_ASSOC)) {
    //echo $row['salesorderID'];
    $soID = $row['id'];
    $numRows = getTblNumRows('tbl_joborder','salesorder = "'.$soID.'"');
    echo $numRows;
///  $numRows = getTblNumRows('tbl_joborder','salesorder = '.$row['salesorderID'].'');

if($numRows != 1)
{
$result .=  "<option ";
$result .= " value='".$row[$param]."'>".$row[$select]."</option>";
}
  }

  echo $result;
*/

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
                                            <div class="text-sm font-weight-bold text-info text-uppercase mb-4">Generate Job Order</div>
                                            <div class="row  align-items-center">
                                                <div class="col-auto">
                                                    <form class="user">
														<div class="form-group row">
														<div class="col-auto">
														<!--	<a href="#" data-toggle="modal" data-target="#createcustomerModal" class="d-none createcust d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
															class="fas fa-address-card fa-sm text-white-50"></i> Create Customer</a> -->
															Select Sales Order
														</div>

															<div class="col-auto">
																<select class="form-control form-select salesorderID" name="salesorderID" id = "salesorderID" aria-label="Default select example">
																   <option selected value="none">Select Sales Order</option>
																    <?php

																	echo getDropdownExistJO('tbl_salesorder',"status = 'Approved'",'id','salesorderID');
                                  //echo getDropdownselect('tbl_salesorder',"status = 'Approved'",'id','salesorderID');

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
												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Product</div>
												<div class="row  align-items-center">
													<div class="card-body">

														<div class="row">

																<div class="container joborderdata hidden" id="joborderdata">


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
  												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Details</div>
  												<div class="row  align-items-center">
  													<div class="col-12 customerdata" id="quotationdata">
  															 <div class="form-group col-12" >

                                   <?php $joborder = generateCode(); ?>
                                   <div class="form-group row">
     																	<div class="col-sm-2">
     																			<p>Job Order Number</p>
     																	</div>
     																	<div class="col-sm-4">
     																		<p class="h5 custrep">
                                          <input type="text" class="form-control joborderID" value="JO-<?php echo $joborder; ?>" name="joborderID" readonly="readonly" required  placeholder="Job Order ID" aria-label="Substrate Size" aria-describedby="basic-addon2" value="" >
                                          <input type="hidden" class="form-control IDJO" value="<?php echo $joborder; ?>" name="joborderID" readonly="readonly" required  placeholder="Job Order ID" aria-label="Substrate Size" aria-describedby="basic-addon2" value="" >


                                          <input type="hidden" class="form-control mfgprocessdata" value="" name="mfgprocessdata" readonly="readonly" required  placeholder="Job Order ID" aria-label="Substrate Size" aria-describedby="basic-addon2" value="" >

                                        </p>
     																	</div>
     															</div>



                                   <div class="form-group row">
     																	<div class="col-sm-2">
     																			<p>Sales Order Date:</p>
     																	</div>
     																	<div class="col-sm-4">
     																		<p class="h5 custrep">
                                          <input type="text" class="form-control sodate" readonly="readonly" disabled name="sodate" required  placeholder="Enter Sales Order Date" aria-label="Purchase Order Date" aria-describedby="basic-addon2"  >
                                        		</p>
     																	</div>

                                      <div class="col-sm-2">
                                          <p>PO Number:</p>
                                      </div>
                                      <div class="col-sm-4">
                                        <p class="h5 custrep">
                                           <input type="text" class="form-control joborderponum" name="joborderponum" readonly="readonly" required  placeholder="Enter PONumber" aria-label="Substrate Size" aria-describedby="basic-addon2" value="" >
                                          </p>
                                      </div>
     															</div>


                                  <div class="form-group row">
                                     <div class="col-sm-2">
                                         <p>Job Order Date:</p>
                                     </div>
                                     <div class="col-sm-4">
                                       <p class="h5 custrep">
                                         <input type="text" class="form-control jodate" readonly="readonly" name="jodate" required  placeholder="Enter Job Order Date" aria-label="Purchase Order Date" aria-describedby="basic-addon2"  >
                                          </p>
                                     </div>

                                     <div class="col-sm-2">
                                         <p>Job Order Deadline:</p>
                                     </div>
                                     <div class="col-sm-4">
                                       <p class="h5 custrep">
                                         <input type="text" class="form-control jodeadline" readonly="readonly" name="jodeadline" required  placeholder="Enter Job Order Deadline" aria-label="Purchase Order Date" aria-describedby="basic-addon2"  >
                                            </p>
                                     </div>
                                 </div>


  															<div class="form-group row">
  																	<div class="col-sm-2">
  																			<p>Quantity:</p>
  																	</div>
  																	<div class="col-sm-4">
  																		<p class="h5 custrep">
                                        <input type="text" class="form-control joborderqty" name="joborderqty" required  placeholder="Enter Quantity" aria-label="Substrate Size" aria-describedby="basic-addon2" value="" >
    																		</p>
  																	</div>
  																	<div class="col-sm-2">
                                      <select class="form-control form-select qtytype" name="qtytype" id = "qtytype" aria-label="Default select example">
      																   <option selected value="none">Select Quantity Type</option>
      																  <option selected value="Pcs">PCS</option>
                                        <option selected value="Meters">Meters</option>
                                        <option selected value="Kgs">KG</option>
      																</select>
  																	</div>

  															</div>

                                <div class="form-group row">
                                  <div class="col-sm-6">
                                    <p>Remarks</p>
                                  </div>
                                  <div class="col-sm-8">
                                    <textarea class="form-control joborderremarks" name="joborderremarks" required="" placeholder="Enter remarks" aria-label="Delivery Terms" aria-describedby="basic-addon2"></textarea>
                                  </div>

                              </div>



  																</div>
  																<!-- END OF ROLL FORM -->
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
              												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Materials</div>
              												<div class="row  align-items-center">
              													<div class="col-12 customerdata" id="quotationdata">
              															 <div class="form-group col-12" >



                                               <div class="form-group row ">



                                             <!--		<select class="selectpicker form-control materialdata" multiple data-live-search="true"   >
                                                  <?php

                                                  //     echo getDropdown('tbl_material',"material_status='Active'",'material_id',"material_name");

                                                       ?>
                                                 </select> -->
                                                  <div class="col-lg-1">
                                                    <p>Material</p>
                                                  </div>

                                                 <div class="col-lg-3">
                                                   <select class="form-control iteminv selecttable"	id="iteminv" name="iteminv" >
                                                    <?php

                                                         echo getDropdown('tbl_material',"material_status='Active'",'material_id',"material_name");

                                                         ?>
                                                   </select>
                                                 </div>

                                                 <div class="col-lg-1">
                                                   <p>Quantity:</p>
                                                 </div>
                                                 <div class="col-lg-3">
                                                   <input type="number" class="form-control itemqty" id="itemqty" name="itemqty" required  placeholder="Enter Quantity" aria-label="Quantity" aria-describedby="basic-addon2" value="" >
                                                 </div>


                                                 <div class="col-lg-2">
                                                   <a href="#"  class="btn btn-sm btn-primary shadow-sm" onclick="addMaterialjo(); return false"><i class="far fa-plus-square"></i> Add Item</a>
                                                 </div>


                                                 <div class="row gy-5"></div>
                                                  <?php
                                                  //  echo count($itemarrayjoborder);
                                                  //  print_r(array_filter($itemarrayjoborder));
                                                  //  print_r(array_filter($itemarrayquantity));
                                      /*            for($a=0;$a<count($itemarrayjoborder);$a++)
                                                   {
                                                     echo "Item";
                                                    echo $itemarrayjoborder[$a];
                                                     echo "QTY";
                                                    echo $itemarrayquantity[$a];
                                                    echo "<br>";
                                                  } */
                                                     ?>

                                             <!--	<button class="btn btn-primary test"  type="button" >Submit</button>			-->

                                               </div>
                                               <div class="form-group row txtResult2" id="txtResult2">

                                                                                 <table class="table table-bordered jomaterialtable" id="jomaterialtable" width="100%" cellspacing="0">
                                                       <thead>
                                                         <th>ID</th>
                                                         <th>Material Name</th>
                                                         <th>Quantity</th>
                                                         <th></th>
                                                       </thead>
                                                     <tbody>
                                                     <?php
                                                     //echo count($itemarrayjoborder);
                                                    // for($a=0;$a<count($itemarrayjoborder);$a++)
                                                     foreach ($itemarrayjoborder as $key=>$value)
                                                     {

                                                       $MaterialListDetails = MaterialListDetails($itemarrayjoborder[$key]);


                                                       if($MaterialListDetails["material_id"]!="")
                                                       {
                                                     ?>
                                                         <tr>
                                                     <td><?php echo $itemarrayjoborder[$key]; ?> </td>
                                                     <td><?php echo strtoupper($MaterialListDetails["material_name"]); ?> </td>
                                                     <td><?php echo $itemarrayquantity[$key]; ?> </td>
                                                     <td> <a href="#"  class="btn btn-sm btn-primary shadow-sm" onclick="deleteMaterialjo(<?php echo $key; ?>); return false"><i class="far fa-trash-alt"></i></a></td>
                                                         </tr>


                                                     <?php     }
                                                     }?>


                                                     </tbody>



                                                   </table>

                                               </div>



              																</div>
              																<!-- END OF ROLL FORM -->
              															</div>
              												</div>
              											</div>
              										</div>
              									</div>
              								</div>
              							</div>
              					</div>

                        
                        <?php ?>

          <div class="row gy-5 extrusionpanel hidden">
							<div class="col-lg-12">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Extrusion</div>
												<div class="row  align-items-center">
													<div class="col-12 customerdata" id="quotationdata">
															 <div class="form-group col-12" >


														<div class="row gy-5"></div>


															<div class="form-group row">
  																	<div class="col-sm-2">
  																			<p>Substrate and Size:</p>
  																	</div>
  																	<div class="col-sm-4">
  																		<p class="h5 custrep">
                                        <input type="text" class="form-control extrusionsubstratesize" name="extrusionsubstratesize" required  placeholder="Enter Substrate Size" aria-label="Substrate Size" aria-describedby="basic-addon2" value="" >
    																		</p>
  																	</div>
  																	<div class="col-sm-2">
  																		<p>Quantity</p>
  																	</div>
  																	<div class="col-sm-4">
                                      <input type="text" class="form-control extrutionqty" name="extrutionqty" required  placeholder="Enter Quantity" aria-label="Quantity" aria-describedby="basic-addon2" value="" >
                                  </div>
                                </div>


                                <div class="form-group row">
                                  <div class="col-sm-2">
                                    <p>Material Blending</p>
                                  </div>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control extrutionmaterialblend" name="extrutionmaterialblend" required  placeholder="Enter Material Blending" aria-label="Quantity" aria-describedby="basic-addon2" value="" >
                                </div>

                              </div>


                              <div class="col-sm-12">

                               <div class="card-body">


                                 <div class="form-check">
                                   <input class="form-check-input radio" type="radio" value="onesideprinting" name="chkextrusion[]" id="onesideprinting">
                                   <label class="form-check-label" for="flexCheckDefault">
                                   One Side Printing
                                   </label>
                                 </div>

                                 <div class="form-check">
                                   <input class="form-check-input" type="radio" value="bothsideprinting" name="chkextrusion[]" id="bothsideprinting">
                                   <label class="form-check-label" for="flexCheckDefault">
                                   Both Side Printing
                                   </label>
                                 </div>


                             </div>

                         </div>

                                <div class="form-group row">
																	<div class="col-sm-6">
																		<p>Remarks</p>
																	</div>
																	<div class="col-sm-8">
																		<textarea class="form-control extrusionremarks" name="extrusionremarks" required="" placeholder="Enter remarks" aria-label="Delivery Terms" aria-describedby="basic-addon2"></textarea>
																	</div>

															</div>

													<!-- END OF BAG FORM -->



													<!-- ROLL FORM -->

																</div>
																<!-- END OF ROLL FORM -->
															</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>


          <div class="row gy-5 printingpanel hidden">
							<div class="col-lg-12">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Printing</div>
												<div class="row  align-items-center">
													<div class="col-12 customerdata" id="quotationdata">
															 <div class="form-group col-12" >


														<div class="row gy-5"></div>


															<div class="form-group row">
																	<div class="col-sm-2">
																			<p>Substrate and Size:</p>
																	</div>
																	<div class="col-sm-4">
																		<p class="h5 custrep">
                                      <input type="text" class="form-control printingsubstratesize" name="printingsubstratesize" required  placeholder="Enter Substrate Size" aria-label="Substrate Size" aria-describedby="basic-addon2" value="" >
  																		</p>
																	</div>
																	<div class="col-sm-2">
																		<p>Quantity</p>
																	</div>
																	<div class="col-sm-4">
                                    <input type="text" class="form-control printingqty" name="printingqty" required  placeholder="Enter Quantity" aria-label="Quantity" aria-describedby="basic-addon2" value="" >
                                </div>


                                   <div class="col-sm-12">

                                    <div class="card-body">


                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" value="onesideprinting" name="chkprint[]" id="onesideprinting">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        One Side Printing
                                        </label>
                                      </div>

                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" value="bothsideprinting" name="chkprint[]" id="bothsideprinting">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        Both Side Printing
                                        </label>
                                      </div>


                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" value="reverseprint" name="chkprint[]" id="reverseprint">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        Reverse Print
                                        </label>
                                      </div>


                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" value="surfraceprint" name="chkprint[]" id="surfraceprint">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        Surface Print
                                        </label>
                                      </div>

                                  </div>

                              </div>

                                <div class="col-sm-2">
                                  <p>Cylinder Winding Direction</p>
                                </div>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control printingwindingdirection" name="printingwindingdirection" required  placeholder="Enter Cylinder Winding Direction" aria-label="Quantity" aria-describedby="basic-addon2" value="" >
                              </div>
															</div>

													<!-- END OF BAG FORM -->



													<!-- ROLL FORM -->

																</div>
																<!-- END OF ROLL FORM -->
															</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>


          <div class="row gy-5 laminationpanel hidden">
							<div class="col-lg-12">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-sm font-weight-bold text-info text-uppercase mb-4">Lamination</div>
												<div class="row  align-items-center">
													<div class="col-12 customerdata" id="quotationdata">
															 <div class="form-group col-12" >


														<div class="row gy-5"></div>


															<div class="form-group row">
																	<div class="col-sm-3">
																			<p>Substrate and Size:</p>
																	</div>
																	<div class="col-sm-4">
																		<p class="h5 custrep">
                                      <input type="text" class="form-control laminationsubstratesize" name="laminationsubstratesize" required  placeholder="Enter Substrate Size" aria-label="Substrate Size" aria-describedby="basic-addon2" value="" >
  																		</p>
																	</div>



                                   <div class="col-sm-12">

                                    <div class="card-body">


                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" value="gplamination" name="chklaminate[]" id="GP">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        GP
                                        </label>
                                      </div>

                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" value="mplamination" name="chklaminate[]" id="MP">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        MP
                                        </label>
                                      </div>

                                  </div>

                              </div>

                                <div class="col-sm-3">
                                  <p>Adhesive:</p>
                                </div>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control laminationadhesive" name="laminationadhesive" required  placeholder="Enter Adhesive" aria-label="Quantity" aria-describedby="basic-addon2" value="" >
                              </div>
                                <div class="col-sm-2">
                                  <p>KG:</p>
                                </div>
                                <div class="col-sm-3">
                                  <input type="text" class="form-control laminationkg" name="laminationkg" required  placeholder="Enter KG" aria-label="Quantity" aria-describedby="basic-addon2" value="" >
                                </div>
													</div>


                          <div class="form-group row">
                            <div class="col-sm-3">
                              <p>Remarks:</p>
                            </div>
                            <div class="col-sm-4">
                              <textarea class="form-control laminationremarks" name="laminationremarks" required="" placeholder="Enter Remarks" aria-label="Delivery Terms" aria-describedby="basic-addon2"></textarea>
                                </div>
                          </div>
													<!-- END OF BAG FORM -->



													<!-- ROLL FORM -->

																</div>
																<!-- END OF ROLL FORM -->
															</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>




          <div class="row gy-5 slittingpanel hidden">
              <div class="col-lg-12">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-sm font-weight-bold text-info text-uppercase mb-4">Slitting</div>
                        <div class="row  align-items-center">
                          <div class="col-12 customerdata" id="quotationdata">
                               <div class="form-group col-12" >


                            <div class="row gy-5"></div>


                              <div class="form-group row">
                                  <div class="col-sm-2">
                                      <p>Substrate and Size:</p>
                                  </div>
                                  <div class="col-sm-4">
                                    <p class="h5 custrep">
                                      <input type="text" class="form-control slittingsubstratesize" name="slittingsubstratesize" required  placeholder="Enter Substrate Size" aria-label="Substrate Size" aria-describedby="basic-addon2" value="" >
                                      </p>
                                  </div>

                                  <div class="col-sm-2">
                                      <p>Quantity:</p>
                                  </div>
                                  <div class="col-sm-4">
                                    <p class="h5 custrep">
                                      <input type="text" class="form-control slittingqty" name="slittingqty" required  placeholder="Enter Quantity" aria-label="Substrate Size" aria-describedby="basic-addon2" value="" >
                                      </p>
                                  </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <p>Number of Outs:</p>
                                    </div>
                                    <div class="col-sm-4">
                                      <p class="h5 custrep">
                                          <input type="text" class="form-control slittingnoofouts" name="slittingnoofouts" required  placeholder="Enter Number of Outs" aria-label="Substrate Size" aria-describedby="basic-addon2" value="" >
                                        </p>
                                    </div>

                                    <div class="col-sm-2">
                                        <p>Slitting Width:</p>
                                    </div>
                                    <div class="col-sm-4">
                                      <p class="h5 custrep">
                                        <input type="text" class="form-control slittingwidth" name="slittingwidth" required  placeholder="Enter Slitting Width" aria-label="Substrate Size" aria-describedby="basic-addon2" value="" >
                                        </p>
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                      <div class="col-sm-2">
                                          <p>Repeat Length:</p>
                                      </div>
                                      <div class="col-sm-4">
                                        <p class="h5 custrep">
                                            <input type="text" class="form-control slittingrepeatlength" name="slittingrepeatlength" required  placeholder="Enter Repeat Length" aria-label="Substrate Size" aria-describedby="basic-addon2" value="" >
                                          </p>
                                      </div>

                                      <div class="col-sm-2">
                                          <p>Winding Direction:</p>
                                      </div>
                                      <div class="col-sm-4">
                                        <p class="h5 custrep">
                                          <input type="text" class="form-control slittingwindingdirection" name="slittingwindingdirection" required  placeholder="Enter Winding Direction" aria-label="Substrate Size" aria-describedby="basic-addon2" value="" >
                                          </p>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <p>Max # of Splices:</p>
                                        </div>
                                        <div class="col-sm-4">
                                          <p class="h5 custrep">
                                              <input type="text" class="form-control slittingmaxnumofsplices" name="slittingmaxnumofsplices" required  placeholder="Enter max # of splices" aria-label="Substrate Size" aria-describedby="basic-addon2" value="" >
                                            </p>
                                        </div>

                                        <div class="col-sm-2">
                                            <p>Tapes to use:</p>
                                        </div>
                                        <div class="col-sm-4">
                                          <p class="h5 custrep">
                                            <input type="text" class="form-control slittingtapestouse" name="slittingtapestouse" required  placeholder="Enter tapes to use" aria-label="Substrate Size" aria-describedby="basic-addon2" value="" >
                                            </p>
                                        </div>
                                      </div>

                                  <div class="form-group row"
                                      <div class="col-sm-6">
                                        <p>Remarks:</p>
                                      </div>
                                      <div class="col-sm-8">
                                        <textarea class="form-control slittingremarks" name="slittingremarks" required="" placeholder="Enter Remarks" aria-label="Delivery Terms" aria-describedby="basic-addon2"></textarea>
                                      </div>
                                    </div>
                              </div>



                                </div>
                                <!-- END OF ROLL FORM -->
                              </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="row gy-5 cutbagpanel hidden">
                    <div class="col-lg-12">
                      <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-sm font-weight-bold text-info text-uppercase mb-4">Cutting and Bagging</div>
                              <div class="row  align-items-center">
                                <div class="col-12 customerdata" id="quotationdata">
                                     <div class="form-group col-12" >


                                  <div class="row gy-5"></div>


                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <p>Substrate and Size:</p>
                                        </div>
                                        <div class="col-sm-4">
                                          <p class="h5 custrep">
                                            <input type="text" class="form-control cutandbagsubstratesize" name="cutandbagsubstratesize" required  placeholder="Enter Substrate Size" aria-label="Substrate Size" aria-describedby="basic-addon2" value="" >
                                            </p>
                                        </div>

                                        <div class="col-sm-2">
                                            <p>Quantity:</p>
                                        </div>
                                        <div class="col-sm-4">
                                          <p class="h5 custrep">
                                            <input type="text" class="form-control cutandbagqty" name="cutandbagqty" required  placeholder="Enter Quantity" aria-label="Substrate Size" aria-describedby="basic-addon2" value="" >
                                            </p>
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                          <div class="col-sm-2">
                                              <p>Bag Width:</p>
                                          </div>
                                          <div class="col-sm-4">
                                            <p class="h5 custrep">
                                                <input type="text" class="form-control cutandbagwidth" name="cutandbagwidth" required  placeholder="Enter Bag Width" aria-label="Substrate Size" aria-describedby="basic-addon2" value="" >
                                              </p>
                                          </div>

                                          <div class="col-sm-2">
                                              <p>Bag Length:</p>
                                          </div>
                                          <div class="col-sm-4">
                                            <p class="h5 custrep">
                                              <input type="text" class="form-control cutandbaglength" name="cutandbaglength" required  placeholder="Enter Bag Length" aria-label="Substrate Size" aria-describedby="basic-addon2" value="" >
                                              </p>
                                          </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-2">
                                                <p>Bag Gusset:</p>
                                            </div>
                                            <div class="col-sm-4">
                                              <p class="h5 custrep">
                                                  <input type="text" class="form-control cutandbaggusset" name="cutandbaggusset" required  placeholder="Enter Bag Gusset" aria-label="Substrate Size" aria-describedby="basic-addon2" value="" >
                                                </p>
                                            </div>

                                            <div class="col-sm-2">
                                                <p>Seal Position:</p>
                                            </div>
                                            <div class="col-sm-4">
                                              <p class="h5 custrep">
                                                <input type="text" class="form-control cutandbagsealposition" name="cutandbagsealposition" required  placeholder="Enter Seal Position" aria-label="Substrate Size" aria-describedby="basic-addon2" value="" >
                                                </p>
                                            </div>
                                          </div>

                                          <div class="form-group row">
                                              <div class="col-sm-2">
                                                  <p>Pcs/Bundle:</p>
                                              </div>
                                              <div class="col-sm-4">
                                                <p class="h5 custrep">
                                                    <input type="text" class="form-control cutandbagpcsbundles" name="cutandbagpcsbundles" required  placeholder="Enter pcs/bundles" aria-label="Substrate Size" aria-describedby="basic-addon2" value="" >
                                                  </p>
                                              </div>

                                            </div>

                                            <div class="form-group row"
                                                <div class="col-sm-6">
                                                  <p>Others:</p>
                                                </div>
                                                <div class="col-sm-8">
                                                  <textarea class="form-control cutandbagothers" name="cutandbagothers" required="" placeholder="Enter Others" aria-label="Delivery Terms" aria-describedby="basic-addon2"></textarea>
                                                </div>
                                              </div>

                                        <div class="form-group row"
                                            <div class="col-sm-6">
                                              <p>Remarks:</p>
                                            </div>
                                            <div class="col-sm-8">
                                              <textarea class="form-control cutandbagremarks" name="cutandbagremarks" required="" placeholder="Enter Remarks" aria-label="Delivery Terms" aria-describedby="basic-addon2"></textarea>
                                            </div>
                                          </div>
                                    </div>



                                      </div>
                                      <!-- END OF ROLL FORM -->
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
						<button type="button" class="btn btn-success btn-lg btn-block submitjoborder" >Submit</button>

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


	</script>





  </body>
</html
