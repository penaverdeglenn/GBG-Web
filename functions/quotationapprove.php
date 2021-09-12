<?php session_start();
//Fetching Values from URL
date_default_timezone_set('Asia/Manila');
	if(empty($_SESSION["MEMBER_ID"]) && empty($_SESSION["TYPE"]) && empty($_SESSION["FIRST_NAME"]))
	{
	   $itemarray = array();
	   $memberid = "";
	  $type = "";
	  $fname = "";
	}
	else
	{
	  $memberid = $_SESSION['MEMBER_ID'];
	  $type = $_SESSION['TYPE'];
	  $fname = $_SESSION['FIRST_NAME'];
	}
	
	$dateToday = date('Y-m-d');

require_once __DIR__."/allfunctions.php";
$con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());


		$qid = $_POST['qid'];
	
		$strSQL = "UPDATE tbl_quotation SET quotation_status='Approved',quotation_approver_1_response='Approved',quotation_approver_1_date='".$dateToday."' WHERE quotation_id=".$qid;

		if(mysqli_query($con, $strSQL) or die("database error: ". mysqli_error($con)))
		{
			$strSQL2 = "UPDATE tbl_tasklist SET status='Completed' WHERE type='Quotation' AND idassigned=".$qid;
			if(mysqli_query($con, $strSQL2) or die("database error: ". mysqli_error($con)))
			{

				echo 1;
				
			}
			else
			{
				echo 0;
			}
		}
		else
		{
			echo 0;
		}

		
?>

