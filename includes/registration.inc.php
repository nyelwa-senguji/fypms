<?php

include "../services/registration.service.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//RegistrationService Object
$registration = new RegistrationService;

//Grab user inputs
$full_name = trim($_POST['full_name']);

$department = trim($_POST['department']);

$role = trim($_POST['role']);

$user = trim($_POST['user']);

$user_password = trim($_POST['user_password']);

if ($full_name != "" && $department != "" && $role != "" && $user != "" && $user_password != "") {

    echo $registration->AddUserService($full_name, $department, $role, $user, $user_password);
} else {
    echo "Please fill in required fields";
}
