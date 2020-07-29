<?php
if ( array_key_exists( 'pass', $_GET ) ) {
    $error = '';
    $success = '';
    session_start();
    if ( isset( $_SESSION['id'] ) ) {
        include 'connection.php';
        $id = $_SESSION['id'];
        $query = "SELECT * FROM `admin` WHERE `id` = '$id'";
        $result = mysqli_query( $link, $query );
        if ( !mysqli_num_rows( $result ) ) {
            header( 'Location: index.php' );
        }
        include 'connection.php';
        $query = "SELECT `id` FROM `admin` WHERE `password` = '".mysqli_real_escape_string( $link, $_GET['pass'] )."'";
        $result = mysqli_query( $link, $query );
        if ( !mysqli_num_rows( $result ) ) {
            header( 'Location: index.php' );
        } else {
            if ( array_key_exists( 'submit', $_POST ) ) {
                $firstname = $_POST['first-name'];
                $middlename = $_POST['middle-name'];
                $lastname = $_POST['last-name'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $passport = $_FILES['passport']['name'];

                $query = "SELECT * FROM `admin` WHERE Username = '".mysqli_real_escape_string( $link, $username )."'";
                $result = mysqli_query( $link, $query );
                if ( mysqli_num_rows( $result ) > 0 ) {
                    $error .= "<div class='alert alert-danger' role='alert'> <strong>$firstname $middlename $lastname</strong> Is Already Registerd To The Schools Database.</div>";
                } else {
                    $query = "INSERT INTO  `admin` (`Fname`, `Mname`, `Lname`, `email`, `Passport`, `username`, `password`) VALUES (
                                        '".mysqli_real_escape_string( $link, $firstname )."', 
                                        '".mysqli_real_escape_string( $link, $middlename )."', 
                                        '".mysqli_real_escape_string( $link, $lastname )."', 
                                        '".mysqli_real_escape_string( $link, $email )."', 
                                        '".mysqli_real_escape_string( $link, $passport )."',  
                                        '".mysqli_real_escape_string( $link, $username )."', 
                                        '".mysqli_real_escape_string( $link, $password )."')";

                    if ( mysqli_query( $link, $query ) ) {
                        $success .= "<center><div class='alert alert-success' role='alert'>You Just Registerd <strong>$lastname $firstname</strong> To Elimshire College Admin Database</div></center>";
                        $tardir = './Files/Admins_Passport/';
                        $tarfile = $tardir . basename( $passport );
                        $type = pathinfo( $tarfile, PATHINFO_EXTENSION );
                        move_uploaded_file( $_FILES['passport']['tmp_name'], $tarfile );
                        $query = "UPDATE `admin` SET `Password` = '".md5( md5( mysqli_insert_id( $link ) ).$password )."' WHERE id =".mysqli_insert_id( $link ).' LIMIT 1';
                        mysqli_query( $link, $query );
                    } else {
                        echo 'error';
                    }
                }
            }

        }
    } else {
        header( 'Location: index.php' );
    }
} else {
    header( 'Location: index.php' );
}

?>
<?php include 'header.php';
include 'admin-nav.php' ?>

<div class = 'det'>
<br>
<div class = 'admin-register'>
<form method = 'POST' enctype = 'multipart/form-data'>
<div class = 'form-bar'><h3>Register Admin</h3></div>
<?php echo $error;
echo $success;
?>
<div class = 'form-group'>
<label for = 'exampleInputPassword1'>First Name</label>
<input required type = 'text' name = 'first-name' class = 'form-control' id = '' placeholder = 'First Name'>
</div>
<div class = 'form-group'>
<label for = 'exampleInputPassword1'>Middle Name</label>
<input required type = 'text' name = 'middle-name' class = 'form-control' id = '' placeholder = 'Middle Name'>
</div>
<div class = 'form-group'>
<label for = 'exampleInputPassword1'>Last Name</label>
<input required type = 'text' name = 'last-name' class = 'form-control' id = '' placeholder = 'Last Name'>
</div>
<div class = 'form-group'>
<label for = 'exampleInputEmail1'>Email address</label>
<input required type = 'email' class = 'form-control' name = 'email' id = 'exampleInputEmail1' aria-describedby = 'emailHelp' placeholder = 'Enter email'>
<small id = 'emailHelp' class = 'form-text text-muted'>We'll never share your email with anyone else.</small>
</div>
<div class = 'form-group'>
<label for = 'exampleInputFile'>Passport Photograph</label>
<input required name = 'passport' type = 'file' class = 'form-control-file' id = 'exampleInputFile' aria-describedby = 'fileHelp'>
<small id = 'fileHelp' class = 'form-text text-muted'>Upload Students Passport <strong>( Size-Max: 64kb )</strong></small>
</div>
<hr>
<div class = 'from-bar'><h3>Login Details</h3></div><br>
<div class = 'form-group'>
<label for = 'exampleInputPassword1'>Username</label>
<input required type = 'text' name = 'username' class = 'form-control' id = '' placeholder = 'Username'>
</div>
<div class = 'form-group'>
<label for = 'exampleInputPassword1'>Password</label>
<input required type = 'password' name = 'password' class = 'form-control' id = 'exampleInputPassword1' placeholder = 'Password'>
</div>
<button type = 'submit' name = 'submit' class = 'btn btn-primary'>Submit</button>
</form>
</div>
</div>

<?php

?>