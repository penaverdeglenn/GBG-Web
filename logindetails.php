<?php session_start();

require_once __DIR__."/includes/headerincludes.php";
require_once __DIR__."/includes/dbconfig.php";
require_once __DIR__."/functions/allfunctions.php";



if(empty($_SESSION["itemarrayinventory"]))
{
    $itemarray = array();
}
else
{
  $itemarray = $_SESSION["itemarrayinventory"];
}

if(empty($_SESSION["MEMBER_ID"]) && empty($_SESSION["TYPE"]))
{
    $itemarray = array();
}
else
{
  $memberid = $_SESSION['MEMBER_ID'];
  $type = $_SESSION['TYPE'];
}





//before we store information of our member, we need to start first the session
	

	//create a new function to check if the session variable member_id is on set
	function logged_in() {
		return isset($_SESSION['MEMBER_ID']);
        
	}
	//this function if session member is not set then it will be redirected to index.php
	function confirm_logged_in() {
		if (!logged_in()) { 	

?>
			<script type="text/javascript">
				window.location = "pages/login.php";
			</script>
<?php
		}
	}
	confirm_logged_in();
	
?>

<?php
          
                      echo  '<li class="nav-item dropdown no-arrow">';
						
						
                         echo  '   <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"';
                           echo  '       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                           echo  '       <span class="mr-2 d-none d-lg-inline text-gray-600 small">$type</span>';
                           echo  '       <img class="img-profile rounded-circle" src="pic/undraw_profile.svg">';
                          echo  '    </a>';
                        
                         echo  '     <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"';
                         echo  '         aria-labelledby="userDropdown">';
                           echo  '       <a class="dropdown-item" href="#">';
                          echo  '            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>';
                         echo  '             Profile';
                          echo  '        </a>';
                         echo  '         <a class="dropdown-item" href="#">';
                          echo  '            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>';
                          echo  '            Settings';
                          echo  '        </a>';
                          echo  '        <div class="dropdown-divider"></div>';
                          echo  '        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">';
                          echo  '            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>';
                          echo  '            Logout';
                           echo  '       </a>';
                          echo  '    </div>';
                       echo  '   </li>';




  echo  ' <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">';
   echo  '     <div class="modal-dialog" role="document">';
  echo  '          <div class="modal-content">';
   echo  '             <div class="modal-header">';
    echo  '                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>';
    echo  '                <button class="close" type="button" data-dismiss="modal" aria-label="Close">';
    echo  '                    <span aria-hidden="true">×</span>';
    echo  '                </button>';
    echo  '            </div>';
    echo  '            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>';
    echo  '            <div class="modal-footer">';
    echo  '                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>';
     echo  '               <a class="btn btn-primary" href="../gbgv2/destroy.php">Logout</a>';
    echo  '            </div>';
    echo  '        </div>';
    echo  '    </div>';
   echo  ' </div>';
	
	

?>