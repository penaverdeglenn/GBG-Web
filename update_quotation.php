<?php session_start();
//Fetching Values from URL


require_once "functions/allfunctions.php";
$con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());
$sales_inquiry_id = $_SESSION['sales_id_data'];
$prodPrice = $_POST['prodpriceval'];
$prodColor = $_POST['prodcolorval'];
$prodConstruction =$_POST['prodconstruction'];
$prodTolerance =$_POST['prodtolerance'];
$prodDeliveryTerms =$_POST['deliveryterms'];
$prodDeliverySched =$_POST['deliveryschedule'];
$quotation_id = $_SESSION['quotation_id_data'];


$final_date= date("Y-m-d H:i:s");

$update_sql = "UPDATE tbl_quotation
			SET quotation_price = '".$prodPrice."', 
			quotation_prod_construction = '".$prodConstruction."',
			quotation_prod_color ='".$prodColor."',
			quotation_prod_tolerance='".$prodTolerance."',
			quotation_delivery_terms='".$prodDeliveryTerms."',
			quotation_delivery_schedule='".$prodDeliverySched."',
			quotation_date_modified='".$final_date."'
			WHERE quotation_id='" . $quotation_id . "'";
		if(mysqli_query($con, $update_sql) or die("database error: ". mysqli_error($con)))
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
$insert_task_sql = "INSERT INTO tbl_tasklist
			(type,action,user_type,user,datecreated,idassigned,status)
			VALUES('Quotation','Approval','','','". $final_date ."','','Not yet started')";
		if(mysqli_query($con, $insert_task_sql) or die("database error: ". mysqli_error($con)))
		{
			echo 1;
		}
		else
		{
			echo 0;
		}	
		
?>
<script type="text/javascript">
			alert("You've Successfully updated the quotation information");
			window.location = "quotationlist.php";
		</script>

