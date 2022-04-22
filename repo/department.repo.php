<?php

include "../database/db.class.php";

class Department extends DatabaseConnection
{
    public function AddingDepartment($department_name)
    {
        $insert_department = "INSERT INTO tbl_department(department_name) VALUES (?)";

        $stmt = $this->connect()->prepare($insert_department);

        $stmt->bind_param("s", $department_name);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function GetDepartments()
    {
        $data = array();

        $getAllDepartments = "SELECT department_name FROM tbl_department";

        $stmt = $this->connect()->query($getAllDepartments);

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
