<?php

include("includes/session.inc.php");

session_start();

$id = $_SESSION['user_data'][0];

$fullname = $_SESSION['user_data'][1];

$department = $_SESSION['user_data'][2];

$role = $_SESSION['user_data'][3];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $role; ?> | FYPMS</title>

    <link rel="stylesheet" href="static/css/dashboard.css">
    <link rel="stylesheet" href="static/fonts_new/css/all.css">
    <link rel="stylesheet" href="static/css/toastr.css">
</head>

<body>

    <!-- ############ HEADER SECTION ############################# -->
    <div class="first-row">
        <h3>FYPMS</h3>
        <h3 class="cursor" onclick="Logout();">LOGOUT</h3>
    </div>
    <!-- ############ END HEADER SECTION ############################# -->

    <!-- ############ BODY SECTION ############################# -->
    <div class="second-row">
        <!-- ############ SIDEBAR SECTION ############################# -->
        <div class="sidebar">
            <div class="sidebar-header">
                <span class="text-bold"><?= $fullname ?></span>
                <span class="text-bold"><?= $role; ?></span>
            </div>
            <div class="sidebar-body">
                <div class="text cursor dashboard active" onclick="OpenDashboard();"><i class="fa-solid fa-gauge" style="margin-right: 10px;"></i>Dashboard</div>
                <hr>
                <?php if ($role == "Coordinator") { ?>
                    <div class="text cursor assign" onclick="OpenAssign();"><i class="fa-solid fa-clone" style="margin-right: 10px;"></i>Assign</div>
                    <hr>
                <?php } ?>
                <div class="text cursor"><i class="fa-solid fa-diagram-project" style="margin-right: 10px;"></i>Projects</div>
                <hr>
                <div class="text cursor"><i class="fa-solid fa-chart-line" style="margin-right: 10px;"></i>Activity</div>
            </div>
        </div>
        <!-- ############ END SIDEBAR SECTION ############################# -->

        <!-- ############ DASHBOARD CONTAINER (ONCLICK DASHBOARD) ############################# -->
        <?php if ($role == "Coordinator") { ?>
            <div class="dashboard-container">
                <div class="dashboard-container-one">
                    <div class="column-header">
                        Instructors
                    </div>
                    <input type="text" name="search_instructor" id="search_instructor" placeholder="Search Instructor" class="inp">
                    <span style="margin-left: -40px;"><i class="fa-solid fa-bars-staggered"></i></span>
                    <hr>
                    <div class="assigned-instructors">

                    </div>
                </div>
                <div class="dashboard-container-two">
                    <div class="column-header">
                        Students
                    </div>
                    <input type="text" name="search_student" id="search_student" placeholder="Search Student" class="inp">
                    <span style="margin-left: -40px;"><i class="fa-solid fa-bars-staggered"></i></span>
                </div>
                <div class="dashboard-container-three">
                    <div class="column-header">
                        Project
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if ($role == "Supervisor") { ?>
            <div class="dashboard-container">
                <div class="dashboard-container-one">
                    <div class="column-header">
                        Students
                    </div>
                    <input type="text" name="search_student" id="search_student" placeholder="Search Student" class="inp">
                    <span style="margin-left: -40px;"><i class="fa-solid fa-bars-staggered"></i></span>
                    <hr>
                    <input type="hidden" name="supervisor_id" id="supervisor_id" value="<?= $id ?>">
                    <input type="hidden" name="user_role" id="user_role" value="<?= $role ?>">
                    <div class="supervisor-assigned-students">

                    </div>
                </div>
                <div class="dashboard-container-two">
                    <div class="column-header">
                        Projects
                    </div>
                    <input type="text" name="search_student" id="search_student" placeholder="Search Project" class="inp">
                    <span style="margin-left: -40px;"><i class="fa-solid fa-bars-staggered"></i></span>
                </div>
                <div class="dashboard-container-three">
                    <div class="column-header">
                        Project Abstraction
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- ############ END DASHBOARD CONTAINER (ONCLICK DASHBOARD) ############################# -->

        <!-- ############ ASSIGN CONTAINER (ONCLICK ASSIGN) ############################# -->
        <div class="assign-container">
            <div class="assign-container-one">
                <div class="column-header">
                    Instructors
                </div>
                <input type="text" name="search_instructor" id="search_instructor" onkeyup="GetAllInstructors();" placeholder="Search Instructor" class="inp">
                <span style="margin-left: -40px;"><i class="fa-solid fa-bars-staggered"></i></span>
                <hr>
                <div class="instructors">

                </div>
            </div>
            <div class="assign-container-two">
                <div class="column-header">
                    Students
                </div>
                <input type="text" name="search_student" id="search_student" placeholder="Search Student" class="inp">
                <span style="margin-left: -40px;"><i class="fa-solid fa-bars-staggered"></i></span>
                <hr>
                <div class="students">

                </div>
            </div>
            <div class="assign-container-three">
                <div class="column-header">
                    Assign
                </div>
                <div class="column-body">
                    <div class="assign-instructor">
                        Instructor name
                    </div>
                    <input type="hidden" name="instructor-to-assign" id="instructor-to-assign" value="">
                </div>
                <div class="assign-btn">
                    <button class="btn">ASSIGN</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ############ END ASSIGN CONTAINER (ONCLICK ASSIGN) ############################# -->
    <!-- ############ END BODY SECTION ############################# -->

    <!-- ############ FOOTER SECTION ############################# -->
    <div class="third-row">
        <div class="footer">
            <h5 style="color: #3C4B64;"> &copy 2022 Mzumbe University</h5>
        </div>
    </div>
    <!-- ############ END FOOTER SECTION ############################# -->
</body>
<script src="static/js/jquery.min.js"></script>
<script src="static/js/toastr.js"></script>
<script src="static/js/dashboard.js"></script>

</html>