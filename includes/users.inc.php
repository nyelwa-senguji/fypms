<?php

include "../services/users.service.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Usersservice object
$users = new UsersService;

if (isset($_GET['instructors'])) {
    //Get all instructors
    $search_instructor = $_GET['search_instructor'];
    $instructors_array = $users->GetAllInstuctors($search_instructor);
    echo json_encode($instructors_array);
}

if (isset($_GET['students'])) {
    //Get all students
    $students_array = $users->GetAllStudents();
    echo json_encode($students_array);
}
