<?php
if ( array_key_exists( 'pass', $_GET ) ) {
    $error = '';
    include 'connection.php';
    $query = "SELECT `id` FROM `admin` WHERE `password` = '".mysqli_real_escape_string( $link, $_GET['pass'] )."'";
    $result = mysqli_query( $link, $query );
    if ( !mysqli_num_rows( $result ) ) {
        header( 'Location: index.php' );
    } else {
        reg();
    }
} else {
    header( 'Location: index.php' );
}

function reg() {
    session_start();
    $error = '';
    include 'connection.php';
    if ( array_key_exists( 'submit', $_POST ) ) {
        if ( $_POST['studentemail'] == '' ) {

            $error .= "Student's Email Address Is Required";
        } else if ( $_POST['studentname'] == '' ) {

            $error .= "Student's Full Name Is Required";
        } else if ( $_POST['studentpassword'] == '' ) {

            $error .=  "Student's Password Is Required";
        } else if ( $_POST['studentclass'] == 'Select Class' ) {

            $error .=  "Student's Class Is Required";
        }
        if ( $error != '' ) {
            $error = '<p>There were error(s) in your form:</p>'.$error;
        } else {
            $query = "SELECT `id` FROM `students` WHERE username = '".mysqli_real_escape_string( $link, $_POST['studentname'] )."'";
            $result = mysqli_query( $link, $query );
            if ( mysqli_num_rows( $result ) > 0 ) {
                echo '<p>Student Is Already Registered</p>';
            } else {

                $query = "INSERT INTO  `students` (`email`, `password`, `username`, `class`) VALUES ('".mysqli_real_escape_string( $link, $_POST['studentemail'] )."',
             '".mysqli_real_escape_string( $link, $_POST['studentpassword'] )."', '".mysqli_real_escape_string( $link, $_POST['studentname'] )."', '".mysqli_real_escape_string( $link, $_POST['studentclass'] )."')";
                if ( mysqli_query( $link, $query ) ) {
                    echo 'You Just Registered '. $_POST['studentname'];
                    echo '<br>';
                    $query = "UPDATE `students` SET `password` = '".md5( md5( mysqli_insert_id( $link ) ).$_POST['studentpassword'] )."' WHERE id =".mysqli_insert_id( $link ).' LIMIT 1';
                    mysqli_query( $link, $query );

                    $_SESSION['id'] = mysqli_insert_id( $link );

                } else {
                    echo 'error';
                }

            }
        }
    }

}

?>

<h3>Register A Student Below</h3>
<div>
<h5><?php echo $error;
?></h5>
</div>
<form method = 'POST'>
<input placeholder = 'Students Name' type = 'text' name = 'studentname'><br><br>
<input placeholder = 'Students E-mail' type = 'email' name = 'studentemail'><br><br>
<input placeholder = 'Students Password' type = 'password' name = 'studentpassword'><br><br>
<select name = 'studentclass' id = ''>
<option value = 'Select Class'>Select Class</option>
<option value = 'JSS 1'>JSS 1</option>
<option value = 'JSS 2'>JSS 2</option>
<option value = 'JSS 3'>JSS 3</option>
<option value = 'SS 1'>SS 1</option>
<option value = 'SS 2'>SS 2</option>
<option value = 'SS 3'>SS 3</option>
</select><br><br>
<input type = 'submit' name = 'submit' value = 'Register Student'>
</form>