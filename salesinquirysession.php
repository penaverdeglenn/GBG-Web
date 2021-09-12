<?php
session_start();
if(empty($_SESSION['itemarrayinventory']))
{
   $itemchecker = 0;
}
else if(isset($_SESSION['itemarrayinventory']) && !empty($_SESSION['itemarrayinventory']))
{
    $itemchecker = 1;
}

if(array_key_exists('itemarrayinventory',$_SESSION) && !empty($_SESSION['itemarrayinventory'])) {
    echo 1;
	$itemarray = $_SESSION['itemarrayinventory'];
}
else
{
	echo 0;
	$itemarray = array();
}
//echo $itemchecker;
    
		
	

//for($a=0;$a<count($itemarray);$a++)
//{
// echo $itemarray[$a];
//}	
//echo $itemchecker;
    
 ?>