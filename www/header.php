<?php 
	session_start();

	if (!isset($_SESSION['id'])) {
		ob_start();
		header('Location: login.php');
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
		<div class="nav">
            <div class="logo">
                <a href="#">
                    <img src="img/logo.png" alt="logo">
                </a>
            </div>
            <div class="pull-left">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="forum.php">Forum</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </div>
            <div class="pull-right">
			    <p class="right-elements">Logged in as <?php echo($_SESSION['username'])?></p>
			    <form action="includes/logout.inc.php" method="post">
			    	<button class="right-elements" type="submit" name="logout-submit">Logout</button>
                </form>
            </div>
		</div>