<?php
//Fetching Values from URL


require_once __DIR__."/allfunctions.php";


	$con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());




callDbCon();

$username = "Test";
$values = $_POST['values'];
$pieces4 = explode(",", $values);
$ctr = count($pieces4);
$dateToday = date('Y-m-d');
$sql = "INSERT INTO tbl_customer VALUES (null";
for ($c=0;$c<$ctr;$c++)
{
$sql .= ",'$pieces4[$c]'";
}
$sql .= ",'$dateToday','$username','Active')";
$result = mysqli_query($con,$sql);
if (!$result) {
    die('Invalid query: ' . mysqli_error($con));
    echo 0;
} else
{
	echo 1;
}