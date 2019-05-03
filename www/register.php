<?php 
	session_start();

	if (isset($_SESSION['id'])) {
		ob_start();
		header('Location: index.php');
		ob_end_flush();
		die();
    }
    
    include('dbc.php');
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
				<form action="register.php" method="POST">
  	                <?php include('errors.php'); ?>
                    <div>
                        <input type="text" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
                    </div>
                    <div>
                        <input type="text" name="screenName" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Screen Name">
                    </div>
                    <div>
                        <input type="text" name="firstName" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name">
                    </div>
                    <div>
                        <input type="text" name="lastName" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name">
                    </div>
                    <div>
                        <input type="text" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                    </div>
                    <div>
                        <input type="password" name="pwd1" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div>
                        <input type="password" name="pwd2" id="exampleInputPassword1" placeholder="Repeat Password">
                    </div>
                    <button type="submit" name='reg_user'>Register</button>
                </form>
                <p>Already have an account <a href="login.php">Login</a></p>
			</div>
		</div>
	</body>
</html>