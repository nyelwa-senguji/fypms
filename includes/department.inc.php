<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../services/department.service.php";

//Department object
$department = new DepartmentService;

if (isset($_POST['department_name'])) {
    //Grabbing the data
    $department_name = trim($_POST['department_name']);

    echo $department->AddDepartment($department_name);

    exit;
}

//Get all departments
$department_array = $department->GetAllDepartments();
echo json_encode($department_array);
