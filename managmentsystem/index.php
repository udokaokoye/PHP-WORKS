<?php
session_start();
$error = "";
include "connection.php";
if (empty($_SESSION['id'])) {
    include "main-handler.php";
}else{
    $id = $_SESSION['id'];
    $query = "SELECT * FROM `admin` WHERE   `id` = '$id'";
    $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) > 0) {
             header("Location: Logged.php");
        }
            $query = "SELECT * FROM `teachers` WHERE   `id` = '$id'";
              $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0) {
              header("Location: teacher.portal.php");
         }
         $query = "SELECT * FROM `students` WHERE   `id` = '$id'";
              $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0) {
              header("Location: student.portal.php");
         }
        
}

