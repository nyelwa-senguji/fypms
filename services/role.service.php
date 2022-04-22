<?php

include "../repo/role.repo.php";

class RoleService extends Role
{

    public function __construct(){}

    public function AddRole($role_name)
    {
        if ($this->AddingRole($role_name) == false) {
            echo "Could not add role";
            exit();
        }else{
            echo "Role added successfully";
            exit();
        }
    }

    public function GetAllRoles()
    {
        if($this->GetRoles() == false){
            return false;
        }else{
            return $this->GetRoles();
        }
    }
}
