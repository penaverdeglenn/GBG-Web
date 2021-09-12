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



$strSQL = "SELECT * FROM users where USERNAME='".$username."'";
$sqlQuery = mysqli_query($con,$strSQL);
	if (!$sqlQuery)
	{
			die('Error: ' . mysqli_error($con));
	}
$numRows = mysqli_num_rows($sqlQuery);
mysqli_close($con);
if($numRows > 0){

echo 2;

}
else
{

echo 0;
}
?>
