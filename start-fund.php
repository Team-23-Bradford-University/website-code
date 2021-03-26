<?php include('server.php') ?>
<?php
// If the session variable is empty, this 
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after loggin out
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Creative Inc.</title>
<link href="css/style-registration.css" rel="stylesheet" type="text/css">
</head>

<body>
<!-- Header includes navbar -->
<header>
        <nav>
            <ul>
                <li><a href="fundraiser-home.php">Home</a></li>
                <li><a href="search-fundraiser.php">Search</a></li>
                <li><a href="profile-fundraiser.php">Profile</a></li>
                <?php  if (isset($_SESSION['username'])) : ?>
                <li><a href="home.php?logout='1'" style="color: #db2e2e;">logout</a></li>
                <?php endif ?>
            </ul>
        </nav>
    </header>

<!-- Section where form to register is created -->
	<section class="home-hero parallax--bg">
		<div class="container">
			<form action="start-fund.php" method="POST">
				<div class="container-form">
					<h1>Start your fund!</h1>
					<p>Please fill in the details to post your fund.</p>
					<br>
					<label for="fundname"><b>Name of fund</b></label>
					<input type="text" name="fundname" placeholder="e.g. Fund4politicalChange" required>
					<label for="createdby"><b>Create by</b></label>
					<input type="text" name="createdby" placeholder="e.g. Jon" required>
					<label for="reason"><b>Reason</b></label>
					<input type="text" name="reason" placeholder="e.g. For my company" required>
                    <label for="startingamount"><b>Donation starting amount</b></label>
					<input type="text" name="startingamount" value="£0" required>
					<div class="clearfix">
						<button type="submit" name="submitfund" class="btn">Post fund!</button>
					</div>
				</div>
			</form>
		</div>
	</section>
<!-- Footer of the website -->
	<footer>
		<div class="container">
			<div class="col-3">
				<p>Copyright © 2021 Team 23, All rights reserved.</p>
			</div>
		</div>
		<nav>
			<ul>
				<li><a href="about.html">About us</a></li>
				<li><a href="legal.html">Legal</a></li>
				<li><a href="contact.html">Contact us</a></li>
			</ul>
		</nav>
	</footer>

<!-- Javascript for scrolling effect -->	
	<script
		src="https://code.jquery.com/jquery-2.2.4.min.js"
		integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
		crossorigin="anonymous">
	</script>

	<script src="js/parallax.js"></script>
</body>
</html>
