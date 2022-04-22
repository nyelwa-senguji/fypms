<?php

include "../repo/users.repo.php";

class UsersService extends Users{

    public function GetAllInstuctors($search_instructor){
        if($this->GetInstructors($search_instructor) == false){
            return false;
        }else{
            return $this->GetInstructors($search_instructor);
        }
    }

    public function GetAllStudents(){
        if($this->GetStudents() == false){
            return false;
        }else{
            return $this->GetStudents();
        }
    }
}