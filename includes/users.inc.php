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

if(isset($_POST['student_id']) && isset($_POST['coordinator'])){
    $coordinator_student_id = $_POST['student_id'];
    echo json_encode($users->GetSelectedStudentService($coordinator_student_id));
}

if(isset($_POST['project_id'])){
    $project_id = $_POST['project_id'];
    echo json_encode($users->GetProjectAbstractService($project_id));
}

if(isset($_POST['student_id']) && isset($_POST['project_name']) && isset($_POST['project_abstract'])){
    $student_id = $_POST['student_id'];
    $project_name = $_POST['project_name'];
    $project_abstract = $_POST['project_abstract'];
    echo $users->AddStudentProjectService($student_id, $project_name, $project_abstract);
}

if(isset($_POST['search_param'])){
    $param = $_POST['search_param'];
    echo json_encode($users->GetSelectedProjectService($param));
}

if(isset($_POST['selected_project_id'])){
    $selected_project_id = $_POST['selected_project_id'];
    echo $users->UpdateSelectedProjectService($selected_project_id);
}
