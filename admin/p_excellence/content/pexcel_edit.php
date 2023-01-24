<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        session_destroy();
        echo "<script> window.location.href = '../../../login/login.php' </script>";
    }
}
// require_once "../../audit_logs/audit_db.php";
require_once "../../../includes/functions-inc.php";
require_once "../../../includes/db_ep-inc.php";



//payreto store
if (isset($_POST["u_store"])) {
    // if (empty($_POST['redemption']) && empty($_POST['nomination']) && empty($_POST['store-purchase'])){
    //     //add stuff here
    //     $_SESSION['status_p_man'] = "! Error !";
    //     $_SESSION['status_text'] = "No link uploaded!";
    //     $_SESSION['status_code'] = "error";
    //     echo "<script> window.location.href='pexcel_admin.php' </script>";
    // }
    if (!empty($_POST['redemption'])) {
        $link = $_POST["redemption"];
        $sql = "UPDATE p_management SET link = '$link' WHERE id = 'rewards'";
        mysqli_query($conn, $sql);
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_p_man'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['nomination'])) {
        $link = $_POST["nomination"];
        $sql = "UPDATE p_management SET link = '$link' WHERE id = 'nomination'";
        mysqli_query($conn, $sql);
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_p_man'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['store-purchase'])) {
        $link = $_POST["store-purchase"];
        $sql = "UPDATE p_management SET link = '$link' WHERE id = 'imbursement'";
        mysqli_query($conn, $sql);
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_p_man'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    echo "<script> window.location.href='pexcel_admin.php' </script>";
    // header("location: pexcel_admin.php");
}


//foodpanda account
if (isset($_POST["u_panda"])) {
    if (empty($_FILES['acctactivation']['name']) && empty($_POST['contact']) && empty($_POST['contact-email'])){
        $_SESSION['status_p_man'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
        echo "<script> window.location.href='pexcel_admin.php' </script>";
    }
    if ($_FILES['acctactivation']['name'] != "") {
        $filename = $_FILES["acctactivation"]["name"];
        $tempname = $_FILES["acctactivation"]["tmp_name"];
        $folder = '../../../people_operations/people_excellence/assets/img/' . $filename;
        $folder_db = '/Employee-Portal-v2/people_operations/people_excellence/assets/img/' . $filename;

        $id = $_POST["identifier"];

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_pman($folder_db, $id);
            mysqli_query($conn, $query);
        }
        
        require_once "../../audit_logs/audit_db.php";

        $_SESSION['status_p_man'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }

    if (!empty($_POST['contact'])) {
        $link = $_POST["contact"];
        $sql = "UPDATE p_management SET link = '$link' WHERE id = 'foodpanda2'";
        mysqli_query($conn, $sql);
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_p_man'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['contact-email'])) {
        $link = $_POST["contact-email"];
        $sql = "UPDATE p_management SET link = '$link' WHERE id = 'foodpanda3'";
        mysqli_query($conn, $sql);
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_p_man'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }

    echo "<script> window.location.href='pexcel_admin.php' </script>";
    // header("location: pexcel_admin.php");
}

//list of activities and events
if (isset($_POST['u_events'])) {
    $sql = "SELECT * FROM events_activities";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $len = count($row);

    for ($i = 1; $i <= $len; $i++) {
        if (!empty($_POST['e_name' . $i] && $_POST['e_team' . $i] && $_POST['e_date' . $i] && $_POST['e_content' . $i])) {
            $e_id = $_POST["e_id" . $i];
            $e_name = $_POST["e_name" . $i];
            $e_team = $_POST["e_team" . $i];
            $e_date = $_POST["e_date" . $i];
            $e_content = $_POST["e_content" . $i];

            $e_name = htmlEntEncode($e_name);
            $e_team = htmlEntEncode($e_team);
            $e_content = htmlEntEncode($e_content);

            require_once "../../audit_logs/audit_db.php";

            if ($_FILES['e_img'.$i]['name'] != "") {
                $filename = $_FILES["e_img".$i]["name"];
                $tempname = $_FILES["e_img".$i]["tmp_name"];
                $folder = '../../../people_operations/people_excellence/assets/files/' . $filename;
                $folder_db = '/Employee-Portal-v2/people_operations/people_excellence/assets/files/' . $filename;

                if (move_uploaded_file($tempname, $folder)) {
                    $sql = "UPDATE events_activities SET `e_name` = '$e_name', `e_team` = '$e_team', `e_date` = '$e_date', `e_content` = '$e_content', `e_img`='$folder_db' WHERE `e_id` = '$e_id'";
                    mysqli_query($conn, $sql);
                }
            } else {
                $sql = "UPDATE events_activities SET `e_name` = '$e_name', `e_team` = '$e_team', `e_date` = '$e_date', `e_content` = '$e_content' WHERE `e_id` = '$e_id'";
                mysqli_query($conn, $sql);
            }
                
                $_SESSION['status_p_man'] = "Event Updated!";
                $_SESSION['status_text'] = "You have successfully updated an event!";
                $_SESSION['status_code'] = "success";
        }
    }

    if (!empty($_POST['e_field1'] && $_POST['e_field2'] && $_POST['e_field3'] && $_POST['e_field4'])) {
        $e_name = $_POST["e_field1"];
        $e_team = $_POST["e_field2"];
        $e_date = $_POST["e_field3"];
        $e_content = $_POST["e_field4"];

        $e_name = htmlEntEncode($e_name);
        $e_team = htmlEntEncode($e_team);
        $e_content = htmlEntEncode($e_content);

        require_once "../../audit_logs/audit_db.php";

        $e_poster = @$_SESSION['uname'];
        date_default_timezone_set("Hongkong");
        $e_posted = date("m/d/Y");

        if ($_FILES['e_img5']['name'] != "") {
            $filename = $_FILES["e_img5"]["name"];
            $tempname = $_FILES["e_img5"]["tmp_name"];
            $folder = '../../../people_operations/people_excellence/assets/files/' . $filename;
            $folder_db = '/Employee-Portal-v2/people_operations/people_excellence/assets/files/' . $filename;
    
            if (move_uploaded_file($tempname, $folder)) {
                $sql = "INSERT INTO events_activities (e_id, e_name, e_team, e_date, e_content, e_poster, e_posted, e_img) VALUES (default, '$e_name', '$e_team', '$e_date', '$e_content', '$e_poster', '$e_posted', '$folder_db')";
                mysqli_query($conn, $sql);
            }
        } else {
            $sql = "INSERT INTO events_activities (e_id, e_name, e_team, e_date, e_content, e_poster, e_posted) VALUES (default, '$e_name', '$e_team', '$e_date', '$e_content', '$e_poster', '$e_posted')";
            mysqli_query($conn, $sql);
        }

        $_SESSION['status_p_man'] = "Event Added!";
        $_SESSION['status_text'] = "You have successfully added an event!";
        $_SESSION['status_code'] = "success";
    }
    // } else {
    //     $_SESSION['status_p_man'] = "No Event Added/Updated.";
    //     $_SESSION['status_text'] = "No Event changed or added / all fields must be filled.";
    //     $_SESSION['status_code'] = "error";
    // }

    echo "<script> window.location.href='pexcel_admin.php' </script>";
    // header("location: pexcel_admin.php");
};

//post-event surveys
if (isset($_POST['u_survey'])) {
    $sql = "SELECT * FROM post_event";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $len = count($row);

    for ($i = 1; $i < $len; $i++) {
        if (!empty($_POST['p_name' . $i] && $_POST['p_link' . $i])) {
            $p_name = $_POST["p_name" . $i];
            $p_link = $_POST["p_link" . $i];
            $p_id = $_POST["p_id" . $i];

            $p_name = htmlEntEncode($p_name);

            require_once "../../audit_logs/audit_db.php";

            $sql = "UPDATE post_event SET p_name = '$p_name', p_link = '$p_link' WHERE p_id = '$p_id'";
            mysqli_query($conn, $sql);

            $_SESSION['status_p_man'] = "Survey Updated!";
            $_SESSION['status_text'] = "You have successfully updated a survey link!";
            $_SESSION['status_code'] = "success";
        }
    }

    if (!empty($_POST['p_field1'] && $_POST['p_field2'])) {
        $p_name = $_POST['p_field1'];
        $p_link = $_POST['p_field2'];

        $p_name = htmlEntEncode($p_name);

        require_once "../../audit_logs/audit_db.php";

        $sql = "INSERT INTO post_event (p_id, p_name, p_link) VALUES (default, '$p_name', '$p_link')";
        mysqli_query($conn, $sql);

        $_SESSION['status_p_man'] = "Survey Added!";
        $_SESSION['status_text'] = "You have successfully added a survey link!";
        $_SESSION['status_code'] = "success";
    }
    echo "<script> window.location.href='pexcel_admin.php' </script>";
    // header("location: pexcel_admin.php");
}

//file upload for company policies and procedures
if (isset($_POST["u_policy"])) {
    if ($_FILES['policy']['name'] != "") {
        $filename = $_FILES["policy"]["name"];
        $tempname = $_FILES["policy"]["tmp_name"];
        $folder = '../../../people_operations/people_excellence/assets/files/' . $filename;
        $folder_db = '/Employee-Portal-v2/people_operations/people_excellence/assets/files/' . $filename;

        $id = $_POST["identifier"];

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_pman($folder_db, $id);
            mysqli_query($conn, $query);
            $_SESSION['status_p_man'] = "Content Updated!";
            $_SESSION['status_text'] = "You have successfully updated the content!";
            $_SESSION['status_code'] = "success";
        }

        require_once "../../audit_logs/audit_db.php";
    } else {
        $_SESSION['status_p_man'] = "! Error !";
        $_SESSION['status_text'] = "No file selected!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='pexcel_admin.php' </script>";
}


//employee handbook
if (isset($_POST["u_handbook"])) {
    if ($_FILES['handbook']['name'] != "") {
        $filename = $_FILES["handbook"]["name"];
        $tempname = $_FILES["handbook"]["tmp_name"];
        $folder = '../../../people_operations/people_excellence/assets/files/' . $filename;
        $folder_db = '/Employee-Portal-v2/people_operations/people_excellence/assets/files/' . $filename;

        $id = $_POST["identifier"];

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_pman($folder_db, $id);
            mysqli_query($conn, $query);
            $_SESSION['status_p_man'] = "Content Updated!";
            $_SESSION['status_text'] = "You have successfully updated the content!";
            $_SESSION['status_code'] = "success";
        }

        require_once "../../audit_logs/audit_db.php";
    } else {
        $_SESSION['status_p_man'] = "! Error !";
        $_SESSION['status_text'] = "No file selected!";
        $_SESSION['status_code'] = "error";
    }

    echo "<script> window.location.href='pexcel_admin.php' </script>";
}


//employee code of conduct
if (isset($_POST["u_conduct"])) {
    if ($_FILES['conduct']['name'] != "") {
        $filename = $_FILES["conduct"]["name"];
        $tempname = $_FILES["conduct"]["tmp_name"];
        $folder = '../../../people_operations/people_excellence/assets/files/' . $filename;
        $folder_db = '/Employee-Portal-v2/people_operations/people_excellence/assets/files/' . $filename;

        $id = $_POST["identifier"];

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_pman($folder_db, $id);
            mysqli_query($conn, $query);
            $_SESSION['status_p_man'] = "Content Updated!";
            $_SESSION['status_text'] = "You have successfully updated the content!";
            $_SESSION['status_code'] = "success";
        }

        require_once "../../audit_logs/audit_db.php";
    } else {
        $_SESSION['status_p_man'] = "! Error !";
        $_SESSION['status_text'] = "No file selected!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='pexcel_admin.php' </script>";
}


//performance management
if (isset($_POST["u_performance"])) {
    if ($_FILES['performance']['name'] != "") {
        $filename = $_FILES["performance"]["name"];
        $tempname = $_FILES["performance"]["tmp_name"];
        $folder = '../../../people_operations/people_excellence/assets/files/' . $filename;
        $folder_db = '/Employee-Portal-v2/people_operations/people_excellence/assets/files/' . $filename;

        $id = $_POST["identifier"];

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_pman($folder_db, $id);
            mysqli_query($conn, $query);
            $_SESSION['status_p_man'] = "Content Updated!";
            $_SESSION['status_text'] = "You have successfully updated the content!";
            $_SESSION['status_code'] = "success";
        }

        require_once "../../audit_logs/audit_db.php";
    } else {
        $_SESSION['status_p_man'] = "! Error !";
        $_SESSION['status_text'] = "No file selected!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='pexcel_admin.php' </script>";
}


//employee concerns
if (isset($_POST["u_concern"])) {
    if (!empty($_POST['concern'])) {
        $link = $_POST["concern"];
        $sql = "UPDATE p_management SET link = '$link' WHERE id = 'concerns'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";

        $_SESSION['status_p_man'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    } else {
        $_SESSION['status_p_man'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='pexcel_admin.php' </script>";
    // header("location: pexcel_admin.php");
}


//incident report form
if (isset($_POST["u_incident"])) {
    if ($_FILES['incident']['name'] != "") {
        $filename = $_FILES["incident"]["name"];
        $tempname = $_FILES["incident"]["tmp_name"];
        $folder = '../../../people_operations/people_excellence/assets/files/' . $filename;
        $folder_db = '/Employee-Portal-v2/people_operations/people_excellence/assets/files/' . $filename;

        $id = $_POST["identifier"];
        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_pman($folder_db, $id);
            mysqli_query($conn, $query);
            $_SESSION['status_p_man'] = "Content Updated!";
            $_SESSION['status_text'] = "You have successfully updated the content!";
            $_SESSION['status_code'] = "success";
        }
        require_once "../../audit_logs/audit_db.php";
    } else {
        $_SESSION['status_p_man'] = "! Error !";
        $_SESSION['status_text'] = "No file selected!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='pexcel_admin.php' </script>";
}


//request for certificate of employment
if (isset($_POST["u_certificate"])) {
    if (!empty($_POST['certificate'])) {
        $link = $_POST["certificate"];
        $sql = "UPDATE p_management SET link = '$link' WHERE id = 'certificate'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";

        $_SESSION['status_p_man'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    } else {
        $_SESSION['status_p_man'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='pexcel_admin.php' </script>";
    // header("location: pexcel_admin.php");
}
