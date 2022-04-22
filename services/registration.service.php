<?php

include "../repo/registration.repo.php";

class RegistrationService extends Registration
{
    public function __construct()
    {
        
    }

    public function AddUserService($fullname, $department, $role, $user, $user_password)
    {
        if ($this->AddUserRepo($fullname, $department, $role, $user, $user_password) == false) {
            echo "Could not add user";
            exit();
        }else{
            echo "User added successfully";
            exit();
        }
    }
}