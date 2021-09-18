<?php session_start();
//Fetching Values from URL


require_once "functions/allfunctions.php";
$con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());

$prodPrice = $_POST['prodpriceval'];
$prodColor = $_POST['prodcolorval'];
$prodConstruction =$_POST['prodconstruction'];
$prodTolerance =$_POST['prodtolerance'];
$prodDeliveryTerms =$_POST['deliveryterms'];
$prodDeliverySched =$_POST['deliveryschedule'];
$sales_inquiry_id = $_POST['salesinquiryID'];
echo $sales_inquiry_id;
$final_date= date("Y-m-d H:i:s");

$insert_sql = "INSERT INTO tbl_quotation
			(sales_inquiry_id_for_quote,quotation_price, quotation_prod_construction,quotation_prod_color,
			quotation_prod_tolerance,quotation_delivery_terms,quotation_delivery_schedule,quotation_date_created)
			VALUES('". $sales_inquiry_id ."','".$prodPrice."',
			'".$prodConstruction."','".$prodColor."','".$prodTolerance."','".$prodDeliveryTerms."', '".$prodDeliverySched."','". $final_date ."')";
		if(mysqli_query($con, $insert_sql) or die("database error: ". mysqli_error($con)))
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
		$lastinsertedid = mysqli_insert_id($con);
$insert_task_sql = "INSERT INTO tbl_tasklist
			(type,action,user_type,user,datecreated,idassigned,status)
			VALUES('Quotation','Approval','Sales Associate','Unassigned','". $final_date ."','". $lastinsertedid ."','Not yet started')";
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
			alert("You've Successfully completed the quotation");
			window.location = "quotationlist.php";
		</script>
