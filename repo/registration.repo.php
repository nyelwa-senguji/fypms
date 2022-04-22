<?php

include "../database/db.class.php";

class Registration extends DatabaseConnection
{
    public function AddUserRepo($fullname, $department, $role, $user, $user_password)
    {
        $insert_new_user = "INSERT INTO tbl_users(fullname, department, username, password, role)
                            VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->connect()->prepare($insert_new_user);

        $stmt->bind_param("sssss", $fullname, $department, $user, $user_password, $role);

        if ($stmt->execute()) {
            return true;
        } else {

            return false;
        }
    }
}
