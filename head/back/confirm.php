<?php
// connect to the database
include "../../config/conn.php";
use PHPMailer\PHPMailer\PHPMailer;
require_once "../../PHPMailer/src/Exception.php";
require_once "../../PHPMailer/src/PHPMailer.php";
require_once "../../PHPMailer/src/SMTP.php";

$mail = new PHPMailer(true);

// retrieve the id parameter from the URL
$id = $_GET['id'];

// retrieve the corresponding internship details from the database
$sql0 = "SELECT * FROM request WHERE id_req = $id";
$result0 = mysqli_query($conn, $sql0);
$row = mysqli_fetch_assoc($result0);
$email = $row['email_manager'];
$name = $row['manager'];
$comp = $row['name_comp'];
$idst = $row['id_student'];
$link = "acc.php";
$link2 = "request.php";
$reason = "Your request has been accepted by the head of department.";
$reason2 = "You have a new request accepted by the head of department.";

// update the corresponding record in the database
$sql = "UPDATE request SET state = 50 WHERE id_req = $id";
mysqli_query($conn, $sql);

$sql2 = "SELECT * FROM manager WHERE email_manager='$email'";
$result2 = mysqli_query($conn, $sql2);
if (mysqli_num_rows($result2) > 0) {
  $row = mysqli_fetch_assoc($result2);
  $idm = $row['id_manager'];
  $sql6 = "INSERT INTO manager_notif (id_manager, id_req, link, message) VALUES ('$idm', '$id', '$link2', '$reason2')";
  $result6 = mysqli_query($conn, $sql6);
  $sql5 = "INSERT INTO student_notif (idst, idreq, link, message) VALUES ('$idst', '$id', '$link', '$reason')";
  $result5 = mysqli_query($conn, $sql5);
  header("Location: ../request.php");
  exit();
} else {
  $mail->isSMTP();
  $mail->SMTPAuth = true;

  $mail->Host = "smtp.gmail.com";
  $mail->SMTPSecure = "tls";
  $mail->Port = '587';

  $mail->Username = "bgthadj@gmail.com";
  $mail->Password = "cbgsynwgpcoiavxd";
  $mail->setFrom("bgthadj@gmail.com", "STAGET");
  $mail->addAddress($email, $email);
  $verificationCode = rand(100000, 999999);
  $pass = md5($verificationCode);
  $mail->Subject = "Verification code";
  $mail->Body = "Welcome to STAGET! Your email is: " . $email . " and your password is: " . $verificationCode;

  if ($mail->send()) {
    $sql3 = "INSERT INTO verified (email) VALUES ('$email')";
    $result3 = mysqli_query($conn, $sql3);

    $sql4 = "INSERT INTO manager (name_manager, email_manager, password_manager, company_manager) VALUES ('$name', '$email', '$pass', '$comp')";
    $result4 = mysqli_query($conn, $sql4);

    $sql5 = "INSERT INTO student_notif (idst, idreq, link, message) VALUES ('$idst', '$id', '$link', '$reason')";
    $result5 = mysqli_query($conn, $sql5);
  }

  header("Location: ../request.php");
  exit();
}
?>
