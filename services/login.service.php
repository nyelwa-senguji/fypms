<?php

include "../repo/login.repo.php";

class LoginService extends Login
{

    private $username;

    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;

        $this->password = $password;
    }

    public function LoginUser()
    {
        if ($this->emptyInput() == false) {
            echo "Please fill in the required inputs";
            exit();
        }
        if ($this->Credentialmatch() == false) {
            echo "Invalid Username/Password";
            exit();
        }

        echo "Success";
    }

    private function emptyInput()
    {
        if (empty($this->username) || empty($this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function Credentialmatch()
    {
        if (!$this->checkUser($this->username, $this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
