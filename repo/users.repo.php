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

        $getAssignedInstructors = "SELECT u.id, u.fullname, u.department, u.role FROM tbl_users u, tbl_assign a WHERE u.id = a.instructor_id GROUP BY u.fullname";

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

    public function GetAssignedInstructorRepo($id)
    {
        $data = array();

        $getAssignedInstructor = "SELECT u.id, u.fullname, u.department, u.role FROM tbl_users u, tbl_assign a WHERE u.id = a.instructor_id AND a.student_id = '$id'";

        $stmt = $this->connect()->query($getAssignedInstructor);

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

        $getAssignedStudents = "SELECT u.id, u.fullname, u.department, u.role FROM tbl_users u, tbl_assign a WHERE u.id = a.student_id AND a.instructor_id = '$id'";

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

    public function GetStudentProjectsRepo($id)
    {
        $data = array();

        $getStudentProjects = "SELECT project_id, project_name FROM tbl_projects WHERE student_id = '$id'";

        $stmt = $this->connect()->query($getStudentProjects);

        if ($stmt->num_rows > 0) {
            while ($row = $stmt->fetch_array(MYSQLI_ASSOC)) {
                array_push($data, $row);
            }
            return $data;
        } else {
            return false;
        }
    }

    public function GetSelectedStudentRepo($id)
    {
        $data = array();

        $getSelectedStudents = "SELECT project_name, project_abstract FROM tbl_projects WHERE student_id = $id AND is_Selected = 'Yes'";

        $stmt = $this->connect()->query($getSelectedStudents);

        if ($stmt->num_rows > 0) {
            while ($row = $stmt->fetch_array(MYSQLI_ASSOC)) {
                array_push($data, $row);
            }
            return $data;
        } else {
            return false;
        }
    }

    public function GetProjectAbstractRepo($id)
    {
        $data = array();

        $getProjectAbstract = "SELECT project_id, project_name, project_abstract FROM tbl_projects WHERE project_id = '$id'";

        $stmt = $this->connect()->query($getProjectAbstract);

        if ($stmt->num_rows > 0) {
            while ($row = $stmt->fetch_assoc()) {
                array_push($data, $row);
                // die($row['project_abstract']);
                // $data = $row['project_abstract'];
            }
            return $data;
        } else {
            return false;
        }
    }

    public function UpdateSelectedProjectRepo($id)
    {
        $updateProject = "UPDATE tbl_projects SET is_Selected = 'Yes' WHERE project_id = ?";

        $stmt = $this->connect()->prepare($updateProject);

        $stmt->bind_param("i", $id);

        $update = $stmt->execute();

        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    public function GetSelectedProjectRepo($param)
    {
        $data = array();

        $getSelectedProject = "SELECT project_name, project_abstract FROM tbl_projects WHERE project_name LIKE '%$param%' AND is_Selected = 'Yes'";

        $stmt = $this->connect()->query($getSelectedProject);

        if ($stmt->num_rows > 0) {
            while ($row = $stmt->fetch_assoc()) {
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

    public function AddStudentProjectRepo($id, $name, $abstract)
    {
        $insertProject = "INSERT INTO tbl_projects(student_id, project_name, project_abstract)
                            VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($insertProject);

        $stmt->bind_param("iss", $id, $name, $abstract);

        $insert = $stmt->execute();

        if ($insert) {
            return true;
        } else {
            return false;
        }
    }
}
