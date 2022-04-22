<?php

include "../database/db.class.php";

class Users extends DatabaseConnection{
    
    public function GetInstructors($search_instructor){

        $data = array();

        $filter = "";

        if(!empty($search_instructor)){
            $filter = "AND fullname LIKE '%$search_instructor%'";
        }

        $getInstructors = "SELECT id, fullname, department, role FROM tbl_users WHERE role = 'Supervisor' $filter LIMIT 4";

        $stmt = $this->connect()->query($getInstructors);

        if ($stmt->num_rows > 0) 
        {
            while ($row = $stmt->fetch_array(MYSQLI_ASSOC)) 
            {
                array_push($data, $row);
            }
            return $data;
        } else {
            return false;
        }
    }

    public function GetStudents(){

        $data = array();

        $getStudents = "SELECT id, fullname, department, role FROM tbl_users WHERE role = 'Student' LIMIT 4";

        $stmt = $this->connect()->query($getStudents);

        if ($stmt->num_rows > 0) 
        {
            while ($row = $stmt->fetch_array(MYSQLI_ASSOC)) 
            {
                array_push($data, $row);
            }
            return $data;
        } else {
            return false;
        }
    }
}