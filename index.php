<?php
  session_start();

	include("connection.php");
	include("functions.php");
    $user_data = check_login($con);
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
		<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img class="images" src="tokyo.jpg">
  <div class="text">Tokyo</div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img class="images" src="yokohama.jpg">
  <div class="text">Yokohama</div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img class="images" src="osaka.png">
  <div class="text">Osaka</div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img class="images" src="nagoya.jpg">
  <div class="text">Nagoya</div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img class="images" src="sapporo.jpg">
  <div class="text">Sapporo</div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img class="images" src="kyoto.jpg">
  <div class="text">Kyoto</div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img class="images" src="chiba.jpg">
  <div class="text">Chiba</div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img class="images" src="nagasaki.jpg">
  <div class="text">Nagasaki</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>   
</div>
		
		
		<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
</div>
	</body>
</html>