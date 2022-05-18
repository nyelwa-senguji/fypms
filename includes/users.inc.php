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

if (isset($_GET['assigned_instructors'])) {
    //Get assigned instructors
    $assigned_instructors_array = $users->GetAssignedInstructorsService();
    echo json_encode($assigned_instructors_array);
}

if(isset($_POST['instructor_to_assign']) && isset($_POST['students_to_assign'])){
    //Values to assign
    $instructor_to_assign = $_POST['instructor_to_assign'];
    $students_to_assign = $_POST['students_to_assign'];
    echo $users->AssignStudentsToInstructorsService($instructor_to_assign, $students_to_assign);
}

if(isset($_POST['id']) && isset($_POST['assigned_students'])){
    $id = $_POST['id'];
    $assigned_students_array = $users->GetAssignedStudentsService($id);
    echo json_encode($assigned_students_array);
}

if(isset($_POST['id']) && isset($_POST['assigned_instructor'])){
    $id = $_POST['id'];
    echo json_encode($users->GetAssignedInstructorService($id));
}

if(isset($_POST['id']) && isset($_POST['project'])){
    $id = $_POST['id'];
    echo json_encode($users->GetStudentProjectsService($id));
}
