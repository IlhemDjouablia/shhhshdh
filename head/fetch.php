<?php
session_start();
include('../config/conn.php');
$idhod=$_SESSION['idhod'];

if (isset($_POST["view"])) {
    if ($_POST["view"] != '') {
        mysqli_query($conn, "UPDATE `head_notif` SET seen='1' WHERE seen='0' and id_head= $idhod");
    }
    
    $query = mysqli_query($conn, "SELECT * FROM `head_notif`INNER JOIN request ON head_notif.id_req = request.id_req WHERE id_head= $idhod ORDER BY id_notif DESC LIMIT 5 ");
    $output = '';

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_array($query)) {
            $output .= '
            <div class="notification" >
            <img src="img/'.$row['p_comp'].'" alt="avatar">
            <div class="notification-text">
            <a href="' . $row['link'] . '">
                <p>'.$row['intern_name'].'</p>
                <p>'.$row['message'].'</p>
                <span>' . $row['time'] . '</span>
            </div></a>
        </div>
            ';
        }
    } else {
        $output .= '<div class="notification">
        <img src="img/profile.png" alt="avatar">
        <div class="notification-text">
            <p>no notification </p>
           
        </div>
    </div>';
    }

    $query1 = mysqli_query($conn, "SELECT * FROM `head_notif` WHERE seen='0'and id_head= $idhod ");
    $count = mysqli_num_rows($query1);
    $data = array(
        'notification' => $output,
        'unseen_notification' => $count
    );
    echo json_encode($data);
}
?>
