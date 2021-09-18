<?php session_start();
//Fetching Values from URL


require_once __DIR__."/allfunctions.php";
$con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());



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


$username = $_POST['username'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$dept = $_POST['dept'];
$usertype = $_POST['usertype'];
$dateToday = date('Y-m-d');
$useraccess = $_POST['useraccess'];






	$insert_sql = "INSERT INTO users(id,USERNAME,PASSWORD,FIRST_NAME,LAST_NAME,DEPARTMENT,USER_TYPE,ACCESS_TYPE,GENDER)
	VALUES(NULL,'".$username."', '".$password."','".$fname."','".$lname."','".$dept."','".$usertype."', '".$useraccess."', '".$gender."')";




		if(mysqli_query($con, $insert_sql) or die("database error: ". mysqli_error($con)))
		{
		//	$last_id = mysqli_insert_id($con);
			//$insert_sql1 = "INSERT INTO tbl_tasklist(id,type, action,user_type,user,datecreated,idassigned,status)
			//VALUES('','Sales Order', 'Added','".$type."','Unassigned','".$dateToday."','".$last_id."','Not yet started')";

		//	if(mysqli_query($con, $insert_sql1) or die("database error: ". mysqli_error($con)))
		//	{
				echo 1;
		//	}
		//	else
		//	{
		//		echo 0;
	//		}
		}
		else
		{
			echo 0;
		}

?>
