<?php
include "../../config/conn.php";
session_start();

// Define the path to the "img" folder
$img_folder = '../img/';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_SESSION['emailhod'];
    $department = $_POST['departement'];
    $birthday = $_POST['bd'];

    if (isset($_FILES['pp']['name']) && !empty($_FILES['pp']['name'])) {
        $img_name = $_FILES['pp']['name'];
        $tmp_name = $_FILES['pp']['tmp_name'];
        $error = $_FILES['pp']['error'];

        if ($error === 0) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);

            $allowed_exs = array('jpg', 'jpeg', 'png');
            if (in_array($img_ex_to_lc, $allowed_exs)) {
                $new_img_name = uniqid($fname, true) . '.' . $img_ex_to_lc;
                $img_upload_path = $img_folder . $new_img_name;

                // Check if img folder exists, create it if it doesn't
                if (!is_dir($img_folder)) {
                    mkdir($img_folder);
                }

                // Delete old profile pic
                $old_pp = $_SESSION['phod'];
                if (!empty($old_pp)) {
                    $old_pp_des = $img_folder . $old_pp;
                    if (unlink($old_pp_des)) {
                        // Image deleted successfully
                    } else {
                        // Failed to delete image or already deleted
                    }
                }

                move_uploaded_file($tmp_name, $img_upload_path);

                // update the Database
                $sql = "UPDATE head SET firstname_hod='$fname',lastname_hod='$lname', bd_hod='$birthday', dep_hod='$department', profile_hod='$new_img_name' WHERE email_hod='$email'";

                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $sql2 = "SELECT * FROM head WHERE email_hod='$email'";
                    $result2 = mysqli_query($conn, $sql2);

                    if (mysqli_num_rows($result2) === 1) {
                        $row = mysqli_fetch_assoc($result2);
                        $_SESSION['idhod'] = $row['id_hod'];
                        $_SESSION['fnamehod'] = $row['firstname_hod'];
                        $_SESSION['lnamehod'] = $row['lastname_hod'];
                        $_SESSION['emailhod'] = $row['email_hod'];
                        $_SESSION['phod'] = $row['profile_hod'];
                        $_SESSION['dephod'] = $row['dep_hod'];
                        $_SESSION['bdhod'] = $row['bd_hod'];
                        header("Location: ../index.php?flsql2");
                        exit();
                    } else {
                        header("Location: ../index.php?flsql3");
                        exit();
                    }
                } else {
                    header("Location: ../index.php?flsql3");
                    exit();
                }
            } else {
                header("Location: ../index.php?error=You can't upload files of this type");
                exit();
            }
        } else {
            header("Location: ../index.php?error=Unknown error occurred!");
            exit();
        }
    } else {
        $sql = "UPDATE head SET firstname_hod='$fname',lastname_hod='$lname', bd_hod='$birthday', dep_hod='$department' WHERE email_hod='$email'";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $sql2 = "SELECT * FROM head WHERE email_hod='$email'";
            $result2 = mysqli_query($conn, $sql2);

            if (mysqli_num_rows($result2) === 1) {
                $row = mysqli_fetch_assoc($result2);
                $_SESSION['idhod'] = $row['id_hod'];
                $_SESSION['fnamehod'] = $row['firstname_hod'];
                $_SESSION['lnamehod'] = $row['lastname_hod'];
                $_SESSION['emailhod'] = $row['email_hod'];
                $_SESSION['phod'] = $row['profile_hod'];
                $_SESSION['dephod'] = $row['dep_hod'];
                $_SESSION['bdhod'] = $row['bd_hod'];
                header("Location: ../index.php?flsql2");
                exit();
            } else {
                header("Location: ../index.php?flsql3");
                exit();
            }
        } else {
            header("Location: ../index.php?flsql3");
            exit();
        }
    }
} else {
    header("Location: ../index.php?error=Error");
    exit();
}
?>
