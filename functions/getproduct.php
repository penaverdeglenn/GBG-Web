<?php
require_once __DIR__."/allfunctions.php";


				$customerID = $_POST['customerid'];
				$con = mysqli_connect(get_dbserver(),get_dbuser(),get_dbpassword(),get_dbname());
                $result = "";
                $query = mysqli_query($con,"select * FROM tbl_product where product_status='Active' and customer_id=".$customerID." ");
                $numRows = mysqli_num_rows($query);
				if(empty($numRows))
				{
					echo "<option value='none'>Select Product</option>";
				}
				else
				{
					echo "<option value='none'>Select Product</option>";
					while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
							echo "<option value=".$row['product_id'].">".$row['product_name']."</option>";
					}
				}
               mysqli_close($con);
?>

