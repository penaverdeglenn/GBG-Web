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


$joid = $_POST['joid'];
$assignedto = $_POST['assignedto'];
$user_type = getRecord('ACCESS_TYPE','users','id ='.$assignedto.'');
$dateToday = date('Y-m-d');


if(str_contains($user_type,"Job Order"))
{
	//$strSQL = "UPDATE tbl_sales_inquiry SET salesinquiry_status='Pending Approval Level 1',assignedto='".$assignedto."' WHERE sales_inquiry_id=".$sid;
	$strSQL = "INSERT INTO tbl_tasklist(id,type, action, user,user_type,datecreated,idassigned,status) VALUES (NULL,'Job Order', 'Approval','".$assignedto."','".$user_type."','".$dateToday."','".$joid."','Not yet started')";
	
	
}
if(mysqli_query($con, $strSQL) or die("database error: ". mysqli_error($con)))
{
	$strSQL2 = "UPDATE tbl_joborder SET assignedTo='".$assignedto."' WHERE id=".$joid;
	if(mysqli_query($con, $strSQL2) or die("database error: ". mysqli_error($con)))
	{
		$status = "Waiting for Approval";
		$strSQL3 = "UPDATE tbl_joborder SET assignedTo='".$assignedto."',joborderstatus='".$status."' WHERE id=".$joid;
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


?>
