<?php

if (array_key_exists("pass", $_GET)) {
  $pass = $_GET['pass'];
    session_start();
      if (isset($_SESSION['id'])) {
          include "connection.php";
          $id = $_SESSION['id'];
          $query = "SELECT * FROM `admin` WHERE `id` = '$id'";
          $result = mysqli_query($link, $query);
          if (!mysqli_num_rows($result)) {
            header("Location: index.php");
        }

        

    }else{
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}
?>
<?php include "header.php"; include "admin-nav.php"; ?>

<div class="det">
<br>
<div class="container bg-white round"><br>
<table class="table table-striped table-bordered" id="table">
        <thead class="thead-dark">
          <tr>
            <th>Teacher</th>
            <th>To</th>
            <th>Subject</th>
            <th>Assignment</th>
            <th>Attachment</th>
            <th>Time</th>
            <th>Delete</th>
          </tr>
        </thead>
<tbody>
<?php 
    $query = "SELECT * FROM `assignments`";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_array($result)) {
    $teacher = $row['Teacher'];
    $subject = $row['Subject'];
    $reciever = $row['Reciever'];
    $assignment = $row['Assignment'];
    $file = $row['Attachment'];
    $time = $row['Time'];
    $assignment_id = $row['id'];
    $message_display = "";

?>
          <tr>
            <td><?php echo $teacher; ?></td>
            <td><?php echo $reciever; ?></td>
            <td><?php echo $subject; ?></td>
            <td><?php echo nl2br($assignment); ?></td>
            <td><a class="btn btn-primary" target="_blank" href='<?php if ($file) {
 echo "./Files/Attached_Assignment_Files/$file";
}else {
  echo "#";
} ?>'><?php if ($file) {
 echo $file;
}else {
  echo "No File";
} ?></a></td>
            <td><?php echo $time; ?></td>
            <td><a href="admin-assignment.php?pass=<?php echo $pass ?>&&id=<?php echo $assignment_id; ?>"><button style="margin-left: 25px;" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a></td>
            
          </tr>
     

<?php
}
?>
</tbody>
</table>
</div>









<?php
if (isset($_GET['id'])) {
 $delte_id = $_GET['id'];
}
?>



<!-- MODALLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL -->

<div id = 'myModall' class = 'modall'>

<!-- Modal content -->
<div class = 'modall-content'>
<a href="admin-assignment.php?pass=<?php echo $pass ?>"><i onclick = 'closemodal()' id = 'closebtn' class = 'fas fa-times float-right'></i></a><br>
<div class = 'modall-body'>
<h5 class = 'text-danger'>Warning!</h5>
<hr>
<p style = 'font-size: 20px;' class = 'text-center'>Are You Sure You Want To Delete Assignment?</p>
</div>
<hr>
<center>
<a href = "admin-assignment.php?pass=<?php echo $pass ?>"><button onclick = 'closemodal()' type = 'button'

class = 'btn btn-secondary'>Close</button></a>
<a href = "delete-assignment.php?assignmentid=<?php echo $delte_id; ?>&&ref=admin&&pass=<?php echo $pass; ?>"><button type = 'button'

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
<?php
if (array_key_exists("id", $_GET)) {
?>

<script>
  openmodal();
</script>

<?php
}
?>
<?php include "footer.php"; ?>