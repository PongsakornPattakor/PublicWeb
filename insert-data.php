<?php
session_start();
require('dbconnect.php');

$errors = array();

$fname = mysqli_real_escape_string($connect, $_POST['fname']);
$lname = mysqli_real_escape_string($connect, $_POST['lname']);
$gender = mysqli_real_escape_string($connect, $_POST['gender']);
$age =  mysqli_real_escape_string($connect, $_POST['age']);
$username = mysqli_real_escape_string($connect, $_POST['username']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$password = mysqli_real_escape_string($connect, $_POST['password']);
$confirm_password = mysqli_real_escape_string($connect, $_POST['confirm_password']);

// Input check
if (empty($fname)) {
    array_push($errors, "Fullname is required");
}
if (empty($lname)) {
    array_push($errors, "Lastname is required");
}
if (empty($gender)) {
    array_push($errors, "Gender is required");
}
if (empty($age)) {
    array_push($errors, "Age is required");
}
if (empty($username)) {
    array_push($errors, "Username is required");
}
if (empty($email)) {
    array_push($errors, "E-mail is required");
}
if (empty($password)) {
    array_push($errors, "Password is required");
}
if (empty($confirm_password)) {
    array_push($errors, "You need to confirm the password");
}
if ($password !== $confirm_password) {
    array_push($errors, "Two password do not match");
}

// Username check
$user_check = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
$sql_check = mysqli_query($connect, $user_check);

$result_check = mysqli_fetch_object($sql_check);
if ($result_check->username === $username) {
    array_push($errors, "This username already exists");
}
if ($result_check->email === $email) {
    array_push($errors, "This email already exists");
}

// Errors count
if (count($errors) == 0) {
    $passwordEnc = password_hash($password, PASSWORD_DEFAULT);

    $insert_data = "INSERT INTO users (fname,lname,gender,age,username,email,password) VALUES ('$fname','$lname','$gender',$age,'$username','$email','$passwordEnc')";
    $result_insert = mysqli_query($connect, $insert_data);

    $_SESSION['username'] = $username;
    header("location:index.php");
    exit();
} else {
    $_SESSION['error'] = implode("<br>", $errors);
    header("location:register-form.php");
    exit();
}
