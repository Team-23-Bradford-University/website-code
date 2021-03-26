<?php include('server.php') ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Creative Inc.</title>
<link href="css/style-login.css" rel="stylesheet" type="text/css">
</head>

<body>
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
	</div>
	<!-- Header includes navbar -->	
	<header>
		<nav>
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="">Login</a></li>
				<li><a href="register.php">Register</a></li>
			</ul>
		</nav>
	</header>
	<!-- Section that includes login form -->	
	<section class="home-hero parallax--bg">
		<form action="login.php" method="POST">
			<div class="container-form">
				<h1>Login</h1>
				<p>Enter details to login.</p>
				<?php include('errors.php'); ?>
				<br>
				<label for="email"><b>Email</b></label>
				<input type="email" name="email" placeholder="Enter Email" required>
				<label for="password"><b>Password</b></label>
				<input type="password" name="password" placeholder="Enter Password" required>
				<br>
				<p>Not registered? <a href="register.php">Register Now!</a></p>
				<br>
				<div class="clearfix">
					<button type="submit" name="login_user" class="btn">Login!</button>
				</div>
			</div>
		</form>
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
				<li><a href="staticpages/about.html">About us</a></li>
				<li><a href="staticpages/legal.html">Legal</a></li>
				<li><a href="staticpages/contact.html">Contact us</a></li>
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
