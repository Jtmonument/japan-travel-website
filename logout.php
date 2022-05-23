<?php

session_start();

if(isset($_SESSION['Username']))
{
	unset($_SESSION['Username']);
	mysqli_close($con);
}

header("Location: index.php");
die;