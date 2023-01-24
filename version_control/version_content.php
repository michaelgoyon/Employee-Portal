<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        session_destroy();
        echo "<script> window.location.href = '/Employee-Portal-v2/login/login.php' </script>";
    }
    $email = @$_SESSION["email"];
    include_once '../includes/db_ep-inc.php';
    include_once '../includes/functions-inc.php';
    include_once '../includes/plugins.php';
    getInfo($conn, $email);
    $uname = @$_SESSION['uname'];
    $role = @$_SESSION['role'];
    $img = @$_SESSION['img'];
    $department = @$_SESSION['department'];
    $FN = @$_SESSION['FN'];
    $LN = @$_SESSION['LN'];
    $location = @$_SESSION['location'];

    $admin = @$_SESSION["admin"];
    $admin_oa = @$_SESSION["admin_oa"];
}

$version_num = "1.0.3"

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="../assets/img/payreto-logo-sm.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/dashboard_styles.css">
    <link rel="stylesheet" href="../assets/css/vc_styles.css">
    <title>Payreto Employee Portal | Version Control</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include "../includes/sidebar.php"; ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="heading-payreto navbar navbar-expand-lg navbar-light py-3 px-3">
                <div class="d-flex align-items-center header-text">
                    <i class="fas fa-align-left tertiary-text fs-4 me-3" id="menu-toggle"></i>
                    <h4 class="m-0">VERSION CONTROL</h4>
                </div>
                <?php
                include "../includes/header.php";
                ?>
            </nav>
            <div class="w-100 py-5">
                <h1 class="card-heading my-5 text-uppercase text-center">SYSTEM CHANGES</h1>
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <!-- VERSION 1.0.3 -->
                    <div class="card my-3 py-3 px-5 w-75">
                        <div class="d-flex align-items-center">
                            <h2 class="card-heading m-0">Version 1.0.3</h2>
                            <p class="latest-version mx-3 px-2 py-1 my-0">LATEST</p>
                        </div>
                        <p class="date m-1 fs-6">Date Released: 12/05/22</p>
                        <h3 class="my-4">Release Notes</h3>
                        <p class="fs-6"><b>Bug Fixes</b></p>

                        <p class="fs-6">Broken Links</p>
                        <ul class="fs-6 notes">
                            <li>Admin Access > People Management > Sidebar - People Support</li>
                            <li>Admin Access > People Development > Sidebar - People Support</li>
                            <li>Admin Access > People Acquisition > Sidebar - People Support</li>
                            <li>Admin Access > People Support > Sidebar - People Support</li>
                            <li>Admin Access > Employee Admin > Sidebar - People Support</li>
                            <li>Admin Access > IT Helpdesk > Sidebar - People Support</li>
                        </ul>

                        <p class="fs-6">Others</p>
                        <ul class="fs-6 notes">
                            <li>Email is sent to the email provided in the form instead to admin/development team email <br> People Development > LMS Support > Log-in Concern</li>
                            <li>Some images are broken <br> People Support > BUSINESS CONTINUITY PLAN > Employee Escape Plan</li>
                        </ul>
                    </div>
                    <!-- VERSION 1.0.2 -->
                    <div class="card my-3 py-3 px-5 w-75">
                        <div class="d-flex align-items-center">
                            <h2 class="card-heading m-0">Version 1.0.2</h2>
                        </div>
                        <p class="date m-1 fs-6">Date Released: 12/01/22</p>
                        <h3 class="my-4">Release Notes</h3>
                        <p class="fs-6"><b>Bug Fixes</b></p>

                        <p class="fs-6">Delete button</p>
                        <ul class="fs-6 notes">
                            <li>Admin Access > People Acquisition > List of Open Requisitions</li>
                            <li>Admin Access > People Acquisition > List of Intern Positions</li>
                            <li>Admin Access > People Support > List of OSH Programs and Activities</li>
                        </ul>
                    </div>
                    <!-- VERSION 1.0.1 -->
                    <div class="card my-3 py-3 px-5 w-75">
                        <div class="d-flex align-items-center">
                            <h2 class="card-heading m-0">Version 1.0.1</h2>
                        </div>
                        <p class="date m-1 fs-6">Date Released: 11/25/22</p>
                        <h3 class="my-4">Release Notes</h3>
                        <p class="fs-6"><b>Bug Fixes</b></p>

                        <p class="fs-6">Update button</p> 
                        <ul class="fs-6 notes">
                            <li>Admin Access > People Support > BCP Employee Information</li>
                            <li>Admin Access > People Support > Incident/Accident Report Form</li>
                            <li>Admin Access > People Support > On-Site Medicine Request</li>
                            <li>Admin Access > People Support > Company Nurse Assistance Request</li>
                            <li>Admin Access > Employee Admin > Employee Retirement Program</li>
                            <li>Admin Access > Employee Admin> Payroll Adjustment Form</li>
                            <li>Admin Access > Employee Admin > Payroll Dispute Inquiry</li>
                            <li>Admin Access > Employee Admin > Update of Employee Records</li>
                            <li>Admin Access > Employee Admin > Request of Employee Records</li>
                            <li>Admin Access > Employee Admin > Request for Supply Purchase</li>
                            <li>Admin Access > Employee Admin > Request for Office Equipment Purchase</li>
                        </ul>
                        
                        <p class="fs-6">Others</p>
                        <ul class="fs-6 notes">
                            <li>FIXED: Google Forms not showing on page</li>
                            <li>FIXED: Failed to Load PDF</li>
                            <li>FIXED: Admin dropdown not listing all pages</li>
                            <li>FIXED: Ticket Request Email Template 2nd item (copy email template) not working</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>