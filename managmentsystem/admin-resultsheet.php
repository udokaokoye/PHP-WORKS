<?php
session_start();
if ( isset( $_SESSION['id'] ) ) {
    include 'connection.php';
    $id = $_SESSION['id'];
    $query = "SELECT * FROM `admin` WHERE `id` = '$id'";
    $result = mysqli_query( $link, $query );
    if ( !mysqli_num_rows( $result ) ) {
        header( 'Location: index.php' );
    } else {
        header( 'Location: index.php' );
    }
} else {
    header( 'Location: index.php' );
}

?>