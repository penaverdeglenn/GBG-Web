<?php session_start();
//Fetching Values from URL


require_once __DIR__."/allfunctions.php";
$con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());


if(array_key_exists('itemarrayinventory',$_SESSION) && !empty($_SESSION['itemarrayinventory'])) {

	$itemarray = $_SESSION['itemarrayinventory'];
}
$materialdata = "";
$ctr2 = count($itemarray);
//echo $itemarray;
for ($c=0;$c<$ctr2;$c++)
{
//$materialdata = $itemarray[$c];
//$materialdata = implode(",",$itemarray[$c]);
}

$materialdata = implode(",",$_SESSION['itemarrayinventory']);
//echo $materialdata;

$username = "Test";
$customer = $_POST['customer'];
$product = $_POST['product'];
$mfgprocess = $_POST['mfgprocess'];
$files = $_FILES['file']['name'];
//echo $customer;
//echo $product;
$mfgprocessdata = explode(",",$mfgprocess);
//echo $mfgprocessdata;
$ctr = count($mfgprocessdata);
$dateToday = date('Y-m-d');

for ($c=0;$c<$ctr;$c++)
{
//echo $mfgprocessdata[$c];
}
$status = "Added";
$images_name ="";
$uploaded_images = array();
foreach($_FILES['file']['name'] as $key=>$val){
	$upload_dir = "../img/";
	$upload_file = $upload_dir.$_FILES['file']['name'][$key];
	$filename = $_FILES['file']['name'][$key];
	if(move_uploaded_file($_FILES['file']['tmp_name'][$key],$upload_file)){
		$uploaded_images[] = $upload_file;
		//$insert_sql = "INSERT INTO uploads(id, file_name, upload_time)
		//	VALUES('', '".$filename."', '".time()."')";
		//mysqli_query($con, $insert_sql) or die("database error: ". mysqli_error($con));
		$images_name =$images_name.",".$filename;
	}
}
		$insert_sql = "INSERT INTO tbl_sales_inquiry(sales_inquiry_id, customer_id, product_id,material_name,product_image,product_manufacturing_process,salesinquiry_status,product_added_by,product_added_date,assignedto,approver)
			VALUES(NULL,'".$customer."', '".$product."','".$materialdata."','".$images_name."','".$mfgprocess."','Added', '".$username."', '".$dateToday."','Unassigned','Unassigned')";
		if(mysqli_query($con, $insert_sql) or die("database error: ". mysqli_error($con)))
		{
			$last_id = mysqli_insert_id($con);
			$insert_sql1 = "INSERT INTO tbl_tasklist(id,type, action,user_type, user,datecreated,idassigned,status)
			VALUES(NULL,'Sales Inquiry', 'Approval','Sales Associate','Unassigned','".$dateToday."','".$last_id."','Not yet started')";

			if(mysqli_query($con, $insert_sql1) or die("database error: ". mysqli_error($con)))
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
