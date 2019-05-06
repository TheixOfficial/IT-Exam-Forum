<?php
require 'header.php'
?>

    <div class="main">
        <div class="profile-info">
            <h1>Profile Information</h1>
            <hr>
            <p>Username:    <?php echo($_SESSION['username'])?></p>
            <p>Screen Name: <?php echo($_SESSION['screenName'])?></p>
            <p>First Name:  <?php echo($_SESSION['firstName'])?></p>
            <p>Last Name:  <?php echo($_SESSION['lastName'])?></p>
            <p>Email:  <?php echo($_SESSION['email'])?></p>
        </div>
    </div>

<?php
require 'footer.php'
?>