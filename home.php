<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Fund Raising Inc.</title>
<link href="css/styles.css" rel="stylesheet" type="text/css">
</head>

<body>

<header>
	<nav>
		<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="login.php">Login</a></li>
			<li><a href="register.php">Register</a></li>
		</ul>
	</nav>
</header>

<section class="home-hero parallax--bg">
	<div class="container">
		<h1 class="title parallax--box">Fund raising for a political change <span>for companies who make great stuff</span>
		</h1>
		<a href="register.php" class="button button-accent">Join now!</a>
	</div>
</section>

<div class="container">
	<section class="home-about">

		<div class="home-about-textbox parallax--box">
			<h1>Who we are</h1>
			<p>Sit by the fire drink water out of the faucet hide head under blanket so no one can see cat is love, cat is life. Knock dish off table eating always hungry so favor packaging over toy. </p>
			<p><strong>Rub face on owner.</strong> Peer out window, chatter at birds, lure them to mouth. Chase ball of string eat a plant, kill a hand, i am the best have secret plans.</p>
		</div>

	</section>
</div>

<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
</div>

<section class="cta">
	<div class="container">
		<h1 class="title title-cta">Like what you see?
			 <span>Then what are you waiting for?</span>
		</h1>
		<a href="register.php" class="button button-dark">Join us</a>
	</div>
</section>

<footer>
	<div class="container">
		<div class="col-3">
			<p>Copyright © 2021 Team 23, All rights reserved.</p>
		</div>
	</div>
	<nav>
		<ul>
			<li><a href="staticpages/about.html">About us</a></li>
			<li><a href="staticpages/about.html">Legal</a></li>
			<li><a href="staticpages/about.html">Contact us</a></li>
		</ul>
	</nav>
</footer>

<!-- Javascript for scrolling effect -->	
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

		<script src="js/parallax.js"></script>
</body>
</html>
