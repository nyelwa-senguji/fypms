<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN | FYPMS</title>

    <link rel="stylesheet" href="static/css/login.css">
    <link rel="stylesheet" href="static/fonts/css/all.css">
</head>

<body>

    <div class="first-row">
        <span id="notify" class="notify"></span>
    </div>
    <div class="second-row">
        <div class="login-container">
            <div class="login-form">
                <h2>Login</h2>
                <input type="text" name="username" id="username" class="inp">
                <input type="password" name="password" id="password" class="inp">
                <button class="btn" id="login_btn">LOGIN</button>
            </div>
            <div class="login-description">
                <label class="text"><b>FYPMS</b></label>
                <p class="text"><b>Final Year Project Management System</b> is a simple system for managing university final year projects</p>
            </div>
        </div>
    </div>
    <div class="third-row p-x">
        <button class="btn shadow" id="add_role"><b>ADD ROLE</b></button>
        <button class="btn shadow" id="add_department"><b>ADD DEPARTMENT</b></button>
        <button class="btn shadow" id="add_user"><b>ADD USER</b></button>
    </div>
    <div class="third-row">
        <h5 style="color: #3C4B64;"> &copy 2022 Mzumbe University</h5>
    </div>

    <?php
    include("modals/add_role_modal.php");
    include("modals/add_user_modal.php");
    include("modals/add_department_modal.php");
    ?>

</body>
<script src="static/js/jquery.min.js"></script>
<script src="static/js/main.js"></script>
<script src="static/js/login.js"></script>
<script src="static/js/role.js"></script>
<script src="static/js/department.js"></script>

</html>