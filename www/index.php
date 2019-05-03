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
	</head>
	<body>
		<p>test</p>
	</body>
</html