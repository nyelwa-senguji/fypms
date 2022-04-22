<?php

include "../services/login.service.php";

//Grabbing the data for user login
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = trim($_POST['username']);

    $password = trim($_POST['password']);

    $user = new LoginService($username, $password);

    echo $user->LoginUser();
}
