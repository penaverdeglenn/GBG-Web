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


		$sid = $_POST['sid'];
		$assignperson = $_POST['assignperson'];
		if($type =="Approver 1")
		{
		$strSQL = "UPDATE tbl_sales_inquiry SET salesinquiry_status='Pending Approval Level 2',approver='".$memberid."',assignedto='".$assignperson."',date_approved='".$dateToday."' WHERE sales_inquiry_id=".$sid;
		}
		else if($type =="Approver 2")
		{
			$strSQL = "UPDATE tbl_sales_inquiry SET salesinquiry_status='Approved',secondapprover='".$memberid."',secondapproverdate='".$dateToday."' WHERE sales_inquiry_id=".$sid;
		}
		if(mysqli_query($con, $strSQL) or die("database error: ". mysqli_error($con)))
		{
			$strSQL2 = "UPDATE tbl_tasklist SET status='Completed' WHERE idassigned=".$sid;
			if(mysqli_query($con, $strSQL2) or die("database error: ". mysqli_error($con)))
			{
				if($type =="Approver 1")
				{
					$insert_sql1 = "INSERT INTO tbl_tasklist(id,type, action, user,user_type,datecreated,idassigned,status)
					VALUES(NULL,'Sales Inquiry', 'Approval','".$assignperson."','Sales Inquiry Approver 2','".$dateToday."','".$sid."','Not yet started')";
					if(mysqli_query($con, $insert_sql1) or die("database error: ". mysqli_error($con)))
					{
						echo 1;
					}
					else
					{
						echo 0;
					}
				}
				else if($type =="Approver 2")
				{
					echo 1;
				}

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
