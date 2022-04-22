<?php

include "../services/role.service.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Roleservice object
$role = new RoleService;

//Grabbing the data
if (isset($_POST['role_name'])) {
    $role_name = trim($_POST['role_name']);

    echo $role->AddRole($role_name);
    exit;
}

//Get all roles
$roles_array = $role->GetAllRoles();
echo json_encode($roles_array);
