<?php
if ( array_key_exists( 'messagepass', $_GET ) ) {
    $error = '';
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
        if ( $_GET['messagepass'] == md5( md5( 'admin' ) ) ) {
            $ref = 'Admin';

            include 'connection.php';

        } else {
            echo 'Acess Denied';
        }
    } else {
        header( 'Location: index.php' );
    }
} else {
    header( 'Location: index.php' );
}
?>
<?php include 'header.php';
include 'admin-nav.php';
?>

<div class = 'det'>
<br>
<div class = 'student-nav'>
<h6 class = 'student-nav-active' id = 'reg-btn'>Your Messages </h6>
<h6> | </h6>
<h6 id = 'view-btn'> All Messages</h6>
</div>
<div id = 'view' class = 'hide'>
<br>
<div class = 'container bg-white round'><br>
<table class = 'table table-striped table-bordered' id = 'table'>
<thead class = 'thead-dark'>
<tr>
<th>From</th>
<th>To</th>
<th>Message</th>
<th>Attachment</th>
<th>Time</th>
<th>Delete</th>
</tr>
</thead>
<tbody>
<?php
$query = 'SELECT * FROM `messages`';
$result = mysqli_query( $link, $query );
while ( $row = mysqli_fetch_array( $result ) ) {
    $message = $row['Message'];
    $sender = $row['Sender'];
    $time = $row['Time'];
    $file = $row['Attachment'];
    $reciever = $row['Reciever'];
    $message_id = $row['id'];
    $message_display = '';
    $message_display .= "<br>$message<br><a href='./Files/Attached_Message_Files/$file'>$file</a><br>From:<strong><span> $sender</span></strong><span>____$time</span>";
    ?>
    <tr>
    <td><?php echo $sender;
    ?></td>
    <td><?php echo $reciever;
    ?></td>
    <td><?php echo nl2br( $message );
    ?></td>
    <td><a class = 'btn btn-primary' target = '_blank' href = '<?php if ($file) {
                  echo "./Files/Attached_Message_Files/$file";
                  }else {
                    echo "#";
                  } ?>'><?php if ( $file ) {
        echo $file;
    } else {
        echo 'No File';
    }
    ?></a>
    </td>
    <td><?php echo $time;
    ?></td>
    <td><a
    href = "admin-messages.php?messagepass=<?php echo $messagepass; ?>&&id=<?php echo $message_id ?>"><button
    style = 'margin-left: 25px;' class = 'btn btn-danger'><i

    class = 'fas fa-trash-alt'></i></button></a></td>
    </tr>
    <?php
}
?>
</tbody>
</table>

</div>
</div>

<div id = 'register'>
<br>
<?php
$query = "SELECT * FROM `messages` WHERE Reciever = '$ref' OR Reciever = 'Admin' OR Reciever = 'admin' ORDER BY `Time` DESC";
$result = mysqli_query( $link, $query );
if ( mysqli_num_rows( $result ) <= 0 ) {
    $error .= "<center><div class='alert alert-danger' role='alert'>No Message Recived.</div></center>";
}
while ( $row = mysqli_fetch_array( $result ) ) {
    $message = $row['Message'];
    $sender = $row['Sender'];
    $time = $row['Time'];
    $file = $row['Attachment'];
    $message_display = '';
    $message_display .= "<br>$message<br><a href='./Files/Attached_Message_Files/$file'>$file</a><br>From:<strong><span> $sender</span></strong><span>____$time</span>";
    ?>
    <div class = 'message-div'>
    <div class = 'message-div-con'>
    <div class = 'title'>
    <h5 style = 'color: white; margin-left: 25px;'>From: <?php echo $sender ?></h5>
    </div>
    <div class = 'message'><span style = 'color: black; margin-left: 25px;'>Message:</span><br>
    <p style = 'color: black; margin-left: 25px;'><?php echo $message ?></p>
    <p style = 'margin-left: 25px;'><a class = 'btn btn-primary' href = '<?php if ($file) {
 echo "./Files/Attached_Message_Files/$file";
}else {
  echo "#";
} ?>'><?php if ( $file ) {
        echo $file;
    } else {
        echo 'No File';
    }
    ?></a></p>
    </div>
    <div style = 'color: white;' class = 'footer'>Time: <span
    style = 'color: white; margin-left: 25px;'><?php echo $time ?></span></div>
    </div>
    </div><br>
    <?php
}
echo $error;
?>

</div>

</div>
<div class = 'hide'>
<span id = 'filter-btn'></span>
<span id = 'filter'></span>
</div>
</div>

<?php if (array_key_exists( 'id', $_GET)) {
    $ass_del_id = $_GET['id'];
}

?>



<!-- MODALLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL -->

<div id = 'myModall' class = 'modall'>

<!-- Modal content -->
<div class = 'modall-content'>
<a href = "admin-messages.php?messagepass=<?php echo $messagepass ?>"><i onclick = 'closemodal()' id = 'closebtn' class = 'fas fa-times float-right'></i></a><br>
<div class = 'modall-body'>
<h5 class = 'text-danger'>Warning!</h5>
<hr>
<p style = 'font-size: 20px;' class = 'text-center'>Are You  Sure You Want To Delete Message?</p>
</div>
<hr>
<center>
<a href = "admin-messages.php?messagepass=<?php echo $messagepass ?>"><button onclick = 'closemodal()' type = 'button'

class = 'btn btn-secondary'>Close</button></a>

<a href = "delete-message.php?messageid=<?php echo $ass_del_id; ?>&&ref=admin"><button type = 'button'

class = 'btn btn-danger'>Delete</button></a>
</center>
<hr>
</div>
<!-- Modal content -->

</div>
<!-- MODALLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL -->
</div>

<script>
// Get the modal

function openmodal() {
    modal.style.display = 'block';
}

function closemodal() {
    modal.style.display = 'none';
}

var modal = document.getElementById( 'myModall' );

window.onclick = function( event ) {
    if ( event.target == modal ) {
        modal.style.display = 'none';
    }
}
</script>

<?php if (array_key_exists( 'id', $_GET)) {
    ?>

    <script>
    openmodal();
    </script>

    <?php
}
?>

?>

<?php include 'footer.php' ?>