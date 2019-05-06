<?php
if (isset($_POST['register-submit'])) {
    
    require 'dbc.inc.php';

    $username = $_POST['username'];
    $screenName = $_POST['screenName'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwd-repeat'];

    if (empty($username) || empty($screenName) || empty($firstName) || empty($lastName) || empty($email) || empty($pwd) || empty($pwdRepeat)) {
        header("Location: ../register.php?error=emptyfields");
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../register.php?error=invalidUN");
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $screenName)) {
        header("Location: ../register.php?error=invalidSN");
        exit();
    }
    else if (!preg_match("/^[a-zA-Z]*$/", $firstName)) {
        header("Location: ../register.php?error=invalidFN");
        exit();
    }
    else if (!preg_match("/^[a-zA-Z]*$/", $lastName)) {
        header("Location: ../register.php?error=invalidLN");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.php?error=invalidmail");
        exit();
    }
    else if ($pwd !== $pwdRepeat) {
        header("Location: ../register.php?error=pwdcheck");
        exit();
    }
    else {
        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../register.php?error=usertaken");
                exit();
            }
            else {
                $sql = "INSERT INTO users (username, screenname, firstname, lastname, email, pwd) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../register.php?error=sqlerror");
                    exit();
                }
                else {
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ssssss", $username, $screenName, $firstName, $lastName, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../register.php?register=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: ../register.php");
    exit();
}