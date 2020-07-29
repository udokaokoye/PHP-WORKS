<?php
if (array_key_exists("messagepass", $_GET)) {
    
    session_start();
    if (isset($_SESSION['id'])) {
    include "connection.php";
        $id = $_SESSION['id'];
        $query = "SELECT * FROM `teachers` WHERE `id` = '$id'";
        $result = mysqli_query($link, $query);
        if (!mysqli_num_rows($result)) {
          header("Location: index.php");
      }
   include "connection.php";
   if ($_GET['messagepass'] == md5(md5("teacher"))) {
    $ref = "Teachers";    
 
}else{
    echo "Acess Denied";
}
    }else{
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}
?>
<?php include "header.php"; include "teacher-nav.php" ?>

<div class="det">
<br>
<div class="student-nav">
<h6 class="student-nav-active" id="reg-btn">Your Messages </h6><h6> | </h6><h6 id="view-btn">Sent</h6>
</div>



<div id="view" class="hide">
    <div class="container">
        <br>
<table class="table table-striped table-bordered">
        <thead class="thead-dark">
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
$query = "SELECT * FROM `teachers` WHERE id = $id";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
$title = $row['Title'];
$fname = $row['Fname'];
$lname = $row['Lname'];
$input = "$title $lname $fname";

$query = "SELECT * FROM `messages` WHERE Sender = '$input'";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_array($result)) {
    $message = $row['Message'];
    $sender = $row['Sender'];
    $time = $row['Times'];
    $file = $row['Attachment'];
    $reciever = $row['Reciever'];
    $message_id = $row['id'];
    $message_display = "";
    $message_display .= "<br>$message<br>$file<br>From:<strong><span> $sender</span></strong><span>____$time</span>";
?>

<tr>
            <td><?php echo $sender; ?></td>
            <td><?php echo $reciever; ?></td>
            <td><?php echo nl2br($message); ?></td>
            <td><a class="btn btn-primary" target="_blank" href='<?php if ($file) {
                  echo "./Files/Attached_Message_Files/$file";
                  }else {
                    echo "#";
                  } ?>'><?php if ($file) {
                  echo $file;
                  }else {
                    echo "No File";
                  } ?></a>
            </td>
            <td><?php echo $time; ?></td>
            <td><a href="teacher-messages.php?messagepass=<?php echo $messagepass ?>&&id=<?php echo $message_id; ?>"><button style="margin-left: 25px;" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a></td>
            
            
          </tr>

<?php } ?>
     </table>
</div>
</div>









<span id="filter-btn"></span>
<span id="filter"></span>
<div id="register" class="">
    <div class="container">
        <table class="table table-striped table-bordered" id="">
        <thead class="thead-dark">
          <tr>
            <th>From</th>
            <th>To</th>
            <th>Message</th>
            <th>Attachment</th>
            <th>Time</th>
          </tr>
        </thead>
<tbody>

  <?php 
$query = "SELECT * FROM `messages` WHERE Reciever = '$ref' ORDER BY `id`";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_array($result)) {
    $message = $row['Message'];
    $sender = $row['Sender'];
    $time = $row['Time'];
    $file = $row['Attachment'];
    $reciever = $row['Reciever'];
    $message_display = "";
    $message_display .= "<br>$message<br>$file<br>From:<strong><span> $sender</span></strong><span>____$time</span>";
?>
<tr>
            <td><?php echo $sender; ?></td>
            <td><?php echo $reciever; ?></td>
            <td><?php echo nl2br($message); ?></td>
            <td><a class="btn btn-primary" target="_blank" href='<?php if ($file) {
                  echo "./Files/Attached_Message_Files/$file";
                  }else {
                    echo "#";
                  } ?>'><?php if ($file) {
                  echo $file;
                  }else {
                    echo "No File";
                  } ?></a>
            </td>
            <td><?php echo $time; ?></td>
            
          </tr>
    <?php
  }
    ?>
    </table>
    </div>
</div>





<?php
if (array_key_exists('id', $_GET)) {
  $del_mess_id = $_GET['id'];
}
?>





<!-- MODALLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL -->

<div id = 'myModall' class = 'modall'>

<!-- Modal content -->
<div class = 'modall-content'>
<a href="teacher-messages.php?messagepass=<?php echo $messagepass ?>"><i onclick = 'closemodal()' id = 'closebtn' class = 'fas fa-times float-right'></i></a><br>
<div class = 'modall-body'>
<h5 class = 'text-danger'>Warning!</h5>
<hr>
<p style = 'font-size: 20px;' class = 'text-center'>Are You  Sure You Want To Delete Message?</p>
</div>
<hr>
<center>
<a href = "teacher-messages.php?messagepass=<?php echo $messagepass ?>"><button onclick = 'closemodal()' type = 'button'

class = 'btn btn-secondary'>Close</button></a>

<a href = "delete-message.php?messageid=<?php echo $del_mess_id; ?>&&ref=teacher"><button type = 'button'

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


<?php include "footer.php" ?>
