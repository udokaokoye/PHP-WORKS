<?php

if ( array_key_exists( 'pass', $_GET ) ) {

    session_start();
    if ( isset( $_SESSION['id'] ) ) {
        include 'connection.php';
        $id = $_SESSION['id'];
        $query = "SELECT * FROM `students` WHERE `id` = '$id'";
        $result = mysqli_query( $link, $query );
        if ( !mysqli_num_rows( $result ) ) {
            header( 'Location: index.php' );
        }
        $success = '';
        $error = '';
        include 'connection.php';
        $query = "SELECT `id` FROM `students` WHERE `password` = '".mysqli_real_escape_string( $link, $_GET['pass'] )."'";
        $result = mysqli_query( $link, $query );
        if ( !mysqli_num_rows( $result ) ) {
            header( 'Location: index.php' );
        } else {
            $id = $_SESSION['id'];
            $query = "SELECT * FROM `students` WHERE id = '$id'";
            $result = mysqli_query( $link, $query );
            $row = mysqli_fetch_array( $result );
            $class = $row['Class'];
            $rec = "$class-All";
            $dep = $row['Department'];
            $or = "$class-$dep";
        }
    } else {
        header( 'Location: index.php' );
    }

} else {
    header( 'Location: index.php' );
}

?>
<?php include 'header.php';
include 'student-nav.php';
?>

<div class='det'>
    <h1>Assignments</h1>
    <?php
$query = "SELECT * FROM `assignments` WHERE Reciever = '$rec' OR Reciever = '$or' OR Reciever = 'Students'";
$result = mysqli_query( $link, $query );
while ( $row = mysqli_fetch_array( $result ) ) {
    $teacher = $row['Teacher'];
    $subject = $row['Subject'];
    $assignment = $row['Assignment'];
    $file = $row['Attachment'];
    $message_display = '';

    ?><br><br>
    <div class='message-div'>
        <div class='message-div-con'>
            <div class='title'>
                <h5 style='color: white; margin-left: 25px;'>From: <?php echo $teacher ?></h5>
            </div>
            <div class='message'><span style='color: black; margin-left: 25px;'>Assignment:</span><br>
                <p style='color: black; margin-left: 25px;'><?php echo $assignment ?></p>
                <p style='margin-left: 25px;'><a class='btn btn-primary' target='_blank' href="<?php if ($file) {
    echo "./Files/Attached_Message_Files/$file";
}else{
    echo "#";
} ?>"><?php if ( $file ) {
        echo $file;
    } else {
        echo 'No File';
    }
    ?></a></p>
            </div>
            <div style='color: white;' class='footer'>Subject:<span style='color: white; margin-left: 25px;'><?php echo $subject;
    ?></span></div>
        </div>
        <div class='sides'>
            <button class='btn'>fghjkl</button><br>
            <button class='btn'>fghjkl</button><br>
            <button class='btn'>fghjkl</button>
        </div>
    </div><br>

    <?php
}
?>

    <?php include 'footer.php' ?>