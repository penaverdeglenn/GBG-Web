<?php session_start();
require_once __DIR__."/functions/allfunctions.php";
$con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());





if(isset($_POST['submitSIEdit']))
{		

    $_cust_id = $_SESSION['cust_id'];
    $_sales_id = $_SESSION['sales_id'];
    $si_customer_rep = $_POST['si_customer_rep'];
    $si_customer_email = $_POST['si_customer_email'];
    $si_customer_contact_num = $_POST['si_customer_contact_num'];
    $si_customer_address=$_POST['si_customer_address'];
    $tmp_name = $_FILES["fileToUpload"]["tmp_name"];
    //echo $fileData;
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }
  
  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
  
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      $images_name =",".$_FILES["fileToUpload"]["name"];
      echo $images_name;
    } else {
      echo "Sorry, there was an error uploading your file.";
    }

    //echo $db;
    //$insert = mysqli_query($db,"UPDATE tbl_customer SET customer_representative VALUES ('$fullname') WHERE ID=1");
    echo "UPDATE tbl_customer SET customer_representative = '$si_customer_rep' WHERE customer_id=1";
  
    $update_sql = "UPDATE tbl_customer SET customer_representative = '$si_customer_rep',
                                           customer_email ='$si_customer_email',
                                           customer_contact_no ='$si_customer_contact_num',
                                           customer_address = '$si_customer_address'
                                            WHERE customer_id='$_cust_id'";
		if(mysqli_query($con, $update_sql) or die("database error: ". mysqli_error($con)))
		{
			echo "success";
		}
		else
		{
			echo "failed";
		}
        $update_sql = "UPDATE tbl_sales_inquiry SET product_image = '$images_name'
                                                WHERE sales_inquiry_id='$_sales_id'";
        if(mysqli_query($con, $update_sql) or die("database error: ". mysqli_error($con)))
        {
        echo "success";
        }
        else
        {
        echo "failed";
        }
        }
?>
<!--<script type="text/javascript">
			alert("You've Update Employee Successfully.");
			window.location = "salesinquiryview.php";
		</script>-->
