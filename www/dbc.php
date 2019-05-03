<?php

$username = "";
$screenName = "";
$firstName = "";
$lastName = "";
$email    = "";
$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'anarchydb');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $screenName = mysqli_real_escape_string($db, $_POST['screenName']);
  $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $pwd1 = mysqli_real_escape_string($db, $_POST['pwd1']);
  $pwd2 = mysqli_real_escape_string($db, $_POST['pwd2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($screenName)) { array_push($errors, "Screen name is required"); }
  if (empty($firstName)) { array_push($errors, "First name is required"); }
  if (empty($lastName)) { array_push($errors, "Last name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($pwd1)) { array_push($errors, "Password is required"); }
  if ($pwd1 != $pwd2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$pwd = hash($pwd1, PASSWORD_BCRYPT);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, screenName, firstName, lastName, email, password) 
  			  VALUES('$username', '$screenName', '$firstName', '$lastName', '$email', '$pwd')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    
	ob_start();
    header('location: index.php');
	ob_end_flush();
	die();
  }
}