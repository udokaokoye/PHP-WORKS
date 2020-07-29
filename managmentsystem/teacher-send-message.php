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
  include "connection.php";
    $query = "SELECT `id` FROM `teachers` WHERE `password` = '".mysqli_real_escape_string($link, $_GET['pass'])."'";
        $result = mysqli_query($link, $query);
        if (!mysqli_num_rows($result)) {
            header("Location: index.php");
        }else{
          
       
$error = "";
$success = "";
include "connection.php";
$id = $_SESSION['id'];
$query = "SELECT * FROM `teachers` WHERE id = $id";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
$title = $row['Title'];
$fname = $row['Fname'];
$lname = $row['Lname'];
$input = "$title $lname $fname";


if (array_key_exists("send", $_POST)) {
  
  $from = $_POST['from'];
  $to = $_POST['to'];
  $message = $_POST['message'];
  $attachment = $_FILES["attachment"]["name"];
  
$query = "INSERT INTO  `messages` (`Sender`, `Reciever`, `Message`, `Attachment`) VALUES (
        '".mysqli_real_escape_string($link, $from)."', 
       '".mysqli_real_escape_string($link, $to)."',  
       '".mysqli_real_escape_string($link, $message)."', 
       '".mysqli_real_escape_string($link, $attachment)."'
    )";
    if (mysqli_query($link, $query)) {
            $tardir = "./Files/Attached_Message_Files/";
            $tarfile = $tardir . basename($attachment);
            $type = pathinfo($tarfile,PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["attachment"]["tmp_name"], $tarfile);
    $success .= "<center><div class='alert alert-success' role='alert'>Your Message Has Been Sent To <strong>$to</strong> </div></center>";
     } else{
        $error .= "<center><div class='alert alert-danger' role='alert'>Unable To Complete Your Request, Try Again Later. </div></center>";
 }
     
}
}

}else{
  header("Location: index.php");
}
}

?>

<?php include "header.php"; include "teacher-nav.php"; ?>


<div class="det">
<div class="msg-form">
        <h3>Send Message</h3><br>
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
<?php include "footer.php"; ?>