<?php
//Getting the categories
$con = mysqli_connect("localhost","root","","furniture_shop");
function getcats(){
	
			global $con;

			$get_cats = "select * from category";

			$run_cats = mysqli_query($con,$get_cats);

			while($row_cats = mysqli_fetch_array($run_cats))
			{
				$cat_ID = $row_cats['ID'];
				$cat_title = $row_cats['Category_Name'];

				echo "<li><a href='category.php?category_id=$cat_ID' >$cat_title</a>";
				
				print('<div class="dropdown-menu">');
				print('<ul>') ;

				getsubcats($cat_ID);

				echo "</ul></div>";
			}
			
} 

function getsubcats($cat_ID)
	{
		global $con;

		$get_subcats = "select * from sub_categories where categoryID=$cat_ID";

		$run_subcats = mysqli_query($con,$get_subcats);
		while ($row_subcats=mysqli_fetch_array($run_subcats)) 
		{	
			$category_id = $row_subcats['categoryID'];
			$sub_categoryId = $row_subcats['ID'];
			$subcat_name = $row_subcats['sub_category'];

			echo "<li><a href='category.php?sub_category_id=$sub_categoryId&category_id=$category_id'>$subcat_name</a></li>";
		}
	}

	function generateuid()
	{
		global $con;
		$rowSQL1 = mysqli_query($con, "SELECT count( uid ) AS count FROM `customers`;" );
		$row1 = mysqli_fetch_array($rowSQL1);
		$count = $row1['count'];
		
		if($count==0)
		{
			return 1 ;
		}
		else
		{
			$rowSQL = mysqli_query($con, "SELECT MAX( uid ) AS max FROM `customers`;" );
			$row = mysqli_fetch_array( $rowSQL );
			$largestNumber = $row['max'];
			return $largestNumber+1;
		}
	}

?>