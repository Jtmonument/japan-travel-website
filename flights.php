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
        <ul>
            <?php
                $query = "SELECT * FROM DESTINATIONS";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_assoc($result)) {
            ?>
                <li>
                    <div>
                        <h2 class="dest" <?php echo "style='background:url(\"".strtolower($row["City"]).".jpg\") center;'" ?>>
                        <?php echo $row["City"] ?>
                    </h2>
                    <form action="book.php?loggedin" method="post">
                        <div>
                        <input id="opt" list="airports" name="DepartureAirport">
                            <datalist id="airports">
                                <option value="Kansai International Airport">
                                <option value="Tokyo International Airport">
                                <option value="Narita International Airport">
                                <option value="Osaka International Airport">
                                <option value="Chūbu Centrair International Airport">
                            </datalist>
                            <input id="date" type="date" name="Departure" value="" placeholder="<?php echo date('Y-m-d'); ?>">
                            <input hidden type="text" name="City" value="<?php echo $row["City"]?>">
                        </div>
                        <input id="submit" type="submit" value="Book Flight">
                    </form>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
	</body>
</html>