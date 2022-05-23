<?php 

session_start();

	include("connection.php");
	include("functions.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Japan</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="stylesheet1.css" type="text/css" charset="utf-8" />
		<link rel="stylesheet" href="stylesheet.css" type="text/css" charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="login.css">
	</head>
	<body>
		<div id="top">
		<ul>
			<li><h1><a class="li_h1" href="index.php">JapanTravel.com</a></h1></li>
            <li><h2><a class="li flights" href="flights.php">Flights</a></h2></li>
			<li><h2><a class="li login" href="login.php">Login</a></h2></li>
			<li><h2><a class="li signup" href="signup.php">Sign up</a></h2></li>
		</ul>
		</div>
        <div id="bottom">
            <form action="login_handle.php" method="post"><br>
                <?php if(isset($_GET["error"])) { ?>
                    <p class="error"><?php echo $_GET["error"] ?></p>
                <?php } ?>
                <label>Username</label>
                <input type="text" name="Username" placeholder="Username"><br>
                <label>Password</label>
                <input type="password" name="Password" placeholder="Password"><br>
                <input id="submit" type="submit" value="Sign up"><br>
            </form>
        </div>
	</body>
</html>