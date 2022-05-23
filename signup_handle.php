<?php
  session_start();

	include("connection.php");
	include("functions.php");

    if(isset($_POST["Username"]))
    {
        $username = validate($_POST["Username"]);
        $firstName = validate($_POST["FirstName"]);
        $lastName = validate($_POST["LastName"]);
        $email = validate($_POST["Email"]);
        $billing = validate($_POST["Billing"]);
        $password = validate($_POST["Password"]);
        $confirm = validate($_POST["ConfirmPassword"]);
        if(!empty($username) || !empty($firstName) || !empty($lastName) || !empty($email) || !empty($email) 
        || !empty($billing) || !empty($confirm)) {
            if($password == $confirm) {
                $query = "INSERT INTO USERS (Username, FirstName, LastName, Email, Billing, Password) VALUES ('$username', '$firstName', '$lastName', '$email', '$billing', '$password')";
                if(mysqli_query($con, $query)) {
                    header("Location: login.php?");
                    exit();
                }
            } else {
                header("Location: signup.php?error=Password not matched");
                exit();
            }
        } else {
            header("Location: signup.php?error=Missing text fields");
            exit();
        }
    }
?>