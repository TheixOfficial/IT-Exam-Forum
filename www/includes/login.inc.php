<?php
if (isset($_POST['login-submit'])) {

    require 'dbc.inc.php';

    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    if (empty($username) || empty($pwd)) {
        header("Location: ../login.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE username=? OR email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $username, $username);
            mysqli_stmt_execute($stmt);
            $results = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($results)) {
                $pwdCheck = password_verify($pwd, $row['pwd']);
                if ($pwdCheck == false) {
                    header("Location: ../login.php?error=invalidinput");
                    exit();
                }
                else if($pwdCheck == true) {
                    session_start();
                    $_SESSION['id'] = $row['uid'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['screenName'] = $row['screenname'];
                    $_SESSION['firstName'] = $row['firstname'];
                    $_SESSION['lastName'] = $row['lastname'];
                    $_SESSION['email'] = $row['email'];

                    header("Location: ../index.php");
                    exit();
                }
                else {
                    header("Location: ../login.php?error=invalidinput");
                    exit();
                }
            }
            else {
                header("Location: ../login.php?error=invalidinput");
                exit();
            }
        }
    }

}
else {
    header("Location: ../login.php");
    exit();
}