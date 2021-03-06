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

    public function GetStudentProjectsService($id){
        if($this->GetStudentProjectsRepo($id) == false){
            return false;
        }else{
            return $this->GetStudentProjectsRepo($id);
        }
    }

    public function GetSelectedStudentService($id)
    {
        if($this->GetSelectedStudentRepo($id) == false){
            return false;
        }else{
            return $this->GetSelectedStudentRepo($id);
        }
    }

    public function GetProjectAbstractService($id){
        if($this->GetProjectAbstractRepo($id) == false){
            return false;
        }else{
            return $this->GetProjectAbstractRepo($id);
        }
    }

    public function GetSelectedProjectService($param){
        if($this->GetSelectedProjectRepo($param) == false){
            return false;
        }else{
            return $this->GetSelectedProjectRepo($param);
        }
    }

    public function UpdateSelectedProjectService($id){
        if($this->UpdateSelectedProjectRepo($id) == false){
            echo "400";
            exit();
        }else{
            echo "200";
            exit();
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
            echo "Successfully assigned students to instructor";
            exit();
        }
    }

    public function AddStudentProjectService($id, $name, $abstract){
        if($this->AddStudentProjectRepo($id, $name, $abstract) == false){
            echo "Could not add project";
            exit();
        }else{
            echo "Successfully added project";
            exit();
        }
    }
}