<?php

include "../database/db.class.php";

class Role extends DatabaseConnection
{
    public function AddingRole($role_name)
    {
        $insert_role = "INSERT INTO tbl_roles(role_name) VALUES (?)";

        $stmt = $this->connect()->prepare($insert_role);

        $stmt->bind_param("s", $role_name);

        if ($stmt->execute()) {
            return true;
        } else {

            return false;
        }
    }

    public function GetRoles()
    {
        $data = array();

        $getAllRoles = "SELECT role_name FROM tbl_roles";

        $stmt = $this->connect()->query($getAllRoles);

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
