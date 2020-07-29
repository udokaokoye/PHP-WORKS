<?php
if (array_key_exists("assignmentid", $_GET)) {
    include "connection.php";
    $ref = $_GET['ref'];
    $pass = $_GET['pass'];
    $destination = "";
    if ($ref == 'admin') {
        $destination .= "admin-assignment.php";
    }elseif ($ref == 'teacher') {
        $destination .= "teacher-assignment.php";
    }elseif ($ref == 'student') {
        $destination .= "student-assignment.php";
    }
    $assignment_id_delete = $_GET['assignmentid'];
    $messagepass = md5(md5("$ref"));
    
    $query = "DELETE FROM `assignments` WHERE `id`= $assignment_id_delete";
    if (mysqli_query($link, $query)) {
        header("Location: $destination?pass=$pass");
    }else{
        echo "Error";
    }
}
?>