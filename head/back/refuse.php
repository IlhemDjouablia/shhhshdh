<?php
include "../../config/conn.php";

if (isset($_POST['reason']) && isset($_POST['id'])) {
  
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $reason = validate($_POST['reason']);
    $id = validate($_POST['id']);

    // update the corresponding record in the database
    $sql = "UPDATE request SET state = 0 WHERE id_req = $id";
    mysqli_query($conn, $sql);

    $sql2 = "SELECT * FROM request WHERE id_req = $id";
    $result2 = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_assoc($result2);
    $idst = $row['id_student'];
    $link = "ref.php";

    $sql4 = "INSERT INTO student_notif (idst, idreq, link, message) VALUES ('$idst', '$id', '$link', '$reason')";
    $result4 = mysqli_query($conn, $sql4);

    // redirect back to the main page
    header("Location: ../request.php");
    exit();
}
?>
