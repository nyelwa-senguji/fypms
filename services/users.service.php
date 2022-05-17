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

    public function GetAssignedInstructorsService(){
        if($this->GetAssignedInstructorsRepo() == false){
            return false;
        }else{
            return $this->GetAssignedInstructorsRepo();
        }
    }

    public function GetAssignedInstructorService($id)
    {
        if($this->GetAssignedInstructorRepo($id) == false){
            return false;
        }else{
            return $this->GetAssignedInstructorRepo($id);
        }
    }

    public function GetAssignedStudentsService($id){
        if($this->GetAssignedStudentsRepo($id) == false){
            return false;
        }else{
            return $this->GetAssignedStudentsRepo($id);
        }
    }

    public function AssignStudentsToInstructorsService($instructor_to_assign, $students_to_assign){
        if($this->AssignStudentsToInstructorsRepo($instructor_to_assign, $students_to_assign) == false){
            echo "Could not assign student to instructor";
            exit();
        }else{
            echo "Successfully assigned students to instructors";
            exit();
        }
    }
}