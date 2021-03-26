<?php include('server.php') ?>
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
				<li><a href="home.php">Home</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
			</ul>
		</nav>
	</header>
<!-- Section where form to register is created -->
	<section class="home-hero parallax--bg">
		<div class="container">
			<form action="register.php" method="POST">
			<?php include('errors.php'); ?>
				<div class="container-form">
					<h1>Register</h1>
					<p>Please fill in this form to create an account.</p>
					<br>
					<label for="username"><b>Username</b></label>
					<input type="text" name="username" placeholder="e.g. JonDoe97" value="<?php echo $username; ?>" required>
					<label for="firstName"><b>First Name</b></label>
					<input type="text" name="firstname" placeholder="e.g. Jon" value="<?php echo $firstname; ?>" required>
					<label for="lastName"><b>Last Name</b></label>
					<input type="text" name="lastname" placeholder="e.g. Doe" value="<?php echo $lastname; ?>" required>
					<label for="email"><b>Email</b></label>
					<input type="email" name="email" placeholder="e.g. doejon97@gmail.com" value="<?php echo $email; ?>" required>
					<label for="password_1"><b>Password</b></label>
					<input type="password" name="password_1" placeholder="Password" required>
					<label for="password_2"><b>Repeat Password</b></label>
					<input type="password" name="password_2" placeholder="Repeat Password" required>
					<label for="email"><b>Account type</b></label>
					<br>
					<select name="type" type="text" value="<?php echo $type; ?>" required>
					<option value="">Select type</option>
					<option type="text" name="donor">Donor</option>
					<option type="text" name="fundraiser">Fundraiser</option>
					</select>
					<br>
					<p>Already registered? <a href="login.php">Login!</a></p>
					<br>
					<div class="clearfix">
						<button type="submit" name="reg_user" class="btn">Register!</button>
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
