<?php session_start();
require_once __DIR__."/allfunctions.php";


	$con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());




if(empty($_SESSION["itemarrayinventory"]))
{
    $itemarray = array();
}
else
{
  $itemarray = $_SESSION["itemarrayinventory"];
}



$num=$_GET["num"];
unset($itemarray[$num]);
//$itemarray[$num]= "";
$_SESSION["itemarrayinventory"]=$itemarray;
unset($_SESSION["itemarrayinventory"][$num]);
?>

															<table class="table table-bordered materialtable" id="datatable" width="100%" cellspacing="0">
																		<thead>
																			<th>ID</th>
																			<th>Material Name</th>
																			<th></th>
																		</thead>
																	<tbody>
																	<?php
																	for($a=0;$a<count($itemarray);$a++)
																	{
																		$MaterialListDetails = MaterialListDetails($itemarray[$a]);
																		
	
																		if($MaterialListDetails["material_id"]!="")
																		{
																	?>

																			
																					<tr>
																	<td><?php echo $itemarray[$a]; ?> </td>
																	<td><?php echo strtoupper($MaterialListDetails["material_name"]); ?> </td>
																	<td> <a href="#"  class="btn btn-sm btn-primary shadow-sm" onclick="deleteMaterial(<?php echo $a; ?>); return false"><i class="far fa-trash-alt"></i></a></td>
																			</tr>
																	
																	
																	<?php     }
																	}?>
																
																	
																	</tbody>
																	
																   
																 
																</table>

