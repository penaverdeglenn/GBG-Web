<?php session_start();
require_once __DIR__."/allfunctions.php";


	$con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());



	if(isset($_SESSION["joborderitemarrayinventory"]))
	{
	    $itemarrayjoborder = $_SESSION["joborderitemarrayinventory"];
		$itemarrayquantity = $_SESSION["joborderitemqty"];
	}
	else
	{
	 $itemarrayjoborder = array();
	 $itemarrayquantity = array();
	}


$num=$_GET["num"];

echo $num;
//unset($itemarrayjoborder[$num]);
//unset($itemarrayquantity[$num]);
//$itemarray[$num]= "";
//$_SESSION["joborderitemarrayinventory"]=$itemarrayjoborder;
unset($_SESSION["joborderitemarrayinventory"][$num]);
unset($_SESSION["joborderitemqty"][$num]);
//$_SESSION["joborderitemarrayinventory"]=$itemarrayjoborder;
//$_SESSION["joborderitemqty"]=$itemarrayquantity;
$itemarrayjoborder = $_SESSION["joborderitemarrayinventory"];
$itemarrayquantity = $_SESSION["joborderitemqty"];
?>

															<table class="table table-bordered jomaterialtable" id="datatable" width="100%" cellspacing="0">
																		<thead>
																			<th>ID</th>
																			<th>Material Name</th>
																			<th>Quantity</th>
																			<th></th>
																		</thead>
																	<tbody>
																	<?php
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
