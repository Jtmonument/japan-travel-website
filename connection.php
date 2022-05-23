<?php

$localhost = "localhost";
$username = "root";
$password = "toor";
$database = "japan_travel";

if(!$con = mysqli_connect($localhost, $username, $password, $database))
{
    die("Connection failed!");
}