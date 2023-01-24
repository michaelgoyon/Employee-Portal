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
    <link rel="stylesheet" href="/Employee-Portal-v2/others/it_helpdesk/assets/css/ticket_styles.css">
</head>
<title>Payreto Employee Portal | IT Helpdesk</title>

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
                <div class="container">
                    <h1 class="card-heading my-5 text-uppercase text-center">Ticket Request Email Template</h1>
                    <div class="container-fluid">
                        <main>
                            <h1 class="mb-5 fw-bold text-center fs-3">How To: Create a Ticket Request via Email</h1>
                            <ol class="gradient-list">
                                <li>Login to your company provided email.</li>
                                <li>
                                    Create or compose new email with the below template: <br><br>
                                    <table class="template-table" id="table-to-copied">
                                        <tbody>
                                            <tr>
                                                <td>Type of Issue:</td>
                                                <td>ㅤㅤㅤㅤㅤㅤ</td>
                                            </tr>
                                            <tr>
                                                <td>Description of the Issue:</td>
                                                <td>ㅤㅤㅤㅤㅤㅤ</td>
                                            </tr>
                                            <tr>
                                                <td>Who is affected by the issue: </td>
                                                <td>ㅤㅤㅤㅤㅤㅤ</td>
                                            </tr>
                                            <tr>
                                                <td>Urgency: (High, Medium, Low)</td>
                                                <td>ㅤㅤㅤㅤㅤㅤ</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <button class="btn btn-outline-dark btn-sm" id="btn-copy-table">Copy</button>
                                </li>
                                <li>Send to it.support@payreto.com</li>
                            </ol>

                        </main>
                        <main>
                            <h1 class="mt-5 fw-bold text-center fs-3">Incident</h1>
                            <p class="mb-5 text-center"><i>Break-fix issues where there is an unplanned interruption or degradation of IT service. Something that is expected to be working, breaks down or experiences degradation.</i></p>
                            <ol class="gradient-list">
                                <li>
                                    SAMPLE: <br><br>
                                    <p>
                                        ✓ Type of Issue: Laptop Camera Issue<br>
                                        ✓ Description of the Issue: Unable to detect / camera is not working while on Google Meet <br>
                                        ✓ Who is affected by the issue: Juan Dela Cruz <br>
                                        ✓ Urgency: <i>(High, Medium, Low)</i> <br>
                                    </p>
                                </li>
                                <li>Send to it.support@payreto.com</li>
                            </ol>
                        </main>
                        <main>
                            <h1 class="mt-5 fw-bold text-center fs-3">Service Request</h1>
                            <p class="mb-5 text-center">
                                <i>
                                    a. Hardware - equipment request, upgrade or replacement, etc. <br>
                                    b. Software - Installation, License requests, Updates, etc. <br>
                                    c. Access - Network or Wireless Access, Shared Drive, Email Access, etc. <br>
                                </i>
                            </p>
                            <ol class="gradient-list">
                                <li>
                                    SAMPLE: <br><br>
                                    <p>
                                        ✓ Type of Issue: Viber Installation<br>
                                        ✓ Description of the Issue: Requesting to Install Viber on my company laptop for Client Use / Requirement <br>
                                        ✓ Who is affected by the issue: Juan Dela Cruz <br>
                                        ✓ Urgency: <i>(High, Medium, Low)</i><br><br>
                                        <b><i>*Attach prior approval from Manager or Department Head*</i></b>
                                    </p>
                                </li>
                                <li>Send to it.support@payreto.com</li>
                            </ol>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- /#page-content-wrapper -->


</body>

</html>