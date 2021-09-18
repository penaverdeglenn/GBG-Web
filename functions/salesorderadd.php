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


$quotationID = $_POST['qidr'];
$salesinquiryID = $_POST['salesinquiryid'];
$customer = $_POST['custid'];
$product = $_POST['productid'];
$formtype = $_POST['formtype'];
$ponum = $_POST['ponum'];
$podate = $_POST['podate'];
$dateToday = date('Y-m-d');
$status = "Added";

if($formtype =="bag_form")
{

$bagsubstrate = $_POST['bagsubstrate'];
$bagqty = $_POST['bagqty'];
$bagwidth = $_POST['bagwidth'];
$baglength = $_POST['baglength'];
$baggusset = $_POST['baggusset'];
$bagsealportion = $_POST['bagsealportion'];
$bagpcsperbundle = $_POST['bagpcsperbundle'];
$bagothers = $_POST['bagothers'];
$bagremarks = $_POST['bagremarks'];
$bagspecinstruction = $_POST['bagspecinstruction'];

$insert_sql = "INSERT INTO tbl_salesorder(id,salesorderID,quotationID,productID,salesinquiryID,POnumber,POdate,FormType,status,usercreated,userchecker,userrecieved,datecreated,bagsubstrate,bagqty,bagwidth,baglength,baggusset,bagsealportion,bagpcsperbundle,bagothers,bagremarks,bagspecialinstructions)
VALUES(NULL,'".$ponum."','".$quotationID."', '".$product."','".$salesinquiryID."','".$ponum."','".$podate."','".$formtype."', '".$status."', '".$memberid."','Unassigned','Unassigned','".$dateToday."','".$bagsubstrate."','".$bagqty."','".$bagwidth."','".$baglength."','".$baggusset."','".$bagsealportion."','".$bagpcsperbundle."','".$bagothers."','".$bagremarks."','".$bagspecinstruction."')";

}

elseif($formtype =="roll_form")
{

$rollsubstratesize = $_POST['rollsubstratesize'];
$rollqty = $_POST['rollqty'];
$rollnoofouts = $_POST['rollnoofouts'];
$rollkgs = $_POST['rollkgs'];
$rollslittingwidth = $_POST['rollslittingwidth'];
$rollmeters = $_POST['rollmeters'];
$rollrepeatlength = $_POST['rollrepeatlength'];
$rollpcs = $_POST['rollpcs'];
$rollwindingdirection = $_POST['rollwindingdirection'];
$rollnoofsplice = $_POST['rollnoofsplice'];
$rolltapetouse = $_POST['rolltapetouse'];
$rollremarks = $_POST['rollremarks'];
$rollspecialinstructions = $_POST['rollspecialinstructions'];

$insert_sql = "INSERT INTO tbl_salesorder(id,salesorderID,quotationID,productID,salesinquiryID,POnumber,POdate,FormType,status,usercreated,userchecker,userrecieved,datecreated,rollsubstrate,rollqty,rollnoofouts,rollkgs,rollslittingwidth,rollmeters,rollrepeatlength,rollpcs,rollwindingdirection,rollnoofsplice,rolltapetouse,rollremarks,rollspecialinstructions)
		VALUES(NULL,NULL,'".$quotationID."', '".$product."','".$salesinquiryID."','".$ponum."','".$podate."','".$formtype."', '".$status."', '".$memberid."','Unassigned','Unassigned','".$dateToday."','".$rollsubstratesize."','".$rollqty."','".$rollnoofouts."','".$rollkgs."','".$rollslittingwidth."','".$rollmeters."','".$rollrepeatlength."','".$rollpcs."','".$rollwindingdirection."','".$rollnoofsplice."','".$rolltapetouse."','".$rollremarks."','".$rollspecialinstructions."')";

}







		if(mysqli_query($con, $insert_sql) or die("database error: ". mysqli_error($con)))
		{
			$last_id = mysqli_insert_id($con);
			$insert_sql1 = "INSERT INTO tbl_tasklist(id,type, action,user_type,user,datecreated,idassigned,status)
			VALUES(NULL,'Sales Order', 'Added','".$type."','Unassigned','".$dateToday."','".$last_id."','Not yet started')";

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
