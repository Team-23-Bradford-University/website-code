<?php include('server.php') ?>
<?php 
// Starting the session, to use and
// store data in session variable

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
<title>Fund Raising Inc.</title>
<link href="css/styles.css" rel="stylesheet" type="text/css">
</head>

<body>

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

<?php if (isset($_SESSION['success'])) : ?>
    <div class="error-success" >
        <h3>
            <?php
                echo $_SESSION['success']; 
                unset($_SESSION['success']);
            ?>
        </h3>
    </div>
<?php endif ?>


<section class="home-hero parallax--bg">
	<div class="container">
		<span class="title parallax--box">Fundraise for a political change</span><br>
		<span class="title parallax--box">Make a change now!</span><br>
		<span class="title parallax--box">Welcome
		<?php
        if(isset($_SESSION['username'])){
            $result = getProfile();
            if($result){
                while ($row = mysqli_fetch_assoc($result)){ ?>
			<span data-id="<?php echo $row['id']; ?>"><?php echo $row['firstname']; ?></span>
		<?php
                }

            }
        }
    	?>
		</h1>
		<a href="start-fund.php" class="button button-accent">Start a fund!</a>
	</div>
</section>

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

<footer>
	<div class="container">
		<div class="col-3">
			<p>Copyright © 2021 Team 23, All rights reserved.</p>
		</div>
	</div>
	<nav>
		<ul>
			<li><a href="about-fundraiser.html">About us</a></li>
			<li><a href="legal-fundraiser.html">Legal</a></li>
			<li><a href="contact-fundraiser.html">Contact us</a></li>
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
