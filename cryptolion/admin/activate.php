<?php
include 'connection.php';
$URLROOT = "http://localhost/cyptolion";
if (isset($_COOKIE['admin'])) {
    if (isset($_GET['row_id'])) {
        $activate_id = $_GET['row_id'];
        $query = "UPDATE `deposits` SET `status` = 'Active' WHERE `id` = '".mysqli_real_escape_string($link, $activate_id)."'";
        if (mysqli_query($link, $query)) {
            $query = "UPDATE `deposits` SET `date` = current_timestamp WHERE `id` = '".mysqli_real_escape_string($link, $activate_id)."'";
            if (mysqli_query($link, $query)) {
                header('Location: view_deposits.php?success=1');
            }else{
                echo "Rejected Again";
            }
        }else{
            echo "REJECTED";
        }
    }else{
        echo "not set";
    }
}else{
    header('Location: ' . $URLROOT);
}
?>