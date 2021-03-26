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
<link href="css/legal.css" rel="stylesheet" type="text/css">
</head>

<body>
<!-- Header includes navbar -->
    <header>
        <nav>
            <ul>
                <li><a href="donor-home.php">Home</a></li>
                <li><a href="search-donor.php">Search</a></li>
                <li><a href="profile-donor.php">Profile</a></li>
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
					<h1 class="title parallax--box">Search for fundraisers!</h1>
				</div>
			</form>
		</div>
	</section>

    <div class="container-topbar"> 
            <div class="grid-container">
            <div class="grid-item">Name of fund</div>
            <div class="grid-item">Created by</div>
            <div class="grid-item">Fund reason</div>
            <div class="grid-item">Amount raised</div>
            <div class="grid-item"><input placeholder="Search fund!">Search</input></div>
        </div>
    </div>

    <?php
        if(isset($_SESSION['username'])){
            $result = getFunds();

            if($result){

                while ($row = mysqli_fetch_assoc($result)){ ?>

                <div class="container-topbar"> 
                    <div class="grid-container-data">
                        <div class="grid-item-bottom"><label data-id="<?php echo $row['id']; ?>"><?php echo $row['fund_name']; ?></label><br></div>
                        <div class="grid-item-bottom"><label data-id="<?php echo $row['id']; ?>"><?php echo $row['created_by']; ?></label><br></div>
                        <div class="grid-item-bottom"><label data-id="<?php echo $row['id']; ?>"><?php echo $row['fund_reason']; ?></label><br></div>
                        <div class="grid-item-bottom"><label data-id="<?php echo $row['id']; ?>"><?php echo $row['donated_amount']; ?></label><br></div>
						<div class="grid-item-bottom"><button><a class="donation-button" href="start-donation.php">Donate!</a></button></div>
                    </div>
                </div>
                
            <?php
                }

            }
        }
        
    ?>

    

<!-- Footer of the website -->
	<footer>
		<div class="container">
			<div class="col-3">
				<p>Copyright © 2021 Team 23, All rights reserved.</p>
			</div>
		</div>
		<nav>
			<ul>
				<li><a href="about-donor.html">About us</a></li>
				<li><a href="legal-donor.html">Legal</a></li>
				<li><a href="contact-donor.html">Contact us</a></li>
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
