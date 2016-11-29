<?php

$con = mysqli_connect("localhost","root","","furniture_shop");

function getcats_category()
	{
		global $con;

			$get_cats = "select * from category";

			$run_cats = mysqli_query($con,$get_cats);

			while($row_cats= mysqli_fetch_array($run_cats))
			{
				$cat_ID = $row_cats['ID'];
				$cat_title = $row_cats['Category_Name'];

				echo "<li><a href='category.php?category_id=$cat_ID'>$cat_title</a>";
				echo '<span class="down"></span> ';
				echo "<ul>";
				getsubcats_category($cat_ID);
				echo "</ul>";
								
			}	
	}
function getsubcats_category($cat_ID)
	{
		global $con;

		$get_subcats = "select * from sub_categories where categoryID=$cat_ID";

		$run_subcats = mysqli_query($con,$get_subcats);
		while ($row_subcats=mysqli_fetch_array($run_subcats)) 
		{
			$sub_categoryID = $row_subcats['ID'];
			$subcat_name = $row_subcats['sub_category'];

			echo "<li><a href='category.php?sub_category_id=$sub_categoryID&category_id=$cat_ID'>$subcat_name</a></li>";
		}
	}

	function getcats_category1()
	{
		global $con;

			$get_cats = "select * from category";

			$run_cats = mysqli_query($con,$get_cats);

			while($row_cats= mysqli_fetch_array($run_cats))
			{
				$cat_ID = $row_cats['ID'];
				$cat_title = $row_cats['Category_Name'];
				echo "$cat_title";
			}
		}
?>