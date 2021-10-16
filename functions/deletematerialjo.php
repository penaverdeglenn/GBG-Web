<?php session_start();
require_once __DIR__."/allfunctions.php";


	$con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());



	if(isset($_SESSION["joborderitemarrayinventory"]))
	{
	    $itemarrayjoborder = $_SESSION["joborderitemarrayinventory"];
	}
	else
	{
	 $itemarrayjoborder = array();
	}


$num=$_GET["num"];
unset($itemarrayjoborder[$num]);
//$itemarray[$num]= "";
//$_SESSION["joborderitemarrayinventory"]=$itemarrayjoborder;
unset($_SESSION["joborderitemarrayinventory"][$num]);
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
																	for($a=0;$a<count($itemarrayjoborder);$a++)
																	{
																		$MaterialListDetails = MaterialListDetails($itemarrayjoborder[$a]);


																		if($MaterialListDetails["material_id"]!="")
																		{
																	?>


																					<tr>
																	<td><?php echo $itemarrayjoborder[$a]; ?> </td>
																	<td><?php echo strtoupper($MaterialListDetails["material_name"]); ?> </td>
																	<td><?php echo strtoupper($MaterialListDetails["material_name"]); ?> </td>
																	<td> <a href="#"  class="btn btn-sm btn-primary shadow-sm" onclick="deleteMaterialjo(<?php echo $a; ?>); return false"><i class="far fa-trash-alt"></i></a></td>
																			</tr>


																	<?php     }
																	}?>


																	</tbody>



																</table>
