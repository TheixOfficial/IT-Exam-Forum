<?php 
	session_start();

	if (isset($_SESSION['id'])) {
		ob_start();
		header('Location: index.php');
		ob_end_flush();
		die();
    }
?>

<html>
	<head>
		<title>Anarchy Forum</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
	</head>

	<body>
		<div class="loginContainer">
			<div class="loginHeader">
				<h2>Register</h2>
			</div>
			<div class="loginContent">
            <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyfields") {
                        echo "<p>Fill in all fields</p>";
                    }
                    else if ($_GET['error'] == "invalidUN") {
                        echo "<p>Invalid Username <br> Username must not include special characters</p>";
                    }
                    else if ($_GET['error'] == "invalidSN") {
                        echo "<p>Invalid Screen Name <br> Screen Name must not include special characters</p>";
                    }
                    else if ($_GET['error'] == "invalidFN") {
                        echo "<p>Invalid First Name <br> First Name must only consist of letters</p>";
                    }
                    else if ($_GET['error'] == "invalidLN") {
                        echo "<p>Invalid Last Name <br> Last Name must only consist of letters</p>";
                    }
                    else if ($_GET['error'] == "invalidmail") {
                        echo "<p>Invalid Email <br> Type a valid Email</p>";
                    }
                    else if ($_GET['error'] == "pwdcheck") {
                        echo "<p>Invalid passwords <br> Passwords don't match</p>";
                    }
                    else if ($_GET['error'] == "usertaken") {
                        echo "<p>Username Taken <br> Username is already taken</p>";
                    }
                }
                else if (isset($_GET['register'])) {
                    if ($_GET['register'] == "success") {
                        echo "<p>Successfully registered</p>";
                    }
                }
            ?>
				<form action="includes/register.inc.php" method="POST">
                    <div>
                        <input type="text" name="username" placeholder="Username">
                        <input type="text" name="screenName" placeholder="Screen Name">
                        <input type="text" name="firstName" placeholder="First Name">
                        <input type="text" name="lastName" placeholder="Last Name">
                        <input type="text" name="email" placeholder="Email">
                        <input type="password" name="pwd" placeholder="Password">
                        <input type="password" name="pwd-repeat" placeholder="Repeat Password">
                    </div>
                    <button type="submit" name='register-submit'>Register</button>
                </form>
                <p>Already have an account <a href="login.php">Login</a></p>
			</div>
		</div>
	</body>
</html>