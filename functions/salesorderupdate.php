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

$soID = $_POST['soID'];
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



$insert_sql = "UPDATE tbl_salesorder SET
POnumber='".$ponum."'
,POdate='".$podate."'
,FormType='".$formtype."'
,bagqty='".$bagqty."'
,bagwidth='".$bagwidth."'
,baglength='".$baglength."'
,baggusset='".$baggusset."'
,bagsealportion='".$bagsealportion."'
,bagpcsperbundle='".$bagpcsperbundle."'
,bagothers='".$bagothers."'
,bagremarks='".$bagremarks."'
,bagspecialinstructions='".$bagspecinstruction."'
,datecreated='".$dateTodaydateToday."'
,usercreated='".$memberid."'
 WHERE id=".$soID;


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



		$insert_sql = "UPDATE tbl_salesorder SET
		POnumber='".$ponum."'
		,POdate='".$podate."'
		,FormType='".$formtype."'
		,rollsubstrate='".$rollsubstratesize."'
		,rollqty='".$rollqty."'
		,rollnoofouts='".$rollnoofouts."'
		,rollkgs='".$rollkgs."'
		,rollslittingwidth='".$rollslittingwidth."'
		,rollmeters='".$rollmeters."'
		,rollrepeatlength='".$rollrepeatlength."'
		,rollwindingdirection='".$rollwindingdirection."'
		,rollnoofsplice='".$rollnoofsplice."'
		,rolltapetouse='".$rolltapetouse."'
		,rollremarks='".$rollremarks."'
		,rollspecialinstructions='".$rollspecialinstructions."'
		,datecreated='".$dateToday."'
		,usercreated='".$memberid."'
		 WHERE id=".$soID;


}







		if(mysqli_query($con, $insert_sql) or die("database error: ". mysqli_error($con)))
		{
			$last_id = mysqli_insert_id($con);
			$insert_sql1 = "INSERT INTO tbl_tasklist(id,type, action,user_type,user,datecreated,idassigned,status)
			VALUES('','Sales Order', 'Added','".$type."','Unassigned','".$dateToday."','".$last_id."','Not yet started')";

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
