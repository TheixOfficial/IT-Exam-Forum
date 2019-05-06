<?php
require 'header.php';
require 'includes/dbc.inc.php';
ob_start();
$id = (int) $_GET['id'];
if ($id < 1) {
	header('Location: forum.php');
	exit();
}
ob_end_clean();
?>
<table border="1" cellpadding="4" width="100%">
<?php
$query1 = mysqli_query($conn, "SELECT * FROM replies WHERE topicid = $id ORDER BY id ASC");
$query2 = mysqli_num_rows($query1);
$output2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM topics WHERE id = $id"));
echo '<tr><td>'.$output2['subject'].' - Posted by <strong>'.$output2['poster'].'</strong></td>';
echo '<td>'.date('D-m-y G:i', $output2['date']).'</td></tr>';
echo '<tr><td colspan="2">'.$output2['message'].'</td></tr>';
echo '<tr><td colspan="2">&nbsp;</td></tr>';
if ($query2 == 0) {
	echo '<td colspan="2">No Replies</td>';
}
else {
	while ($output = mysqli_fetch_assoc($query1)) {
		echo '<tr><td>'.$output['subject'].'</td><td>'.date('d-m-y G:i', $output['date']).'</td></tr>';
		echo '<tr><td colspan="2">'.$output['message'].'<br /><strong>Posted by '.$output['poster'].'</strong></td></tr>';
	}
}
?>
</table>
<hr />
<form name="form1" id="form1" method="post" action="forumpost.php?type=replies&id=<?php echo $id; ?>">
Add Reply<br />
<input name="subject" id="subject" type="text" placeholder="Reply Subject" /><br />
<textarea name="message" id="message" cols="30" rows="5" placeholder="Message"></textarea><br />
<input type="submit" name="submit" id="submit" value="Submit" />
</form>
</body>
</html>