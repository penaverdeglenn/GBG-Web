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


if(empty($_GET['soid']))
{
$soid = "";

}
else
{
	$soid = $_GET['soid'];

}


if(empty($_GET['id']))
{

$joborderid = "";
}
else
{
	$joborderid = $_GET['id'];

}

if(empty( $_GET['action']))
{


}
else
{
	$action =  $_GET['action'];

}

$joborderid = isset($joborderid)?$joborderid:'';
$action = isset($action)?$action:'';



$con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());

//$strSQL = "SELECT distinct a.itemid AS itemid,b.itemname AS itemname, b.uomid AS uomid, b.catid AS catid ";
//$strSQL.= "FROM 10_bom a, 8_inventory b ";
//$strSQL.= "WHERE a.status=1 AND b.status=1 AND a.itemid=b.id ORDER BY itemname" ;
$strSQL = "SELECT * FROM tbl_joborder";

$rs = mysqli_query($con,$strSQL) or die(mysqli_error($con));
mysqli_close($con);

while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC)) {



  $joborderIDNUM = $row['jobordernum'];
  $salesorderID = $row['salesorder'];
  $productid = $row['productid'];
  $sid = $row['saleinquiryid'];
  $ponumber = $row['ponumber'];
  $sodate = $row['salesorderdate'];
  $jodate = $row['joborderdate'];
  $jodeadline = $row['joborderdeadline'];
  $qtytype = $row['joborderqtytype'];
  $joborderqty = $row['joborderqty'];
  $joborderremarks = $row['joborderremarks'];


  $extrusionsubstratesize = $row['extrusionsubsize'];
  $extrutionqty = $row['extrusionqty'];
  $extrutionmaterialblend = $row['extrusionmaterialblending'];
  $extrusionremarks = $row['extrusionremarks'];
  $chkextrusion = $row['extrusionprocess'];


  $printingsubstratesize = $row['printingsubsize'];
  $printingqty = $row['printingqty'];
  $printingwindingdirection = $row['printingwindingdirection'];
  $chkprint = $row['printingprocess'];


  $laminationsubstratesize = $row['laminationsubsize'];
  $laminationadhesive = $row['laminationadhesive'];
  $laminationkg = $row['laminationkg'];
  $laminationremarks = $row['laminationremarks'];
  $chklaminate = $row['laminationprocess'];



  $slittingsubstratesize = $row['slittingsubsize'];
  $slittingqty = $row['slittingqty'];
  $slittingnoofouts = $row['slittingnoofouts'];
  $slittingwidth = $row['slittingwidth'];
  $slittingrepeatlength = $row['slittingrepeatlength'];
  $slittingwindingdirection = $row['slittingwindingdirection'];
  $slittingmaxnumofsplices = $row['slittingmaxsplice'];
  $slittingtapestouse = $row['slittingtapestouse'];
  $slittingremarks = $row['slittingremarks'];


  $cutandbagsubstratesize = $row['slittingremarks'];
  $cutandbagqty = $row['cutbagqty'];
  $cutandbagwidth = $row['cutbagwidth'];
  $cutandbaglength = $row['cutbaglength'];
  $cutandbaggusset = $row['cutbaggusset'];
  $cutandbagsealposition = $row['cutbagsealposition'];
  $cutandbagpcsbundles = $row['cutbagpcsbundle'];
  $cutandbagothers = $row['cutbagothers'];
  $cutandbagremarks = $row['cutbagremarks'];


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
<script>
$(document).ready(function(){
    $('select[name="salesorderID"]').val("<?php echo $soid;?>").change();
    //alert("ready! "+ $('select[name="salesinquiry"]').val());
});
</script>
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

																	echo getDropdownselect('tbl_salesorder',"status = 'Approved'",'id','salesorderID');
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
                                            JO-<?php echo $joborderIDNUM; ?>
                                        </p>
     																	</div>
     															</div>



                                   <div class="form-group row">
     																	<div class="col-sm-2">
     																			<p>Sales Order Date:</p>
     																	</div>
     																	<div class="col-sm-4">
     																		<p class="h5 custrep">
                                        <?php echo $sodate;  ?>
                                      </p>
     																	</div>

                                      <div class="col-sm-2">
                                          <p>PO Number:</p>
                                      </div>
                                      <div class="col-sm-4">
                                        <p class="h5 custrep">
                                           <?php echo $ponumber;  ?>
                                           </p>
                                      </div>
     															</div>


                                  <div class="form-group row">
                                     <div class="col-sm-2">
                                         <p>Job Order Date:</p>
                                     </div>
                                     <div class="col-sm-4">
                                       <p class="h5 custrep">
                                        <?php echo $jodate;  ?>  </p>
                                     </div>

                                     <div class="col-sm-2">
                                         <p>Job Order Deadline:</p>
                                     </div>
                                     <div class="col-sm-4">
                                       <p class="h5 custrep">
                                        <?php echo $jodeadline;  ?>    </p>
                                     </div>
                                 </div>


  															<div class="form-group row">
  																	<div class="col-sm-2">
  																			<p>Quantity:</p>
  																	</div>
  																	<div class="col-sm-4">
  																		<p class="h5 custrep">
                                        <?php echo $joborderqty;  ?>  <?php echo $qtytype;  ?>
                                      </p>
  																	</div>
  															</div>

                                <div class="form-group row">
                                  <div class="col-sm-6">
                                    <p>Remarks</p>
                                  </div>
                                  <div class="col-sm-8">
                                    <?php echo $joborderremarks;  ?>
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





                                                
                                                  <?php  for($a=0;$a<count($itemarrayjoborder);$a++)
                                                   {

                                                     //echo $itemarrayjoborder[$a];
                                                   }
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
                                                     for($a=0;$a<count($itemarrayjoborder);$a++)
                                                     {
                                                       $MaterialListDetails = MaterialListDetails($itemarrayjoborder[$a]);


                                                       if($MaterialListDetails["material_id"]!="")
                                                       {
                                                     ?>
                                                         <tr>
                                                     <td><?php echo $itemarrayjoborder[$a]; ?> </td>
                                                     <td><?php echo strtoupper($MaterialListDetails["material_name"]); ?> </td>
                                                     <td><?php echo '' ?> </td>
                                                     <td> <a href="#"  class="btn btn-sm btn-primary shadow-sm" onclick="deleteMaterialjo(<?php echo $a; ?>); return false"><i class="far fa-trash-alt"></i></a></td>
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


          <div class="row gy-5">
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
                                      <?php echo $extrusionsubstratesize;  ?>
                                    	</p>
  																	</div>
  																	<div class="col-sm-2">
  																		<p>Quantity</p>
  																	</div>
  																	<div class="col-sm-4">
                                      <?php echo $extrutionqty;  ?>
                                      </div>
                                </div>


                                <div class="form-group row">
                                  <div class="col-sm-2">
                                    <p>Material Blending</p>
                                  </div>
                                  <div class="col-sm-4">
                                    <?php echo $extrutionmaterialblend;  ?>
                                </div>

                              </div>


                              <div class="col-sm-12">

                               <div class="card-body">

                                <?php

                                $str_arr = explode (",", $chkextrusion);
                                if (in_array("onesideprinting", $str_arr))
                                {
                                  echo '<div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="extrusion" name="chkpext[]" id="extrusion" disabled="disabled" checked="checked">
                                  <label class="form-check-label" for="flexCheckDefault">
                                  One Side Printing
                                  </label>
                                  </div>';
                                }
                                else
                                {
                                  echo '<div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="extrusion" name="chkpext[]" disabled="disabled" id="extrusion" >
                                  <label class="form-check-label" for="flexCheckDefault">
                                  One Side Printing
                                  </label>
                                  </div>';
                                }

                                if (in_array("bothsideprinting", $str_arr))
                                {
                                  echo '<div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="extrusion" name="chkpext[]" id="extrusion" disabled="disabled" checked="checked">
                                  <label class="form-check-label" for="flexCheckDefault">
                                  Both Side Printing
                                  </label>
                                  </div>';
                                }
                                else
                                {
                                  echo '<div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="extrusion" name="chkpext[]" disabled="disabled" id="extrusion" >
                                  <label class="form-check-label" for="flexCheckDefault">
                                  Both Side Printing
                                  </label>
                                  </div>';
                                }

                                 ?>

                             </div>

                         </div>

                                <div class="form-group row">
																	<div class="col-sm-6">
																		<p>Remarks</p>
																	</div>
																	<div class="col-sm-8">
                                      <?php echo $extrusionremarks;  ?>
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


          <div class="row gy-5">
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
                                    <?php echo $printingsubstratesize;  ?>
  																		</p>
																	</div>
																	<div class="col-sm-2">
																		<p>Quantity</p>
																	</div>
																	<div class="col-sm-4">
                                    <?php echo $printingqty;  ?>
                                </div>


                                   <div class="col-sm-12">

                                    <div class="card-body">

                                      <?php



                                      $str_arr2= explode (",", $chkprint);

                                      if (in_array("onesideprinting", $str_arr2))
                                      {
                                        echo '<div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="extrusion" name="chkpext[]" id="extrusion" disabled="disabled" checked="checked">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        One Side Printing
                                        </label>
                                        </div>';
                                      }
                                      else
                                      {
                                        echo '<div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="extrusion" name="chkpext[]" disabled="disabled" id="extrusion" >
                                        <label class="form-check-label" for="flexCheckDefault">
                                        One Side Printing
                                        </label>
                                        </div>';
                                      }

                                      if (in_array("bothsideprinting", $str_arr2))
                                      {
                                        echo '<div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="extrusion" name="chkpext[]" id="extrusion" disabled="disabled" checked="checked">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        Both Side Printing
                                        </label>
                                        </div>';
                                      }
                                      else
                                      {
                                        echo '<div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="extrusion" name="chkpext[]" disabled="disabled" id="extrusion" >
                                        <label class="form-check-label" for="flexCheckDefault">
                                        Both Side Printing
                                        </label>
                                        </div>';
                                      }


                                      if (in_array("reverseprint", $str_arr2))
                                      {
                                        echo '<div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="extrusion" name="chkpext[]" id="extrusion" disabled="disabled" checked="checked">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        Reverse Print
                                        </label>
                                        </div>';
                                      }
                                      else
                                      {
                                        echo '<div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="extrusion" name="chkpext[]" disabled="disabled" id="extrusion" >
                                        <label class="form-check-label" for="flexCheckDefault">
                                        Reverse Print
                                        </label>
                                        </div>';
                                      }


                                      if (in_array("surfraceprint", $str_arr2))
                                      {
                                        echo '<div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="extrusion" name="chkpext[]" id="extrusion" disabled="disabled" checked="checked">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        Surface Print
                                        </label>
                                        </div>';
                                      }
                                      else
                                      {
                                        echo '<div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="extrusion" name="chkpext[]" disabled="disabled" id="extrusion" >
                                        <label class="form-check-label" for="flexCheckDefault">
                                        Surface Print
                                        </label>
                                        </div>';
                                      }

                                       ?>



                                  </div>

                              </div>

                                <div class="col-sm-2">
                                  <p>Cylinder Winding Direction</p>
                                </div>
                                <div class="col-sm-4">
                                      <?php echo $printingwindingdirection;  ?>
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


          <div class="row gy-5">
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
                                          <?php echo $laminationsubstratesize;  ?>
  																		</p>
																	</div>



                                   <div class="col-sm-12">

                                    <div class="card-body">

                                      <?php

                                      $str_arr3= explode (",", $chklaminate);

                                      if (in_array("gplamination", $str_arr3))
                                      {
                                        echo '<div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="extrusion" name="chkpext[]" id="extrusion" disabled="disabled" checked="checked">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        GP
                                        </label>
                                        </div>';
                                      }
                                      else
                                      {
                                        echo '<div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="extrusion" name="chkpext[]" disabled="disabled" id="extrusion" >
                                        <label class="form-check-label" for="flexCheckDefault">
                                        GP
                                        </label>
                                        </div>';
                                      }

                                      if (in_array("mplamination", $str_arr3))
                                      {
                                        echo '<div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="extrusion" name="chkpext[]" id="extrusion" disabled="disabled" checked="checked">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        MP
                                        </label>
                                        </div>';
                                      }
                                      else
                                      {
                                        echo '<div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="extrusion" name="chkpext[]" disabled="disabled" id="extrusion" >
                                        <label class="form-check-label" for="flexCheckDefault">
                                        MP
                                        </label>
                                        </div>';
                                      }




                                       ?>

                                  </div>

                              </div>

                                <div class="col-sm-3">
                                  <p>Adhesive:</p>
                                </div>
                                <div class="col-sm-4">
                                  <?php echo $laminationadhesive;  ?>
                                  </div>
                                <div class="col-sm-2">
                                  <p>KG:</p>
                                </div>
                                <div class="col-sm-3">
                                    <?php echo $laminationkg;  ?>
                                </div>
													</div>


                          <div class="form-group row">
                            <div class="col-sm-3">
                              <p>Remarks:</p>
                            </div>
                            <div class="col-sm-4">
                                <?php echo $laminationremarks;  ?>
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




          <div class="row gy-5">
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
                                      <?php echo $slittingsubstratesize;  ?>
                                    </p>
                                  </div>

                                  <div class="col-sm-2">
                                      <p>Quantity:</p>
                                  </div>
                                  <div class="col-sm-4">
                                    <p class="h5 custrep">
                                      <?php echo $slittingqty;  ?>
                                      </p>
                                  </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <p>Number of Outs:</p>
                                    </div>
                                    <div class="col-sm-4">
                                      <p class="h5 custrep">
                                        <?php echo $slittingnoofouts;  ?>
                                        </p>
                                    </div>

                                    <div class="col-sm-2">
                                        <p>Slitting Width:</p>
                                    </div>
                                    <div class="col-sm-4">
                                      <p class="h5 custrep">
                                        <?php echo $slittingwidth;  ?>
                                        </p>
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                      <div class="col-sm-2">
                                          <p>Repeat Length:</p>
                                      </div>
                                      <div class="col-sm-4">
                                        <p class="h5 custrep">
                                          <?php echo $slittingrepeatlength;  ?>
                                          </p>
                                      </div>

                                      <div class="col-sm-2">
                                          <p>Winding Direction:</p>
                                      </div>
                                      <div class="col-sm-4">
                                        <p class="h5 custrep">
                                          <?php echo $slittingwindingdirection;  ?>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <p>Max # of Splices:</p>
                                        </div>
                                        <div class="col-sm-4">
                                          <p class="h5 custrep">
                                              <?php echo $slittingmaxnumofsplices;  ?>
                                            </p>
                                        </div>

                                        <div class="col-sm-2">
                                            <p>Tapes to use:</p>
                                        </div>
                                        <div class="col-sm-4">
                                          <p class="h5 custrep">
                                          <?php echo $slittingtapestouse;  ?>
                                            </p>
                                        </div>
                                      </div>

                                  <div class="form-group row"
                                      <div class="col-sm-6">
                                        <p>Remarks:</p>
                                      </div>
                                      <div class="col-sm-8">
                                        <?php echo $slittingremarks;  ?>
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


                <div class="row gy-5">
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
                                            <?php echo $cutandbagsubstratesize;  ?>
                                          </p>
                                        </div>

                                        <div class="col-sm-2">
                                            <p>Quantity:</p>
                                        </div>
                                        <div class="col-sm-4">
                                          <p class="h5 custrep">
                                            <?php echo $cutandbagqty;  ?>
                                            </p>
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                          <div class="col-sm-2">
                                              <p>Bag Width:</p>
                                          </div>
                                          <div class="col-sm-4">
                                            <p class="h5 custrep">
                                                <?php echo $cutandbagwidth;  ?>
                                              </p>
                                          </div>

                                          <div class="col-sm-2">
                                              <p>Bag Length:</p>
                                          </div>
                                          <div class="col-sm-4">
                                            <p class="h5 custrep">
                                              <?php echo $cutandbaglength;  ?>
                                            </p>
                                          </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-2">
                                                <p>Bag Gusset:</p>
                                            </div>
                                            <div class="col-sm-4">
                                              <p class="h5 custrep">
                                                <?php echo $cutandbaggusset;  ?>
                                              </p>
                                            </div>

                                            <div class="col-sm-2">
                                                <p>Seal Position:</p>
                                            </div>
                                            <div class="col-sm-4">
                                              <p class="h5 custrep">
                                                <?php echo $cutandbagsealposition;  ?>
                                              </p>
                                            </div>
                                          </div>

                                          <div class="form-group row">
                                              <div class="col-sm-2">
                                                  <p>Pcs/Bundle:</p>
                                              </div>
                                              <div class="col-sm-4">
                                                <p class="h5 custrep">
                                                  <?php echo $cutandbagpcsbundles;  ?>
                                                </p>
                                              </div>

                                            </div>

                                            <div class="form-group row"
                                                <div class="col-sm-6">
                                                  <p>Others:</p>
                                                </div>
                                                <div class="col-sm-8">
                                                  <?php echo $cutandbagothers;  ?>
                                              </div>
                                              </div>

                                        <div class="form-group row"
                                            <div class="col-sm-6">
                                              <p>Remarks:</p>
                                            </div>
                                            <div class="col-sm-8">
                                              <?php echo $cutandbagremarks;  ?>
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
