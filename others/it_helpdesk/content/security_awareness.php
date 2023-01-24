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
    <link rel="stylesheet" href="/Employee-Portal-v2/others/it_helpdesk/assets/css/it_helpdesk_styles.css">
</head>
<title>Payreto Employee Portal | IT Helpdesk</title>

<?php
$sql = "SELECT link, id FROM it_helpdesk WHERE id = 'awareness'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $link = $row['link'];
}
?>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include "../../../includes/sidebar.php"; ?>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="heading-payreto navbar navbar-expand-lg navbar-light py-3 px-4">
                <div class="d-flex align-items-center header-text">
                    <i class="fas fa-align-left tertiary-text fs-4 me-3" id="menu-toggle"></i>
                    <a class="back-icon me-3" href="/Employee-Portal-v2/others/it_helpdesk/index.php"><i class="back-icon fa-solid fa-angle-left"></i></a>
                    <h4 class="m-0">IT HELPDESK</h4>
                </div>
                <?php
                include "../../../includes/header.php";
                ?>
            </nav>
            <div class="w-100 py-5">
                <?php if (empty($link)) : ?>
                    <div class="container d-flex justify-content-center">
                        <img src="/Employee-Portal-v2/assets/img/under_construction.gif">
                    </div>
                    <div class="container d-flex justify-content-center">
                        <p style="color: red;" class="card-heading">Under Construction... Come back soon! </p>
                    </div>
                <?php else : ?>
                    <div class="container">
                        <h1 class="card-heading my-5 text-uppercase text-center">IT Security Awareness</h1>
                        <embed class="w-100" src="<?php echo $link ?>#toolbar=0" type="application/pdf" height="900vh">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</body>

</html>