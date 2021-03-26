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
<title>Fund Raising Inc.</title>
<link href="css/profile.css" rel="stylesheet" type="text/css">
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
<!-- Section with profile details -->
<section class="home-hero parallax--bg">
        <div class="container-form">

    <?php
        if(isset($_SESSION['username'])){
            $result = getProfile();

            if($result){

                while ($row = mysqli_fetch_assoc($result)){ ?>

            <h1>Profile</h1>
            <p>Your details</p>
            <br>
            <label for="username"><b>Username</b></label>
            <br>
            <br>
            <label data-id="<?php echo $row['id']; ?>"><?php echo $row['username']; ?></label><br>
            <br>
            <br>
            <label for="firstName"><b>First Name</b></label>
            <br>
            <br>
            <label data-id="<?php echo $row['id']; ?>"><?php echo $row['firstname']; ?></label><br>
            <br>
            <br>
            <label for="lastName"><b>Last Name</b></label>
            <br>
            <br>
            <label data-id="<?php echo $row['id']; ?>"><?php echo $row['lastname']; ?></label><br>
            <br>
            <br>
            <label for="email"><b>Email</b></label>
            <br>
            <br>
            <label data-id="<?php echo $row['id']; ?>"><?php echo $row['email']; ?></label><br>
            <br>
            <br>
            <label for="email"><b>Account type</b></label>
            <br>
            <br>
            <label data-id="<?php echo $row['id']; ?>"><?php echo $row['type']; ?></label><br>
            <br>
            <br>
        <?php
                }

            }
        }
    ?>
        </div>
</section>
<!-- Page footer -->
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
        crossorigin="anonymous">
    </script>

    <script src="js/parallax.js"></script>
</body>
</html>
