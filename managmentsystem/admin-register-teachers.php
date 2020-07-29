<?php

if ( array_key_exists( 'pass', $_GET ) ) {

    include 'connection.php';
    $query = "SELECT * FROM `admin` WHERE `password` = '".mysqli_real_escape_string( $link, $_GET['pass'] )."'";
    $result = mysqli_query( $link, $query );
    $row = mysqli_fetch_array( $result );
    $secretpass = $row['password'];
    if ( !mysqli_num_rows( $result ) ) {
        header( 'Location: index.php' );
    } else {
        reg();
    }
} else {
    header( 'Location: index.php' );
}
$error = '';

function reg() {

    session_start();

    include 'connection.php';
    if ( array_key_exists( 'teachersubmit', $_POST ) ) {
        $error = '';
        if ( $_POST['teacheremail'] == '' ) {

            $error .= "Teacher's Email Address Is Required";
        } else if ( $_POST['teachername'] == '' ) {

            $error .= "Teacher's Full Name Is Required";
        } else if ( $_POST['teacherpassword'] == '' ) {

            $error .=  "Teacher's Password Is Required";
        }
        if ( $error != '' ) {

            $error = '<p>There were error(s) in your form:</p>'.$error;
        } else {
            $query = "SELECT `id` FROM `teachers` WHERE username = '".mysqli_real_escape_string( $link, $_POST['teachername'] )."'";
            $result = mysqli_query( $link, $query );
            if ( mysqli_num_rows( $result ) > 0 ) {
                echo '<p>Teacher Is Already Registered</p>';
            } else {

                $query = "INSERT INTO  `teachers` (`email`, `password`, `username`) VALUES ('".mysqli_real_escape_string( $link, $_POST['teacheremail'] )."',
             '".mysqli_real_escape_string( $link, $_POST['teacherpassword'] )."', '".mysqli_real_escape_string( $link, $_POST['teachername'] )."')";
                if ( mysqli_query( $link, $query ) ) {
                    echo 'You Just Registered '. $_POST['teacheremail'];
                    echo '<br>';
                    $query = "UPDATE `teachers` SET `password` = '".md5( md5( mysqli_insert_id( $link ) ).$_POST['teacherpassword'] )."' WHERE id =".mysqli_insert_id( $link ).' LIMIT 1';
                    mysqli_query( $link, $query );

                    $_SESSION['id'] = mysqli_insert_id( $link );

                } else {
                    echo 'error';
                }

            }
        }
    }
}

include 'header.php'
?>
<title>Register Teacher Portal</title>
<div class = 'nav'><h1>Elimshire College</h1>
<form action = 'logout.php' method = 'post'>
<button class = 'logoutbtn' name = 'logout-btn' type = 'submit'>Logout</button>
</form>
<button id = 'menu'>menu</button>
</div>
<div class = 'main'>
<nav id = 'side-nav' class = 'side-nav'>
<br><h2>Admin Portal</h2>

<ul>
<center><a style = 'text-decoration: none;' href = '<?php echo 'admin-register-students.php?pass = $secretpass';?>'><li>Register Students</li></a>
<a style = 'text-decoration: none;' href = '<?php echo 'admin-register-teachers.php?pass = $secretpass';?>'><li>Register Teachers</li></a>
<a style = 'text-decoration: none;' href = '<?php echo 'admin-view-registered-teachers.php?pass = $secretpass';?>'><li>View Registered Teachers</li></a>
<a style = 'text-decoration: none;' href = '<?php echo 'admin-view-registered-students.php?pass = $secretpass';?>'><li>View Registered Students</li></a>
<a style = 'text-decoration: none;' href = '<?php echo 'admin-resultsheet.php?pass = $secretpass';?>'><li>Send Result Sheet</li></a>
<br> <form action = 'logout.php' method = 'post'>
<button class = 'logoutbtn' name = 'logout-btn' type = 'submit'>Logout</button>
</form></center>
</ul>
</nav>
<div class = 'det'>
<h1>Register A Teacher</h1>
<center><div class = 'form-div'>
<form method = 'post'>

<h3>Enter Teachers Credentials</h3>
<h5><?php echo $error;
?></h5>
<input class = 'text-input2' type = 'text' name = 'teachername' class = 'text-input' placeholder = 'Teachers Full Name'>
<input class = 'text-input2' name = 'teacheremail' placeholder = 'E-Mail' type = 'text'><br>
<input class = 'text-input2' name = 'teacherpassword' placeholder = 'password' type = 'password'><br><br>
<input class = 'logoutbtn' name = 'teachersubmit' type = 'submit' value = 'Login'>
</form>
</div></center>
</div>

<?php include 'footer.php' ?>