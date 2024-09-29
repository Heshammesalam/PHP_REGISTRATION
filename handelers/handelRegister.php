<?php
session_start();
include '../core/functions.php';
include '../core/validation.php';
$errors = [];

if(checkRequestMethod('POST') && checkPostInput('name')) {
     // sanitize input
    foreach ($_POST as $key => $value) {
       $$key = sanitizeInput($value) ;
    }
//   // check if empty input
//    foreach ($_POST as $key => $value) {
//        if(!requiredValue($value)) {
//            echo $key .  ' is required' . "<br>";
//        }
//    }
    if (!requiredValue($name)){
        $errors[] =  'Name is required';
    }elseif (!minValue($name,3)){
        $errors[]  =  'Name must be at least 3 character';
    }elseif (!maxValue($name,25)){
        $errors[]  =  'Name must be at smaller than 25 character';
    }

    if (!requiredValue($email)){
        $errors[] =  'email is required';
    }elseif (!minValue($email,3)){
        $errors[]  =  'email must be at least 3 character';
    }elseif (!maxValue($email,25)){
        $errors[]  =  'email must be at smaller than 25 character';
    }elseif (!emailValue($email)){
        $errors[]  =  'you must write valid email';
    }
    if (!requiredValue($password)){
        $errors[] =  'password is required';
    }elseif (!minValue($password,8)){
        $errors[]  =  'password must be at least 3 character';
    }elseif (!maxValue($password,15)){
        $errors[]  =  'password must be at smaller than 25 character';
    }

    if (empty($errors)) {
        $users_file = fopen('../data/users.csv', 'a+');
        $data = [$name, $email, sha1($password)];
        fputcsv($users_file, $data);
//        $_SESSION['auth'] = [$name, $email];
        redirect('../login.php');
        die();
    }else{
        $_SESSION['errors'] = $errors;
        header("location: ../register.php");
        die();
    }


}else{
    echo "Request method not allowed";
}
