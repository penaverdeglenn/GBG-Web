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


				$itemid=$_GET["inv"];
				$itemqty=$_GET["itemqty"];

				$checkifdoble=1;
				for($a=0;$a<count($itemarrayjoborder);$a++)
				{
					if($itemarrayjoborder[$a]==$itemid && $itemarrayjoborder[$a]!=0)
					{
						//$itemarrayquantity += $itemqty;
						$itemarrayquantity[$a]=($itemarrayquantity[$a]*1)+($itemqty*1);
						$checkifdoble=2;
					}
				}

				if($checkifdoble==1)
				{
					if($itemid!="")
					{

						array_push($itemarrayjoborder,$itemid);
						array_push($itemarrayquantity,$itemqty);


					}
				}
				else if($checkifdoble==2)
				{
					if($itemid!="")
					{




					}
				}





																	$_SESSION["joborderitemarrayinventory"]=$itemarrayjoborder;
																	$_SESSION["joborderitemqty"]=$itemarrayquantity;

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
																			//echo $_SESSION["joborderitemqty"];
																			echo '<tr>';
																			echo '<td>' . $itemarrayjoborder[$key] . '</td>';
																			echo '<td>' . strtoupper($MaterialListDetails["material_name"]) . '</td>';
																			echo '<td>' . $itemarrayquantity[$key] . '</td>';
																			echo '<td> <a href="#"  class="btn btn-sm btn-primary shadow-sm" onclick="deleteMaterialjo('. $key . ');
																			return false"><i class="far fa-trash-alt"></i></a></td>';
																			echo '</tr>';


																		}
																	}

																	?>

																	</tbody>



																</table>
