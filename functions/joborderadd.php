<?php session_start();
//Fetching Values from URL


require_once __DIR__."/allfunctions.php";
$con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());


if(empty($_SESSION["MEMBER_ID"]) && empty($_SESSION["TYPE"]) && empty($_SESSION["FIRST_NAME"]))
{

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



$jobordermaterialqty = implode(",",$_SESSION['joborderitemqty']);
$jobordermaterialid = implode(",",$_SESSION['joborderitemarrayinventory']);

$dateToday = date('Y-m-d');
//echo $materialdata;
$joborderIDNUM = $_POST['IDJO'];
$salesorderID = $_POST['salesorderID'];
$productid = $_POST['productid'];
$sid = $_POST['sid'];
$ponumber = $_POST['ponumber'];
$sodate = $_POST['sodate'];
$jodate = $_POST['jodate'];
$jodeadline = $_POST['jodeadline'];
$qtytype = $_POST['qtytype'];
$joborderqty = $_POST['joborderqty'];
$joborderremarks = $_POST['joborderremarks'];


$extrusionsubstratesize = $_POST['extrusionsubstratesize'];
$extrutionqty = $_POST['extrutionqty'];
$extrutionmaterialblend = $_POST['extrutionmaterialblend'];
$extrusionremarks = $_POST['extrusionremarks'];
$chkextrusion = $_POST['chkextrusion'];


$printingsubstratesize = $_POST['printingsubstratesize'];
$printingqty = $_POST['printingqty'];
$printingwindingdirection = $_POST['printingwindingdirection'];
$chkprint = $_POST['chkprint'];


$laminationsubstratesize = $_POST['laminationsubstratesize'];
$laminationadhesive = $_POST['laminationadhesive'];
$laminationkg = $_POST['laminationkg'];
$laminationremarks = $_POST['laminationremarks'];
$chklaminate = $_POST['chklaminate'];



$slittingsubstratesize = $_POST['slittingsubstratesize'];
$slittingqty = $_POST['slittingqty'];
$slittingnoofouts = $_POST['slittingnoofouts'];
$slittingwidth = $_POST['slittingwidth'];
$slittingrepeatlength = $_POST['slittingrepeatlength'];
$slittingwindingdirection = $_POST['slittingwindingdirection'];
$slittingmaxnumofsplices = $_POST['slittingmaxnumofsplices'];
$slittingtapestouse = $_POST['slittingtapestouse'];
$slittingremarks = $_POST['slittingremarks'];


$cutandbagsubstratesize = $_POST['cutandbagsubstratesize'];
$cutandbagqty = $_POST['cutandbagqty'];
$cutandbagwidth = $_POST['cutandbagwidth'];
$cutandbaglength = $_POST['cutandbaglength'];
$cutandbaggusset = $_POST['cutandbaggusset'];
$cutandbagsealposition = $_POST['cutandbagsealposition'];
$cutandbagpcsbundles = $_POST['cutandbagpcsbundles'];
$cutandbagothers = $_POST['cutandbagothers'];
$cutandbagremarks = $_POST['cutandbagremarks'];



$status = "Added";

		$insert_sql = "INSERT INTO tbl_joborder(id,jobordernum,saleinquiryid,salesorder,productid,ponumber,salesorderdate,joborderdate,joborderdeadline,joborderqty,joborderqtytype,joborderremarks,jobordermaterialid,jobordermaterialqty
		,extrusionsubsize,extrusionqty,extrusionmaterialblending,extrusionprocess,extrusionremarks
	  ,printingsubsize,printingqty,printingprocess,printingwindingdirection
	  ,laminationsubsize,laminationprocess,laminationadhesive,laminationkg,laminationremarks
	  ,slittingsubsize,slittingqty,slittingnoofouts,slittingwidth,slittingrepeatlength,slittingwindingdirection,slittingmaxsplice,slittingtapestouse,slittingremarks
	  ,cutbagsubsize,cutbagqty,cutbagwidth,cutbaglength,cutbaggusset,cutbagsealposition,cutbagpcsbundle,cutbagothers,cutbagremarks
	  ,joborderpreparedby,datecreated,preparedbydate,joborderstatus)
			VALUES(NULL,'".$joborderIDNUM."', '".$sid."','".$salesorderID ."','".$productid."','".$ponumber."','".$sodate."', '".$jodate."', '".$jodeadline."', '".$joborderqty."', '".$qtytype."', '".$joborderremarks."', '".$jobordermaterialid."', '".$jobordermaterialqty."'
			, '".$extrusionsubstratesize."', '".$extrutionqty."', '".$extrutionmaterialblend."', '".$chkextrusion."', '".$extrusionremarks."'
		  , '".$printingsubstratesize."', '".$printingqty."', '".$chkprint."', '".$printingwindingdirection."'
		  , '".$laminationsubstratesize."', '".$chklaminate."', '".$laminationadhesive."','".$laminationkg."','".$laminationremarks."'
		  , '".$slittingsubstratesize."', '".$slittingqty."', '".$slittingnoofouts."', '".$slittingwidth."', '".$slittingrepeatlength."', '".$slittingwindingdirection."', '".$slittingmaxnumofsplices."', '".$slittingtapestouse."', '".$slittingremarks."'
		  , '".$cutandbagsubstratesize."', '".$cutandbagqty."', '".$cutandbagwidth."', '".$cutandbaglength."', '".$cutandbaggusset."', '".$cutandbagsealposition."', '".$cutandbagpcsbundles."', '".$cutandbagothers."', '".$cutandbagremarks."'
		  , '".$memberid."', '".$dateToday."', '".$dateToday."', '".$status."')";
		if(mysqli_query($con, $insert_sql) or die("database error: ". mysqli_error($con)))
		{
			$last_id = mysqli_insert_id($con);
			$insert_sql1 = "INSERT INTO tbl_tasklist(id,type, action,user_type, user,datecreated,idassigned,status)
			VALUES(NULL,'Job Order', 'Checking','Sales Associate','Unassigned','".$dateToday."','".$last_id."','Not yet started')";

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
