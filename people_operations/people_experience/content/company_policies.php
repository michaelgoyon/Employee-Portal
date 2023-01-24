<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        echo "<script> window.location.href = '../../login.php' </script>";
    }
}
$email = $_SESSION["email"];
include '../../../includes/db_ep-inc.php';
include '../../../includes/functions-inc.php';
include '../../../includes/plugins.php';
getInfo($conn, $email);
$uname = $_SESSION['uname'];
$role = $_SESSION['role'];
$img = $_SESSION['img'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Local CSS -->
    <link rel="stylesheet" href="/Employee-Portal-v2/assets/css/dashboard_styles.css">
    <link rel="stylesheet" href="/Employee-Portal-v2/people_management/assets/css/p_management_styles.css">
</head>
<title>Payreto Employee Portal | People Management</title>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include "../../../includes/sidebar.php"; ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="heading-payreto navbar navbar-expand-lg navbar-light py-3 px-4">
                <div class="d-flex align-items-center header-text">
                    <i class="fas fa-align-left tertiary-text fs-4 me-3" id="menu-toggle"></i>
                    <a class="back-icon me-3" href="/Employee-Portal-v2/people_management/index.php"><i class="back-icon fa-solid fa-angle-left"></i></a>
                    <h4 class="m-0">EMPLOYEE RELATIONS</h4>
                </div>
                <?php
                include "../../../includes/header.php";
                ?>
            </nav>
            <div class="w-100 py-5">
                <div class="container">
                    <h1 class="card-heading my-5 text-uppercase text-center">COMPANY POLICIES AND PROCEDURES</h1>
                </div>
                <?php if (empty($link)) : ?>
                    <div class="container d-flex justify-content-center">
                        <img src="/Employee-Portal-v2/assets/img/under_construction.gif">
                    </div>
                    <div class="container d-flex justify-content-center">
                        <p style="color: red;" class="card-heading">Under Construction... Come back soon! </p>
                    </div>
                <?php else : ?>
                    <div class="w-100 py-5">
                        <div class="container ">
                            <embed src="<?php echo $link ?>" class="card-heading my-5 text-uppercase text-center w-100" height="900vh">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</body>

</html>