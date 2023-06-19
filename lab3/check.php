<?php
session_start();

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Validate the form
$errors = [];
if (empty($email)) {
    $errors[] = "Email is required";
}
if (empty($password)) {
    $errors[] = "Password is required";
}

// Handle form errors
if (count($errors) > 0) {
    $_SESSION['login_errors'] = $errors;
    header("Location: login.php");
    exit();
}

// Check if the user exists
$handle = fopen('users.txt', 'r');
while (($line = fgets($handle)) !== false) {
    $line_array = explode(',', $line);
    if ($email == $line_array[2] && $password == $line_array[3]) {
        $_SESSION['user'] = $line_array;
        header("Location: index.php");
        exit();
    }
}

// Handle login errors
$errors[] = "Invalid email or password";
$_SESSION['login_errors'] = $errors;
header("Location: login.php");
exit();
