<?php

if (array_key_exists("pass", $_GET)) {
  session_start();
    if (isset($_SESSION['id'])) {
    include "connection.php";
        $id = $_SESSION['id'];
        $query = "SELECT * FROM `teachers` WHERE `id` = '$id'";
        $result = mysqli_query($link, $query);
        if (!mysqli_num_rows($result)) {
          header("Location: index.php");
      }
    $success = "";
    $error = "";
    include "connection.php";
    $query = "SELECT `id` FROM `teachers` WHERE `password` = '".mysqli_real_escape_string($link, $_GET['pass'])."'";
        $result = mysqli_query($link, $query);
        if (!mysqli_num_rows($result)) {
            header("Location: index.php");
        }else{
          $pass = $_GET['pass'];
            $id = $_SESSION['id'];
$query = "SELECT * FROM `teachers` WHERE id = $id";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
$title = $row['Title'];
$fname = $row['Fname'];
$lname = $row['Lname'];
$input = "$title $lname $fname";
        }

        if (array_key_exists("send", $_POST)) {
  
            $from = $_POST['from'];
            $subject = $_POST['subject'];
            $to = $_POST['to'];
            $message = $_POST['message'];
            $attachment = $_FILES["attachment"]["name"];
            
          $query = "INSERT INTO  `assignments` (`Teacher`, `Subject`, `Reciever`, `Assignment`, `Attachment`) VALUES (
                  '".mysqli_real_escape_string($link, $from)."', 
                  '".mysqli_real_escape_string($link, $subject)."',
                 '".mysqli_real_escape_string($link, $to)."',  
                 '".mysqli_real_escape_string($link, $message)."', 
                 '".mysqli_real_escape_string($link, $attachment)."'
              )";
              if (mysqli_query($link, $query)) {
                $tardir = "./Files/Attached_Assignment_Files/";
                $tarfile = $tardir . basename($attachment);
                $type = pathinfo($tarfile,PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["attachment"]["tmp_name"], $tarfile);
              $success .= "<center><div class='alert alert-success' role='alert'>Your Assignment Has Been Sent To <strong>$to</strong> </div></center>";
               } else{
                  $error .= "<center><div class='alert alert-danger' role='alert'>Unable To Complete Your Request, Try Again Later. </div></center>";
           }
               
          }


}else{
    header("Location: index.php");
}
}else{
  header("Location: index.php");
}

?>

<?php include "header.php"; include "teacher-nav.php"; ?>

<div class="det">
  <br>
  <div class="student-nav">
<h6 class="student-nav-active" id="reg-btn">Send Assignment</h6><h6> | </h6><h6 id="view-btn">View Sent Assignments</h6>
</div>
<span id="filter-btn"></span>
<span id="filter"></span>
<div id="view" class="hide">

<div class="container">
<table class="table table-striped table-bordered" id="">
        <thead class="thead-dark">
          <tr>
            <th>From</th>
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
$query = "SELECT * FROM `assignments` WHERE Teacher = '$input'";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_array($result)) {
  $teacher = $row['Teacher'];
    $subject = $row['Subject'];
    $assignment = $row['Assignment'];
    $reciever = $row['Reciever'];
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
                  } ?></a>
            </td>
            <td><?php echo $time; ?></td>
            <td><a href="teacher-assignment.php?pass=<?php echo $pass ?>&&id=<?php echo $assignment_id; ?>"><button style="margin-left: 25px;" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a></td>
            
</tr>
<?php
}
?>
</tbody>
</table>
</div>
</div>










<div id="register">

<div class="msg-form">
        <h3>Send Assignment</h3><br>
        <?php echo $success; echo $error; ?>
<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
    <label for="exampleInputEmail1">From</label>
    <input required type="text" name="from" value="<?php echo $input; ?>" readonly class="form-control" id="exampleInputEmail1">
  </div>
  <div class="form-group">
    <label for="exampleSelect1">Send To</label>
    <select required width="500px" name="to" class="form-control" id="exampleSelect1">
      <option value="Students">Students (All)</option>
      <option value="JSS 1">JSS 1</option>
      <option value="JSS 2">JSS 2</option>
      <option value="JSS 3">JSS 3</option>
      <option value="SSS 1-All">SSS 1 (All)</option>
      <option value="SSS 1-Science">SSS 1 (Science)</option>
      <option value="SSS 1-Art">SSS 1 (Art)</option>
      <option value="SSS 1-Commercial">SSS 1 (Commercial)</option>
      <option value="SSS 2-All">SSS 2 (All)</option>
      <option value="SSS 2-Science">SSS 2 (Science)</option>
      <option value="SSS 2-Art">SSS 2 (Art)</option>
      <option value="SSS 2-Commercial">SSS 2 (Commercial)</option>
      <option value="SSS 3-All">SSS 3 (All)</option>
      <option value="SSS 3-Science">SSS 3 (Science)</option>
      <option value="SSS 3-Art">SSS 3 (Art)</option>
      <option value="SSS 3-Commercial">SSS 3 (Commercial)</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleSelect1">Subject</label>
    <select required width="500px" name="subject" class="form-control" id="exampleSelect1">
    <?php
      include "connection.php";
      $query = "SELECT * FROM `subjects` WHERE Teacher = '$input'";
      $result = mysqli_query($link, $query);
      while ($row = mysqli_fetch_array($result)) {
        
        ?>
        <option value="<?php echo $row['Subject']  ?>"><?php echo $row['Subject']  ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleTextarea">Message</label>
    <textarea required width="500px" name="message" class="form-control" id="exampleTextarea" columns="3" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" name="attachment" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
    <small id="fileHelp" class="form-text text-muted">Size Max: 35kb</small>
  </div>
  <input type="submit" name="send" value="Send!" class="btn btn-success">
</form>
</div>

</div>











<?php
if (array_key_exists('id', $_GET)) {
  $del_ass_id = $_GET['id'];
}
?>







<!-- MODALLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL -->

<div id = 'myModall' class = 'modall'>

<!-- Modal content -->
<div class = 'modall-content'>
<a href="teacher-assignment.php?pass=<?php echo $pass ?>"><i onclick = 'closemodal()' id = 'closebtn' class = 'fas fa-times float-right'></i></a><br>
<div class = 'modall-body'>
<h5 class = 'text-danger'>Warning!</h5>
<hr>
<p style = 'font-size: 20px;' class = 'text-center'>Are You  Sure You Want To Delete Message?</p>
</div>
<hr>
<center>
<a href = "teacher-assignment.php?pass=<?php echo $pass ?>"><button onclick = 'closemodal()' type = 'button'

class = 'btn btn-secondary'>Close</button></a>

<a href = "delete-assignment.php?assignmentid=<?php echo $del_ass_id; ?>&&ref=teacher&&pass=<?php echo $pass ?>"><button type = 'button'

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
if (array_key_exists('id', $_GET)) {
    ?>
<script>
openmodal();
</script>
<?php
}
?>
<?php include "footer.php"; ?>