<?php
session_start();
require('dbconnect.php');

$errors = array();

$email = $_POST['email'];
$password = $_POST['password'];

// Check input box
if (empty($email) && empty($password)) {
    array_push($errors, "Please fill your Email and Password");
} else if (empty($email)) {
    array_push($errors, "Email is required");
} else if (empty($password)) {
    array_push($errors, "Password is required");
}

// If input box was filled
if (count($errors) == 0) {
    $user_check = "SELECT * FROM users WHERE email = '$email'";
    $sql_user_check = mysqli_query($connect, $user_check);
    $userVer = mysqli_fetch_object($sql_user_check);

    if (mysqli_num_rows($sql_user_check) == 0) {
        array_push($errors, "Email or Password is wrong. Please try again!");
    } else {
        // If password corrects
        if (password_verify($password, $userVer->password)) {
            $_SESSION['username'] = $userVer->username;
            $_SESSION['success'] = "login successfully";
            header("location:index.php");
            exit();
        } else {
            array_push($errors, "Password is wrong");
        }
    }
}

if (count($errors) > 0) {
    $_SESSION['error'] = implode("<br>", $errors);
    header("location:login-form.php");
    exit();
}
