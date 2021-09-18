<?php session_start();
//Fetching Values from URL

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

require_once __DIR__."/allfunctions.php";
$con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());


		$sid = $_POST['sid'];
		$assignedto = $_POST['assignedto'];
		$user_type = getRecord('USER_TYPE','users','id ='.$assignedto.'');
		$dateToday = date('Y-m-d');
		if($type =="Approver 1")
		{
			//$strSQL = "UPDATE tbl_sales_inquiry SET assignedto='".$assignedto."' WHERE sales_inquiry_id=".$sid;
			$strSQL = "INSERT INTO tbl_tasklist(id,type, action, user,user_type,datecreated,idassigned,status)
					VALUES(NULL,'Sales Inquiry', 'Approval','".$assignedto."','".$user_type."','".$dateToday."','".$sid."','Not yet started')";
		}
		else if($type =="Approver 2")
		{
			//$strSQL = "UPDATE tbl_sales_inquiry SET assignedto='".$assignedto."' WHERE sales_inquiry_id=".$sid;
			$strSQL = "INSERT INTO tbl_tasklist(id,type, action, user,user_type,datecreated,idassigned,status)
					VALUES(NULL,'Sales Inquiry', 'Approval','".$assignedto."','".$user_type."','".$dateToday."','".$sid."','Not yet started')";

		}
		else if($type =="Sales Associate")
		{
			//$strSQL = "UPDATE tbl_sales_inquiry SET salesinquiry_status='Pending Approval Level 1',assignedto='".$assignedto."' WHERE sales_inquiry_id=".$sid;
			$strSQL = "INSERT INTO tbl_tasklist(id,type, action, user,user_type,datecreated,idassigned,status)
					VALUES(NULL,'Sales Inquiry', 'Approval','".$assignedto."','".$user_type."','".$dateToday."','".$sid."','Not yet started')";


		}
		//$strSQL = "UPDATE tbl_sales_inquiry SET assignedto='".$assignedto."' WHERE sales_inquiry_id=".$sid;
		if(mysqli_query($con, $strSQL) or die("database error: ". mysqli_error($con)))
		{
			//$strSQL2 = "UPDATE tbl_tasklist SET user='".$assignedto."',user_type='".$user_type."' WHERE idassigned=".$sid;
			$strSQL2 = "UPDATE tbl_tasklist SET user='".$assignedto."' WHERE idassigned=".$sid;
			if(mysqli_query($con, $strSQL2) or die("database error: ". mysqli_error($con)))
			{
				$status = "Pending Approval Level 1";
				$strSQL3 = "UPDATE tbl_sales_inquiry SET assignedto='".$assignedto."',approver='".$assignedto."',salesinquiry_status='".$status."' WHERE sales_inquiry_id=".$sid;
				if(mysqli_query($con, $strSQL3) or die("database error: ". mysqli_error($con)))
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
