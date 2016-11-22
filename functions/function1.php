<?php
 function generateuid()
	{
		$rowSQL = mysql_query( "SELECT MAX( uid ) AS max FROM `customers`;" );
		$row = mysql_fetch_array( $rowSQL );
		$largestNumber = $row['max'];
		return $largestNumber+1;
	}
?>