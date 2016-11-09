<?php 
function validate_name($name)
	{
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
  		{return true;}
  		else{return false;}
	}
function error1(){
 		return "Only alphabets are allowed";
	}

function validate_num($num)
	{
		if(!preg_match("/^[1-9]\d{9}$/", $num))
			{return true;}
		else{return false;}
	}

function validate_num1($num)
	{
		if(!preg_match("/^[0-9]{6}$/", $num))
			{return true;}
		else{return false;}
	}
?>