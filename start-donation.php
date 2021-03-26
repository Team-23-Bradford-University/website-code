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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/donation-form.css" rel="stylesheet" type="text/css">
    <title>Creative Inc.</title>
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
    <section class="home-hero parallax--bg">
	    <div class="container">
        <div class="wrapper">
          <h2>Payment Form</h2>
          <form method="POST" action="start-donation.php">
            <div class="input-box"> 
              <h4>Select fund to donate to</h4> 
              <div class="input-box">
                <select name="fund2donate" type="text">
                <?php
                  if(isset($_SESSION['username'])){
                    $result = getFunds(); 

                    if($result){

                      while ($row = mysqli_fetch_assoc($result)){ ?>

                      <option><label data-id="<?php echo $row['id']; ?>"><?php echo $row['fund_name']; ?></option>

                <?php
                      }
                    }
                  }
                ?>
                </select>
              </div>
              <h4>Amount</h4> 
              <div><input class="name" name="updated_amount" type="text" placeholder="donation amount" required/></div>
              <div class="input-group">
                <div class="input-box"><button name="submit-donation" type="submit">PAY NOW</button></div>
              </div>
            </div>
          </form>
        </div>
      </div>
	  </section>
<!-- Footer of the website -->
    <footer>
		<div class="container">
			<div class="col-3">
				<p>Copyright © 2021 Team 23</p>
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