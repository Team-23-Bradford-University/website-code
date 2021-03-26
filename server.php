<?php
  session_start();
  // initializing variables
  $username = "";
  $firstname = "";
  $lastname = "";
  $email    = "";
  $type = "";
  $errors = array(); 

  // connect to the database
  $db = mysqli_connect('localhost', 'root', '', 'uz_project');

  // REGISTER USER
  if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $type = mysqli_real_escape_string($db, $_POST['type']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($firstname)) { array_push($errors, "First name is required"); }
    if (empty($lastname)) { array_push($errors, "Last name is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
    }
    if (empty($type)) { array_push($errors, "Account type is required"); }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // check if user already exists
      if ($user['username'] === $username) {
        array_push($errors, "Username already exists");
      }

      if ($user['email'] === $email) {
        array_push($errors, "email already exists");
      }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
      $password = md5($password_1);//encrypt the password before saving in the database

      //inserting data into databse
      $query = "INSERT INTO users (username, firstname, lastname, email, password, type) 
            VALUES('$username','$firstname','$lastname','$email', '$password','$type')";
      mysqli_query($db, $query);
      $_SESSION['username'] = $username;
      //message if user successfully registered
      $_SESSION['success'] = "Successfully registered! You can login now!";
      header('location: login.php');
    }
  }


  // LOGIN USER
  if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email)) {
      array_push($errors, "Email is required");
    }
    if (empty($password)) {
      array_push($errors, "Password is required");
    }
  // Checking for the errors
    if (count($errors) == 0) {
      // Password matching
      $password = md5($password);
      $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
      $results = mysqli_query($db, $query);
      //checking wether users is logged in as Donor or Fundraiser
      if (mysqli_num_rows($results) == 1) {
        $logged_in_user = mysqli_fetch_assoc($results);
        
        if ($logged_in_user['type'] == 'Donor') {
          $_SESSION['username'] = $username;
          $_SESSION['firstname'] = $firstname;
          $_SESSION['lastname'] = $lastname;
          $_SESSION['email'] = $email;
          $_SESSION['success'] = "You are now logged in";
          header('location: donor-home.php');

        }else if ($logged_in_user['type'] == 'Fundraiser'){
          $_SESSION['username'] = $username;
          $_SESSION['firstname'] = $firstname;
          $_SESSION['lastname'] = $lastname;
          $_SESSION['email'] = $email;
          $_SESSION['success'] = "You are now logged in";
          header('location: fundraiser-home.php');

        }else{
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: admin-page.php');
        }

      }else {
        array_push($errors, "Wrong email/password combination");
      }
    }
  }
  // Retrieving user information for profile
  function getProfile(){
    $sql = "SELECT * FROM users WHERE email = '" . $_SESSION['email'] . "';";

    $result = mysqli_query($GLOBALS['db'], $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
  }

  // Retrieving user funds for search page
  function getFunds(){
    $sql = "SELECT * FROM funds";

    $result = mysqli_query($GLOBALS['db'], $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
  }

  //Posting the start a fund form
  $fundname = "";
  $createdby = "";
  $reason = "";
  $startingamount = "";

  if (isset($_POST['submitfund'])) {
    // receive all input values from the form
    $fundname = mysqli_real_escape_string($db, $_POST['fundname']);
    $createdby = mysqli_real_escape_string($db, $_POST['createdby']);
    $reason = mysqli_real_escape_string($db, $_POST['reason']);
    $startingamount = mysqli_real_escape_string($db, $_POST['startingamount']);
    
    $fundsql = "INSERT INTO funds (fund_name, created_by, fund_reason, donated_amount) VALUES ('$fundname', '$createdby', '$reason', '$startingamount');";
    mysqli_query($db, $fundsql);
    $_SESSION['success-fund'] = "Successfully created fund!";
    $_SESSION['username'] = $username;
    header('location: start-fund.php');
  }

  //Posting the user donation to the right fundraiser
  $fund2donate = "";
  $updated_amount = "";

  if (isset($_POST['submit-donation'])) {
    // receive all input values from the form
    $fund2donate = mysqli_real_escape_string($db, $_POST['fund2donate']);
    $updated_amount = mysqli_real_escape_string($db, $_POST['updated_amount']);
    
    $donorsql = "UPDATE funds SET donated_amount = donated_amount + '" . $_POST['updated_amount'] . "' WHERE fund_name = '" . $_POST['fund2donate'] . "';";
    mysqli_query($db, $donorsql); 
    $_SESSION['username'] = $username;
    header('location: https://www.paypal.com/donate?token=0v1La7yD5iwnurtuJTRvdV5eOlos7R87Le0VOm95Ms6_ZIlW3nmrfR_WPdUVcmOOVN3x2K4MZma2aaJb');
  }




?>
