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
        <link rel="stylesheet" href="account.css" type="text/css" charset="utf-8" />
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
                $user = $_SESSION["Username"];
                $query = "SELECT * FROM USERS WHERE Username='$user'";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);
                ?>
                <table>
                    <tr>
                        <th colspan=2>Account Information</th>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><?php echo $row["Username"];?></td>
                    </tr>
                    <tr>
                        <td>First Name</td>
                        <td><?php echo $row["FirstName"];?></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><?php echo $row["LastName"];?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $row["Email"];?></td>
                    </tr>
                    <tr>
                        <td>Billing</td>
                        <td><?php echo $row["Billing"];?></td>
                    </tr>
                </table>
            <?php
                $user = $_SESSION["Username"];
                $query = "SELECT * FROM BOOKINGS WHERE Username='$user'";
                $result = mysqli_query($con, $query);
            ?>
            <table>
                <tr>
                    <th>Date of Departure</th>
                    <th>Airport</th>
                    <th>Departure</th>
                    <th>Booking ID</th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row["Departure"];?></td>
                        <td><?php echo $row["DepartureAirport"];?></td>
                        <td><?php echo $row["Destination"];?></td>
                        <td><?php echo $row["BookingID"];?></td>
                    </tr>
                <?php } ?>
            </table>
    </div>
	</body>
</html>