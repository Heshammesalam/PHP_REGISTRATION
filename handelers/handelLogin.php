<?php
session_start();
include '../core/functions.php';
include '../core/validation.php';
$errors = [];

if (checkRequestMethod('POST') && checkPostInput('email')) {
    // sanitize input
    foreach ($_POST as $key => $value) {
        $$key = sanitizeInput($value);
    }
    // validate email
    if (!requiredValue($email)) {
        $errors[] = 'email is required';
    } elseif (!minValue($email, 3)) {
        $errors[] = 'email must be at least 3 characters';
    } elseif (!maxValue($email, 25)) {
        $errors[] = 'email must be smaller than 25 characters';
    } elseif (!emailValue($email)) {
        $errors[] = 'you must write a valid email';
    }
    // validate password
    if (!requiredValue($password)) {
        $errors[] = 'password is required';
    }

    if (empty($errors)) {
        // Hash the user's input password
        $hashedPassword = sha1($password);
        // Read users.csv file
        $file = fopen('../data/users.csv', 'r');
        $userFound = false;
        // Iterate through each row in the CSV file
        while (($data = fgetcsv($file)) !== false) {
            $csvName = $data[0];
            $csvEmail = $data[1];
            $csvPassword = $data[2];
            if ($email === $csvEmail && $hashedPassword === $csvPassword) {
                $userFound = true;
                $_SESSION['auth'] = [$email,$csvName];
                fclose($file);
                // Redirect to the index page
                header("Location: ../index.php");
                exit();
            }
        }

        fclose($file);

        if (!$userFound) {
            $errors[] = 'Invalid email or password';
            $_SESSION['errors'] = $errors;
            header("Location: ../login.php");
            exit();
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: ../login.php");
        exit();
    }
} else {
    echo "Request method not allowed";
}
