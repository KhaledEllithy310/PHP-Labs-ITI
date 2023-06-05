<?php
$firstNameErr = $lastNameErr = $emailErr = $genderErr = "";
$firstName = $lastName = $email = $gender = "";


// Validate form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstName"])) {
        $firstNameErr = "First name is required";
    } else {
        $firstName = test_input($_POST["firstName"]);
    }

    // Validate Last Name
    if (empty($_POST["lastName"])) {
        $lastNameErr = "Last name is required";
    } else {
        $lastName = test_input($_POST["lastName"]);
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate Gender
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    // If form data is valid, store it in a file
    if (empty($firstNameErr) || empty($lastNameErr) || empty($emailErr) || empty($genderErr)) {
        $customer_data = array($firstName, $lastName, $email, $gender);
        $file_name = 'users.txt';
        $file = fopen($file_name, 'a');
        if ($file) {
            $line = implode("\t", $customer_data) . "\n"; // Separate fields with tabs and end line with a newline character
            fwrite($file, $line);
            fclose($file);
            header("Location: user_table.php");
            exit();
        } else {
            echo "Error opening file $file_name.";
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}
