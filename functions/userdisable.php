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

		$dateToday = date('Y-m-d');
		$useridval = $_POST['useridval'];
		//$reason = $_POST['reason'];

		$strSQL = "UPDATE users SET STATUS='Inactive' WHERE id=".$useridval;
		if(mysqli_query($con, $strSQL) or die("database error: ". mysqli_error($con)))
		{
				echo 1;
		}
		else
		{
			echo 0;
		}


?>
