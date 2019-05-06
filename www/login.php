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
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
	</head>

	<body>
		<div class="loginContainer">
			<div class="loginHeader">
				<h2>Login</h2>
			</div>
			<div class="loginContent">
			<?php
				if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyfields") {
                        echo '<p>Fill in all fields</p>';
					}
					else if ($_GET['error'] == "invalidinput") {
                        echo '<p>Incorrect username or password</p>';
					}
				}
			?>
				<form action="includes/login.inc.php" method="post">
                    <div>
                        <input type="text" name="username" placeholder="Username/Email">
                        <input type="password" name="pwd" placeholder="Password">
                    </div>
                    <button type="submit" name="login-submit">Login</button>
                </form>
                <p>Don't have an account yet? <a href="register.php">Register</a></p>
			</div>
		</div>
	</body>
</html>