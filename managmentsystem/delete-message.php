<?php
if ( array_key_exists( 'messageid', $_GET ) ) {
    include 'connection.php';
    $ref = $_GET['ref'];
    $destination = '';
    if ( $ref == 'admin' ) {
        $destination .= 'admin-messages.php';
    } elseif ( $ref == 'teacher' ) {
        $destination .= 'teacher-messages.php';
    } elseif ( $ref == 'student' ) {
        $destination .= 'student-messages.php';
    }
    $message_id_delete = $_GET['messageid'];
    $messagepass = md5( md5( "$ref" ) );

    $query = "DELETE FROM `messages` WHERE `id`=$message_id_delete";
    if ( mysqli_query( $link, $query ) ) {
        header( "Location: $destination?messagepass=$messagepass" );
    } else {
        echo 'Error';
    }
}
?>