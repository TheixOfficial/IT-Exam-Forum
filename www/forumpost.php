<?php
require 'header.php';
require 'includes/dbc.inc.php';
ob_start();
$id = (int) $_GET['id'];
$type = $_GET['type'];
if ($id < 1 || ($type != 'replies' && $type != 'topics')) {
	header('Location: forum.php');
	exit();
}
ob_end_clean();

function clear($message) {
	if(!get_magic_quotes_gpc()) {
		$message = addslashes($message);
    }
	$message = strip_tags($message);
	$message = htmlentities($message);
	return trim($message);
}
if ($_POST['submit']) {
	$message = clear($_POST['message']);
	$subject = clear($_POST['subject']);
	$poster = clear($_SESSION['screenName']);
	$date = time();
	if($type == 'topics') {
		$query = mysqli_fetch_assoc(mysqli_query($conn, "SELECT topics FROM main WHERE id = '$id'"));
		$topics = $query['topics'] + 1;
		mysqli_query($conn, "UPDATE main SET topics = '$topics', lastposter = '$poster', lastpostdate = '$date' WHERE id = '$id'");
		mysqli_query($conn, "INSERT INTO topics (id , forumid , message , subject, poster, date, lastposter, lastpostdate, replies) VALUES ('', '$id', '$message', '$subject','$poster', '$date', '', '', '0')");
		echo 'Topic Posted.<a href="topics.php?id='.$id.'">View Topic</a>';
	}
	else
	{
		$query = mysqli_fetch_assoc(mysqli_query($conn, "SELECT replies, forumid FROM topics WHERE id = '$id'"));
		$replies = $query['replies'] + 1;
		$id2 =  $query['forumid'];
		mysqli_query($conn, "UPDATE topics SET replies = '$replies', lastposter = '$poster', lastpostdate = '$date' WHERE id = '$id'");
		$query = mysqli_fetch_array(mysqli_query($conn, "SELECT replies FROM main WHERE id = '$id2'"));
		$replies = $query['replies'] + 1;
		mysqli_query($conn, "UPDATE main SET replies = '$replies', lastposter = '$poster', lastpostdate = '$date' WHERE id = '$id2'");
		mysqli_query($conn, "INSERT INTO replies (id , topicid, message, subject, poster, date) VALUES ('', '$id', '$message', '$subject','$poster', '$date')");
		echo 'Reply Posted.<a href="replies.php?id='.$id.'">View Reply</a>';

	}
}
require 'footer.php';
?>
