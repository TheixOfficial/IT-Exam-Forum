<?php
require 'header.php';
require 'includes/dbc.inc.php';
?>

    <table border="1" cellpadding="4" width="100%">
        <tr>
            <td>Forum</td>
            <td>Number of Topics</td>
            <td>Number of Replies</td>
            <td>Last Poster</td>
        </tr>
        <?php
        $query = mysqli_query($conn, 'SELECT * FROM main ORDER BY id DESC');
        while ($output1 = mysqli_fetch_assoc($query))
        {
        	echo '<tr>';
        	echo '<td><a href="topics.php?id='.$output1['id'].'">'.$output1['name'].'</a></td>';
        	echo '<td>'.$output1['topics'].'</td>';
        	echo '<td>'.$output1['replies'].'</td>';
        	if (empty($output1['lastposter']))
        		echo '<td>No Posts</td>';
        	else
        		echo '<td>'.$output1['lastposter'].' @ '.date('d-m-y G:i', $output1['lastpostdate']).'</td>';
        	echo'</tr>';
        }
        ?>
    </table>

<?php
require 'footer.php';
?>