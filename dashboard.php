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
    <input type="hidden" name="id" id="id" value="<?= $id ?>">
    <input type="hidden" name="role" id="role" value="<?= $role ?>">

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
                <?php if ($role == "Student") { ?>
                    <div class="text cursor project" onclick="OpenProject();"><i class="fa-solid fa-diagram-project" style="margin-right: 10px;"></i>Projects</div>
                    <hr>
                <?php } ?>
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
                    <input type="text" name="search_instructor" id="search_instructor" placeholder="Search Instructor" class="inp-search">
                    <span style="margin-left: -40px;"><i class="fa-solid fa-bars-staggered"></i></span>
                    <hr>
                    <div class="assigned-instructors">

                    </div>
                </div>
                <div class="dashboard-container-two">
                    <div class="column-header">
                        Students
                    </div>
                    <input type="text" name="search_student" id="search_student" placeholder="Search Student" class="inp-search">
                    <span style="margin-left: -40px;"><i class="fa-solid fa-bars-staggered"></i></span>
                    <hr>
                    <div class="coordinator-assigned-students">

                    </div>
                </div>
                <div class="dashboard-container-three">
                    <div class="column-header">
                        Project
                    </div>
                    <div class="coordinator-project-name user-details text-bold">

                    </div>
                    <div class="coordinator-assigned-students-project-abstract project-abstract">

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
                    <input type="text" name="search_student" id="search_student" placeholder="Search Student" class="inp-search">
                    <span style="margin-left: -40px;"><i class="fa-solid fa-bars-staggered"></i></span>
                    <hr>
                    <div class="supervisor-assigned-students">

                    </div>
                </div>
                <div class="dashboard-container-two">
                    <div class="column-header">
                        Projects
                    </div>
                    <input type="text" name="search_student" id="search_student" placeholder="Search Project" class="inp-search">
                    <span style="margin-left: -40px;"><i class="fa-solid fa-bars-staggered"></i></span>
                    <hr>
                    <div class="supervisor-assigned-students-projects">

                    </div>
                </div>
                <div class="dashboard-container-three">
                    <div class="column-header">
                        Project Abstract
                    </div>
                    <div class="hidden_project_name user-details text-bold">

                    </div>
                    <hr>
                    <input type="hidden" name="hidden_project_id" id="hidden_project_id" value="">
                    <input type="hidden" name="hidden_student_name" id="hidden_student_name" value="">
                    <div class="supervisor-assigned-students-project-abstract project-abstract">

                    </div>
                    <div class="project-buttons-container">
                        <button class="btn-search" id="check_project">SEARCH IN DATABASE</button>
                    </div>
                    <div class="project-buttons-container">
                        <button class="btn-accept" id="accept_project" onclick="AcceptProject();">ACCEPT PROJECT</button>
                        <button class="btn-reject" id="reject_project">REJECT PROJECT</button>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if ($role == "Student") { ?>
            <div class="dashboard-container">
                <div class="dashboard-container-one">
                    <div class="column-header">
                        Assigned Supervisor
                    </div>
                    <div class="student-assigned-supervisor">

                    </div>
                </div>
                <div class="dashboard-container-two">
                    <div class="column-header">
                        Projects
                    </div>
                    <div class="student-project">

                    </div>
                </div>
                <div class="dashboard-container-three">
                    <div class="column-header">
                        Project Abstract
                    </div>
                    <div class="student-project-abstract user-details">

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
                <input type="text" name="search_instructor" id="search_instructor" onkeyup="GetAllInstructors();" placeholder="Search Instructor" class="inp-search">
                <span style="margin-left: -40px;"><i class="fa-solid fa-bars-staggered"></i></span>
                <hr>
                <div class="instructors">

                </div>
            </div>
            <div class="assign-container-two">
                <div class="column-header">
                    Students
                </div>
                <input type="text" name="search_student" id="search_student" placeholder="Search Student" class="inp-search">
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
                    <button class="btn btn-width">ASSIGN</button>
                </div>
            </div>
        </div>
        <!-- ############ END ASSIGN CONTAINER (ONCLICK ASSIGN) ############################# -->
        <!-- ############ PROJECT CONTAINER (ONCLICK ASSIGN) ############################# -->
        <div class="project-container">
            <div class="project-container-add-btn">
                <button class="btn" id="add_project">ADD PROJECT</button>
            </div>
            <div class="project-container-columns">
                <div class="project-container-one">
                    <div class="column-header">
                        Project name
                    </div>
                    <hr>
                    <div class="project-name">

                    </div>
                </div>
                <div class="project-container-two">
                    <div class="column-header">
                        Project abstract
                    </div>
                    <hr>
                    <div class="project-abstract user-details">

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- ############ END PROJECT CONTAINER (ONCLICK ASSIGN) ############################# -->
    </div>
    <!-- ############ END BODY SECTION ############################# -->

    <!-- ############ FOOTER SECTION ############################# -->
    <div class="third-row">
        <div class="footer">
            <h5 style="color: #3C4B64;"> &copy 2022 Mzumbe University</h5>
        </div>
    </div>
    <!-- ############ END FOOTER SECTION ############################# -->
    <?php include("modals/add_project_modal.php"); ?>
    <?php include("modals/check_project_modal.php"); ?>
    <?php include("modals/accept_project_modal.php"); ?>
    <?php include("modals/reject_project_modal.php"); ?>
</body>
<script src="static/js/jquery.min.js"></script>
<script src="static/js/toastr.js"></script>
<script src="static/js/dashboard.js"></script>

</html>