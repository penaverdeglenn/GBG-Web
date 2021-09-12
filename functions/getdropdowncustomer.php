<?php
require_once __DIR__."/includes/headerincludes.php";
require_once __DIR__."/includes/dbconfig.php";
require_once __DIR__."/functions/allfunctions.php";


	callDbCon();
	//echo getDropdown('tbl_customer',"customer_status = 'Active'",'customer_id',"customer_company_name");
	

                $result = "";
                $query = mysql_query("select * FROM tbl_customer where customer_status='Active'");
                $numRows = mysql_num_rows($query);
				if(empty($numRows))
				{
					echo "<option value='none'>Select customer</option>";
				}
				else
				{
					echo "<option value='none'>Select customer</option>";
					while($row = mysql_fetch_array($query)) {
							echo "<option value=".$row['customer_id'].">".$row['customer_company_name']."</option>";
					}
				}
               mysql_close();
             
																	
?>

															