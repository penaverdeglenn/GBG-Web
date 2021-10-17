<?php
require_once __DIR__."/allfunctions.php";


	$con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());
	$echo="";
	$custrep = "";
	$custemail = "";
	$custnum = "";
	$custaddress = "";
	$qid = $_GET['qid'];


	if($qid!="")
    {
	//$si_id = getRecord('sales_inquiry_id_for_quote','tbl_quotation','quotation_id ='.$qid);
    $strSQL = "SELECT * FROM tbl_salesorder WHERE status='Approved' AND id=".$qid;
    $rs1 = mysqli_query($con,$strSQL) or die (mysqli_error($con));
		mysqli_close($con);

    $row1 = mysqli_fetch_array($rs1 ,MYSQLI_ASSOC);
//	$cust_id = $row1["customer_id"];
//    $SI_customer_name = getRecord('customer_company_name','tbl_customer','customer_id ='.$cust_id);

	  $POnumber = $row1["POnumber"];

		echo $POnumber;

	}
?>
