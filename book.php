<?php
  session_start();

	include("connection.php");
	include("functions.php");
    $user_data = check_login($con);
    if(!isset($_GET["loggedin"]))
    {
        header("Location: login.php");
        exit();
    }

    if(isset($_POST["Departure"]) && isset($_POST["City"]))
    {
        $username = validate($_SESSION["Username"]);
        $city = validate($_POST["City"]);
        $airport = validate($_POST["DepartureAirport"]);
        $departure = date('Y-m-d', strtotime(validate($_POST["Departure"])));
        $id = random_num(9);
        $query = "INSERT INTO BOOKINGS (Username, Destination, Departure, DepartureAirport, BookingID) VALUES ('$username', '$city', '$departure', '$airport', $id)";
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Japan</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="stylesheet1.css" type="text/css" charset="utf-8" />
		<link rel="stylesheet" href="stylesheet.css" type="text/css" charset="utf-8" />
		<link rel="stylesheet" href="main.css" type="text/css" charset="utf-8" />
        <link rel="stylesheet" href="flights.css" type="text/css" charset="utf-8" />
	</head>
	<body>
		<div id="top">
		<ul>
      <?php if(isset($_GET["loggedin"])) { ?>
        <li><h1><a class="li_h1" href="index.php?loggedin">JapanTravel.com</a></h1></li>
        <li><h2><a class="li account" href="account.php?loggedin">Account</a></h2></li>
        <li><h2><a class="li flights" href="flights.php?loggedin">Flights</a></h2></li>
        <li><h2 class="loggedin"><?php echo "Welcome " . $user_data["Username"]; ?></h2>
            <a class="li logout" href="index.php">Log Out</a>
        </li>
        <?php } else { ?>
          <li><h1><a class="li_h1" href="index.php">JapanTravel.com</a></h1></li>
          <li><h2><a class="li flights" href="flights.php">Flights</a></h2></li>
          <li><h2><a class="li login" href="login.php">Login</a></h2></li>
			    <li><h2><a class="li signup" href="signup.php">Sign up</a></h2></li>
        <?php } ?>
		</ul>
		</div>
	<div id="bottom">
       <?php 
            if(mysqli_query($con, $query))
            {
                ?><script>alert("Flight booked!")</script><?php
                header("Location: flights.php?loggedin");
                exit();
            }
       ?> 
    </div>
	</body>
</html>