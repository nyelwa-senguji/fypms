<?php

include "../database/db.class.php";

session_start();

class Login extends DatabaseConnection
{
    protected function checkUser($username, $password)
    {
        $check_if_user_exists = "SELECT fullname, department, role
                                    FROM tbl_users
                                    WHERE username = ? and password = ?";

        $stmt = $this->connect()->prepare($check_if_user_exists);

        $stmt->bind_param("ss", $username, $password);

        $stmt->execute();

        $stmt->store_result();

        if (!$stmt->num_rows() > 0) {
            $resultCheck = false;
        } else {

            $stmt->bind_result($fullname, $department, $role);

            $stmt->fetch();

            $session_array = array($fullname, $department, $role);

            $_SESSION['user_data'] = $session_array;

            $resultCheck = true;
        }

        return $resultCheck;
    }
}
