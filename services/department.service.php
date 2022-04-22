<?php

include "../repo/department.repo.php";

class DepartmentService extends Department
{

    public function __construct(){}

    public function AddDepartment($department_name)
    {
        if ($this->AddingDepartment($department_name) == false) {
            echo "Could not add department";
            exit();
        }else{
            echo "Department added successfully";
            exit();
        }
    }

    public function GetAllDepartments()
    {
        if($this->GetDepartments() == false){
            return false;
        }else{
            return $this->GetDepartments();
        }
    }
}
