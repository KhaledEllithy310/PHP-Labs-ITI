<?php
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$room = $_POST['room'];
$ext = $_POST['ext'];
$image = $_FILES['image']['name'];
$target = "images/";

// Validate the form
$errors = [];
if (empty($name)) {
    $errors[] = "Name is required";
}
if (empty($email)) {
    $errors[] = "Email is required";
}
if (empty($password)) {
    $errors[] = "Password is required";
}
if (empty($room)) {
    $errors[] = "Room is required";
}
if (empty($image)) {
    $errors[] = "Image is required";
}

// Check the last ID in the file
$last_line = exec('tail -n 1 users.txt');
$last_line_array = explode(',', $last_line);
if (empty($last_line)) {
    $id = 0;
} else {
    $id = $last_line_array[0] + 1;
}

// Check if email is already taken
$handle = fopen('users.txt', 'r');
while (($line = fgets($handle)) !== false) {
    $line_array = explode(',', $line);
    if ($email == $line_array[2]) {
        $errors[] = "Email is already taken";
        break;
    }
}

// If there are errors, redirect back to the create page
if (count($errors) > 0) {
    $_SESSION['errors'] = $errors;
    header("Location: create.php");
    exit();
}

// If there are no errors, insert the new user into the database
unset($_SESSION['errors']);
$image = time() . '_' . $image; // Give image a unique name
$handle = fopen('users.txt', 'a'); // Open the file
fwrite($handle, ((int)$id + 1) . ',' . $name . ',' . $email . ',' . $password . ',' . $room . ',' . $ext . ',' . $image . "\n"); // Write the data to the file
move_uploaded_file($_FILES['image']['tmp_name'], $target . $image); // Upload the image with the unique name

// Redirect to the home page
header("Location: login.php");
exit();
