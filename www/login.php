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
				<form action="loginUser.php" method="POST">
                    <div>
                        <input type="text" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username/email">
                    </div>
                    <div>
                        <input type="password" name="pwd" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <button type="submit">Login</button>
                </form>
                <p>Don't have an account yet? <a href="register.php">Register</a></p>
			</div>
		</div>
	</body>
</html>