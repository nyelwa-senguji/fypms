<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'fypms');

class DatabaseConnection
{
    protected function connect()
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($conn->connect_error) {
            die("<h1>Database connection failed</h1>");
        }

        return $this->conn = $conn;
    }
}
