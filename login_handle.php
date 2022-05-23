<?php 

session_start(); 

include "connection.php";
include "functions.php";

if (isset($_POST['Username']) && isset($_POST['Password'])) {
    $username = validate($_POST['Username']);
    $password = validate($_POST['Password']);
    if (empty($username)) {
        header("Location: login.php?error=User Name is required");
        exit();
    }else if(empty($password)){
        header("Location: login.php?error=Password is required");
        exit();
    }else{
        $query = "SELECT * FROM USERS WHERE Username='$username' AND password='$password'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['Username'] === $username && $row['Password'] === $password) {
                echo "Logged in!";
                $_SESSION['Username'] = $row['Username'];
                header("Location: index.php?loggedin");
                exit();
            }else{
                header("Location: login.php?error=Incorect User name or password");
                exit();
            }
        }else{
            header("Location: login.php?error=Incorect User name or password");
            exit();
        }
    }
}else{
    header("Location: login.php?uhoh");
    exit();
}