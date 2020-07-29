<?php
if (array_key_exists("messagepass", $_GET)) {
    session_start();
    if (isset($_SESSION['id'])) {
    include "connection.php";
        $id = $_SESSION['id'];
        $query = "SELECT * FROM `students` WHERE `id` = '$id'";
        $result = mysqli_query($link, $query);
        if (!mysqli_num_rows($result)) {
          header("Location: index.php");
      }
   include "connection.php";
   if ($_GET['messagepass'] == md5(md5("student"))) {
    $ref = "Students";    
    $id = $_SESSION['id'];
  include "connection.php";
    $query = "SELECT * FROM `students` WHERE id = '$id'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $department = $row['Department'];
    $class = $row['Class'];
    $or = "$class-$department";
    $all = "$class-All";
   
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
<?php include "header.php"; include "student-nav.php"; ?>
<title>Student | <?php echo $_SESSION['name']; ?></title>



<div class="det">
    <br>
  <?php 
    $query = "SELECT * FROM `messages` WHERE Reciever = '$ref' OR Reciever = '$or' OR Reciever = '$all' ORDER BY `Time` DESC";
    $result = mysqli_query($link, $query);
while ($row = mysqli_fetch_array($result)) {
    $message = $row['Message'];
    $sender = $row['Sender'];
    $time = $row['Time'];
    $file = $row['Attachment'];
    $message_display = "";
    $message_display .= "<br>$message<br><a href='./Files/Attached_Message_Files/$file'>$file</a><br>From:<strong><span> $sender</span></strong><span>____$time</span>";
?>
        <div class="message-div">
<div class="message-div-con">
<div class="title"><h5 style="color: white; margin-left: 25px;">From: <?php echo $sender ?></h5></div>
<div class="message"><span style="color: black; margin-left: 25px;">Message:</span><br><p style="color: black; margin-left: 25px;"><?php echo $message ?></p><p style="margin-left: 25px;"><a class="btn btn-primary" target="_blank" href='<?php if ($file) {
 echo "./Files/Attached_Message_Files/$file";
}else {
  echo "#";
} ?>'><?php if ($file) {
 echo $file;
}else {
  echo "No File";
} ?></a></p></div>
<div style="color: white;" class="footer">Time: <span style="color: white; margin-left: 25px;" ><?php echo $time ?></span></div>
</div>
</div><br>
    <?php
  }
    ?>

</div>

        <?php include "footer.php"; ?>