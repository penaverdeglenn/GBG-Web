<?php


//require_once __DIR__."/dbconfig.php";
//require_once "includes/dbconfig.php";
require_once __DIR__."/../includes/dbconfig.php";
function callDbCon()
{

//mysqli_connect(get_dbserver(), get_dbuser(), get_dbpassword()) or die (mysqli_error());
//mysqli_select_db(get_dbname()) or die(mysqli_error());
$con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}



}


function getTblData($loop,$tbl,$extraCondition,$extraCondition2)
{	$con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());
    $strSQL = "SELECT * FROM ".$tbl." where ".$extraCondition."".$extraCondition2."";

    $rs = mysqli_query($con,$strSQL) or die(mysqli_error($con));


    for($ctr=0;$ctr<$loop;$ctr++){
        $row=mysqli_fetch_array($rs,MYSQLI_ASSOC);
	}

    return $row;
    //to use this function to retrieve specific record, you may use the $extraCondition variable and fix the $loop to 1.
    //to use this function to retrieve all existing records record, leave the $extraCondition blank and use function getTblNumRows() to get the total number of loops needed.
    //this function returns an array..dont forget to include an index on usage.
	 mysqli_close($con);
}



function gettaskcount($user,$type)
{
    $con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());
	if($type == "Sales Associate")
	{
		 $strSQL = "SELECT * FROM tbl_tasklist WHERE status<>'Completed' AND (user='Unassigned' OR user=".$user.") ";
	}
	else
	{
		 $strSQL = "SELECT * FROM tbl_tasklist WHERE status<>'Completed' AND user=".$user."";
	}

    $sqlQuery = mysqli_query($con,$strSQL) or die(mysqli_error($con));
    $numRows = mysqli_num_rows($sqlQuery);
    mysqli_close($con);
    return $numRows;
}


function MaterialListDetails($id)
{
    if($id!="")
    {
    $con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());


    $strSQL = "SELECT * FROM tbl_material WHERE material_status='Active' AND material_id=".$id;

    $rs = mysqli_query($con,$strSQL) or die(mysqli_error($con));
    mysqli_close($con);

    $row=mysqli_fetch_array($rs,MYSQLI_ASSOC);

    return $row;
    }
}

function getDropdown($tbl,$cond,$param,$select){

                $con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());
                $result = "";
                $query = mysqli_query($con,"select * FROM ".$tbl." WHERE ".$cond. " ");

                mysqli_close($con);

                while($row = mysqli_fetch_array($query ,MYSQLI_ASSOC)) {
                $result .=  "<option ";
                $result .= " value='".$row[$param]."'>".$row[$select]."</option>";
                }

                return $result;
}


function getTblNumRows($tbl,$extraCondition)
{
    $con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());
    $strSQL = "SELECT * FROM ".$tbl." where ".$extraCondition."";
    $sqlQuery = mysqli_query($con,$strSQL);
    $numRows = mysqli_num_rows($sqlQuery);
    mysqli_close($con);
    return $numRows;
}

function getDropdownExist($tbl,$cond,$param,$select){

                $con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());
                $result = "";
                $query = mysqli_query($con,"select * FROM ".$tbl." WHERE ".$cond. " ");

                mysqli_close($con);

                while($row = mysqli_fetch_array($query ,MYSQLI_ASSOC)) {

				$numRows = getTblNumRows('tbl_salesorder','quotationID = '.$row['quotation_id'].'');
					if($numRows != 1)
					{
					$result .=  "<option ";
					$result .= " value='".$row[$param]."'>".$row[$select]."</option>";
					}
                }

                return $result;
}


function getDropdownselect($tbl,$cond,$param,$select){

                $con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());
                $result = "";
                $query = mysqli_query($con,"select * FROM ".$tbl." WHERE ".$cond. " ");
                mysqli_close($con);

                while($row = mysqli_fetch_array($query ,MYSQLI_ASSOC)) {
                $result .=  "<option selected";
                $result .= " value='".$row[$param]."'>".$row[$select]."</option>";
                }

                return $result;
}

function getDropdownuserassign($tbl,$cond,$param,$select,$memberid){

                $con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());
                $result = "";
                $query = mysqli_query($con,"select * FROM ".$tbl." WHERE ".$cond. " ");
                mysqli_close($con);

                while($row = mysqli_fetch_array($query ,MYSQLI_ASSOC)) {

					if($row['id'] != $memberid)
					{
						$result .=  "<option ";
						$result .= " value='".$row[$param]."'>".$row[$select]."</option>";
					}
                }

                return $result;
}


function logindetails(){
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
	$result = "";
    $result .=  '<li class="nav-item dropdown no-arrow">';
	$result .=  '<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"';
    $result .=  '       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
    $result .=  '       <span class="mr-2 d-none d-lg-inline text-gray-600 small">'. $fname .'</span>';
    $result .=  '       <img class="img-profile rounded-circle" src="pic/undraw_profile.svg">';
    $result .=  '    </a>';
    $result .=  '     <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">';
    $result .=  '       <a class="dropdown-item" href="#">';
    $result .=  '            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>';
    $result .=  '             Profile';
    $result .=  '        </a>';
    $result .=  '         <a class="dropdown-item" href="#">';
    $result .=  '            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>';
    $result .=  '            Settings';
                          $result .=  '        </a>';
                          $result .=  '        <div class="dropdown-divider"></div>';
                          $result .=  '        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">';
                          $result .=  '            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>';
                          $result .=  '            Logout';
                           $result .=  '       </a>';
                          $result .=  '    </div>';
                       $result .=  '   </li>';




  $result .=  ' <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">';
  $result .=  '     <div class="modal-dialog" role="document">';
  $result .=  '          <div class="modal-content">';
  $result .=  '             <div class="modal-header">';
  $result .=  '                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>';
  $result .=  '                <button class="close" type="button" data-dismiss="modal" aria-label="Close">';
  $result .=  '                    <span aria-hidden="true">×</span>';
  $result .=  '                </button>';
  $result .=  '            </div>';
  $result .=  '            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>';
  $result .=  '            <div class="modal-footer">';
  $result .=  '                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>';
  $result .=  '               <a class="btn btn-primary" href="../gbgv2/destroy.php">Logout</a>';
  $result .=  '            </div>';
  $result .=  '        </div>';
  $result .=  '    </div>';
  $result .=  ' </div>';



                return $result;
}


function sidebar(){
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
	$result = "";

	$result .=  '            <!-- Divider -->';
    $result .=  '        <hr class="sidebar-divider">';
    $result .=  '        <!-- Heading -->';
	$result .=  '		<div class="sidebar-heading">';
    $result .=  '            Sales';
    $result .=  '        </div>';
	$result .=  '<li class="nav-item">';
    $result .=  '            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">';
    $result .=  '            <i class="fas fa-fw fa-cog"></i>';
    $result .=  '            <span>Sales Inquiry</span>';
    $result .=  '            </a>';
    $result .=  '            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">';
    $result .=  '            <div class="bg-white py-2 collapse-inner rounded">';
    $result .=  '            <h6 class="collapse-header">Components:</h6>';
    $result .=  '            <a class="collapse-item" href="salesinquiry.php">Generate Sales Inquiry </a>';
    $result .=  '           <a class="collapse-item" href="salesinquiryview.php">Sales Inquiry History</a>';
    $result .=  '            </div>';
    $result .=  '            </div>';
	$result .=  '			</li>';
	$result .=  '<li class="nav-item">';
    $result .=  '            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">';
    $result .=  '            <i class="fas fa-fw fa-cog"></i>';
    $result .=  '            <span>Quotation</span>';
    $result .=  '            </a>';
    $result .=  '            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">';
    $result .=  '            <div class="bg-white py-2 collapse-inner rounded">';
    $result .=  '            <h6 class="collapse-header">Components:</h6>';
    $result .=  '            <a class="collapse-item" href="quotation.php">Generate Quotation</a>';
    $result .=  '           <a class="collapse-item" href="quotationlist.php">Quotation History</a>';
    $result .=  '            </div>';
    $result .=  '            </div>';
	 $result .=  '			</li>';
	$result .=  '<li class="nav-item">';
    $result .=  '            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">';
    $result .=  '            <i class="fas fa-fw fa-cog"></i>';
    $result .=  '            <span>Sales Order</span>';
    $result .=  '            </a>';
    $result .=  '            <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">';
    $result .=  '            <div class="bg-white py-2 collapse-inner rounded">';
    $result .=  '            <h6 class="collapse-header">Components:</h6>';
    $result .=  '            <a class="collapse-item" href="salesorder.php">Sales Order</a>';
    $result .=  '           <a class="collapse-item" href="salesorderlist.php">Sales Order History</a>';
    $result .=  '            </div>';
    $result .=  '            </div>';
	$result .=  '			</li>';
if($type =="Admin")
{
  $result .=  '<li class="nav-item">';
    $result .=  '            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFour">';
    $result .=  '            <i class="fas fa-fw fa-cog"></i>';
    $result .=  '            <span>Settings</span>';
    $result .=  '            </a>';
    $result .=  '            <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">';
    $result .=  '            <div class="bg-white py-2 collapse-inner rounded">';
    $result .=  '            <h6 class="collapse-header">Components:</h6>';
    $result .=  '            <a class="collapse-item" href="user.php">Users</a>';
    $result .=  '           <a class="collapse-item" href="userlist.php">Users List</a>';
    $result .=  '            </div>';
    $result .=  '            </div>';
  $result .=  '			</li>';
}

    return $result;
}

function getsalesinquiry()
{
    $con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());

    //$strSQL = "SELECT distinct a.itemid AS itemid,b.itemname AS itemname, b.uomid AS uomid, b.catid AS catid ";
    //$strSQL.= "FROM 10_bom a, 8_inventory b ";
    //$strSQL.= "WHERE a.status=1 AND b.status=1 AND a.itemid=b.id ORDER BY itemname" ;
    $strSQL = "SELECT * FROM tbl_sales_inquiry";

    $rs = mysqli_query($con,$strSQL) or die(mysqli_error($con));
    mysqli_close($con);

    return $rs;
}




function getquotation()
{
    $con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());

    //$strSQL = "SELECT distinct a.itemid AS itemid,b.itemname AS itemname, b.uomid AS uomid, b.catid AS catid ";
    //$strSQL.= "FROM 10_bom a, 8_inventory b ";
    //$strSQL.= "WHERE a.status=1 AND b.status=1 AND a.itemid=b.id ORDER BY itemname" ;
    $strSQL = "SELECT * FROM tbl_quotation";

    $rs = mysqli_query($con,$strSQL) or die(mysqli_error($con));
    mysqli_close($con);

    return $rs;
}



function getsalesorder()
{
    $con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());

    //$strSQL = "SELECT distinct a.itemid AS itemid,b.itemname AS itemname, b.uomid AS uomid, b.catid AS catid ";
    //$strSQL.= "FROM 10_bom a, 8_inventory b ";
    //$strSQL.= "WHERE a.status=1 AND b.status=1 AND a.itemid=b.id ORDER BY itemname" ;
    $strSQL = "SELECT * FROM tbl_salesorder";

    $rs = mysqli_query($con,$strSQL) or die(mysqli_error($con));
    mysqli_close($con);

    return $rs;
}

function getuserlist()
{
    $con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());

    //$strSQL = "SELECT distinct a.itemid AS itemid,b.itemname AS itemname, b.uomid AS uomid, b.catid AS catid ";
    //$strSQL.= "FROM 10_bom a, 8_inventory b ";
    //$strSQL.= "WHERE a.status=1 AND b.status=1 AND a.itemid=b.id ORDER BY itemname" ;
    $strSQL = "SELECT * FROM users";

    $rs = mysqli_query($con,$strSQL) or die(mysqli_error($con));
    mysqli_close($con);

    return $rs;
}



function getuserlistdata($id)
{
    $con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());

    //$strSQL = "SELECT distinct a.itemid AS itemid,b.itemname AS itemname, b.uomid AS uomid, b.catid AS catid ";
    //$strSQL.= "FROM 10_bom a, 8_inventory b ";
    //$strSQL.= "WHERE a.status=1 AND b.status=1 AND a.itemid=b.id ORDER BY itemname" ;
    $strSQL = "SELECT * FROM users WHERE id='".$id."'";

    $rs = mysqli_query($con,$strSQL) or die(mysqli_error($con));
    mysqli_close($con);

    return $rs;
}


function getsalesorderdata($id)
{
    $con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());

    //$strSQL = "SELECT distinct a.itemid AS itemid,b.itemname AS itemname, b.uomid AS uomid, b.catid AS catid ";
    //$strSQL.= "FROM 10_bom a, 8_inventory b ";
    //$strSQL.= "WHERE a.status=1 AND b.status=1 AND a.itemid=b.id ORDER BY itemname" ;
    $strSQL = "SELECT * FROM tbl_salesorder WHERE id='".$id."'";

    $rs = mysqli_query($con,$strSQL) or die(mysqli_error($con));
    mysqli_close($con);

    return $rs;
}

function gettasklist($user)
{
    $con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());

    //$strSQL = "SELECT distinct a.itemid AS itemid,b.itemname AS itemname, b.uomid AS uomid, b.catid AS catid ";
    //$strSQL.= "FROM 10_bom a, 8_inventory b ";
    //$strSQL.= "WHERE a.status=1 AND b.status=1 AND a.itemid=b.id ORDER BY itemname" ;
    //$strSQL = "SELECT * FROM tbl_tasklist WHERE status<>'Completed' AND (user='Unassigned' OR user=".$user.") ";
	$strSQL = "SELECT * FROM tbl_tasklist WHERE status<>'Completed' AND user_type='".$user."' ";
    $rs = mysqli_query($con,$strSQL) or die(mysqli_error($con));
    mysqli_close($con);

    return $rs;
}



function gettasklistsalesassoc($user)
{
    $con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());

    //$strSQL = "SELECT distinct a.itemid AS itemid,b.itemname AS itemname, b.uomid AS uomid, b.catid AS catid ";
    //$strSQL.= "FROM 10_bom a, 8_inventory b ";
    //$strSQL.= "WHERE a.status=1 AND b.status=1 AND a.itemid=b.id ORDER BY itemname" ;
    $strSQL = "SELECT * FROM tbl_tasklist WHERE status<>'Completed'";

    $rs = mysqli_query($con,$strSQL) or die(mysqli_error($con));
    mysqli_close($con);

    return $rs;
}


function gettasklistcompleted($user)
{
    $con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());

    //$strSQL = "SELECT distinct a.itemid AS itemid,b.itemname AS itemname, b.uomid AS uomid, b.catid AS catid ";
    //$strSQL.= "FROM 10_bom a, 8_inventory b ";
    //$strSQL.= "WHERE a.status=1 AND b.status=1 AND a.itemid=b.id ORDER BY itemname" ;
    //$strSQL = "SELECT * FROM tbl_tasklist WHERE status='Completed' AND (user='Unassigned' OR user=".$user.") ";
	$strSQL = "SELECT * FROM tbl_tasklist WHERE status='Completed' AND user_type='".$user."' ";
    $rs = mysqli_query($con,$strSQL) or die(mysqli_error($con));
    mysqli_close($con);

    return $rs;
}


function getUser($id){

                $con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());
                $query = mysqli_query($con,"select FIRST_NAME FROM users WHERE id=".$id." ") or die(mysqli_error($con));
                mysqli_close($con);

                $records = mysqli_fetch_array($query,MYSQLI_ASSOC);
                if($records){
                $result =  implode("|" , $records);
                }
                else
                {
                  $result = "";
                }

                return $result;
}


function getRecord($col,$tbl,$cond){

                $con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());
                $query = mysqli_query($con,"select ".$col." FROM ".$tbl." WHERE ".$cond. " ") or die(mysqli_error($con));
                mysqli_close($con);

                $records = mysqli_fetch_array($query,MYSQLI_ASSOC);
                if($records){
                $result =  implode("|" , $records);
                }
                else
                {
                  $result = "";
                }

                return $result;
}


function generateCode(){

    $unique =   FALSE;
    $length =   8;
   // $chrDb  =   array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','0','1','2','3','4','5','6','7','8','9');
    $chrDb  =   array('0','1','2','3','4','5','6','7','8','9');
    while (!$unique){

          $str = '';
          for ($count = 0; $count < $length; $count++){

              $chr = $chrDb[rand(0,count($chrDb)-1)];

              if (rand(0,1) == 0){
                 $chr = strtolower($chr);
              }
           //   if (3 == $count){
           //      $str .= '-';
           //   }
              $str .= $chr;
          }
          //$str .= "E".$chr;
          /* check if unique */
          callDbCon();
          $strSQL = "SELECT * FROM 00_users WHERE userscode = '".$str."' and userstatus = '1'";
          $sqlQuery = mysql_query($strSQL);
          $existingCode = mysql_num_rows($sqlQuery);
          mysql_close();
          if (!$existingCode){
             $unique = TRUE;
          }
    }
    return $str;
}


function generatePassword(){

    $unique =   FALSE;
    $length =   8;
    $chrDb  =   array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','0','1','2','3','4','5','6','7','8','9');
    //$chrDb  =   array('0','1','2','3','4','5','6','7','8','9');
    while (!$unique){

          $str = '';
          for ($count = 0; $count < $length; $count++){

              $chr = $chrDb[rand(0,count($chrDb)-1)];

              if (rand(0,1) == 0){
                 $chr = strtolower($chr);
              }
           //   if (3 == $count){
           //      $str .= '-';
           //   }
              $str .= $chr;
          }
          //$str .= "E".$chr;
          /* check if unique */
          callDbCon();
          $strSQL = "SELECT * FROM 00_users WHERE password = '".$str."' and userstatus = '1'";
          $sqlQuery = mysql_query($strSQL);
          $existingCode = mysql_num_rows($sqlQuery);
          mysql_close();
          if (!$existingCode){
             $unique = TRUE;
          }
    }
    return $str;
}



?>
