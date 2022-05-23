<?php

function check_login($con)
{
	if(isset($_SESSION['Username']))
	{
		$username = $_SESSION['Username'];
		$query = "SELECT * FROM USERS WHERE Username = '$username' LIMIT 1";
		$result = mysqli_query($con, $query);
		if(mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
}

function validate($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
 }

 function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		$text .= rand(0,9);
	}

	return $text;
}