<?php

include "../database/db.class.php";

class Users extends DatabaseConnection
{

    public function GetInstructors($search_instructor)
    {

        $data = array();

        $getInstructors = "SELECT id, fullname, department, role FROM tbl_users WHERE role = 'Supervisor' AND id NOT IN (SELECT instructor_id FROM tbl_assign) LIMIT 5";

        $stmt = $this->connect()->query($getInstructors);

        if ($stmt->num_rows > 0) {
            while ($row = $stmt->fetch_array(MYSQLI_ASSOC)) {
                array_push($data, $row);
            }
            return $data;
        } else {
            return false;
        }
    }

    public function GetStudents()
    {

        $data = array();

        $getStudents = "SELECT id, fullname, department, role FROM tbl_users WHERE role = 'Student' AND id NOT IN (SELECT student_id FROM tbl_assign) LIMIT 5";

        $stmt = $this->connect()->query($getStudents);

        if ($stmt->num_rows > 0) {
            while ($row = $stmt->fetch_array(MYSQLI_ASSOC)) {
                array_push($data, $row);
            }
            return $data;
        } else {
            return false;
        }
    }

    public function GetAssignedInstructorsRepo()
    {
        $data = array();

        $getAssignedInstructors = "SELECT u.fullname, u.department, u.role FROM tbl_users u, tbl_assign a WHERE u.id = a.instructor_id GROUP BY u.fullname";

        $stmt = $this->connect()->query($getAssignedInstructors);

        if ($stmt->num_rows > 0) {
            while ($row = $stmt->fetch_array(MYSQLI_ASSOC)) {
                array_push($data, $row);
            }
            return $data;
        } else {
            return false;
        }
    }

    public function GetAssignedStudentsRepo($id)
    {
        $data = array();

        $getAssignedStudents = "SELECT u.fullname, u.department, u.role FROM tbl_users u, tbl_assign a WHERE u.id = a.student_id AND a.instructor_id = '$id'";

        $stmt = $this->connect()->query($getAssignedStudents);

        // $stmt->bind_param("i", $id);

        // $stmt = $this->connect()->query($getAssignedStudents);

        if ($stmt->num_rows > 0) {
            while ($row = $stmt->fetch_array(MYSQLI_ASSOC)) {
                array_push($data, $row);
            }
            return $data;
        } else {
            return false;
        }
    }

    public function AssignStudentsToInstructorsRepo($instructor_to_assign, $students_to_assign)
    {
        foreach ($students_to_assign as $student_to_assign) {
            $insertAssignments = "INSERT INTO tbl_assign(instructor_id, student_id)
                                    VALUES (?, ?)";
            $stmt = $this->connect()->prepare($insertAssignments);

            $stmt->bind_param("ii", $instructor_to_assign, $student_to_assign);

            $insert = $stmt->execute();
            
        }
        if ($insert) {
            return true;
        } else {
            return false;
        }
    }
}
