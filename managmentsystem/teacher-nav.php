<?php
$id = $_SESSION['id'];
include "connection.php";
 $query = "SELECT * FROM `teachers` WHERE id = $id";
 $result = mysqli_query($link, $query);
 $row = mysqli_fetch_array($result);
 $_SESSION['id'] = $row['id'];
 $secretpass = $row['Password'];
 $firstname = $row['Fname'];
    $lastname =  $row['Lname'];
    $display = "";
     $display .= "$firstname $lastname";
?>

<title>Teacher | <?php echo $display; ?></title>
<div class="nav"><h1>Elimshire College</h1>
<form action="logout.php" method="post">
    <button class="btn btn-light" name="logout-btn" type="submit">Logout</button>
</form>
<button class="btn btn-light" id="menu">menu</button>
</div>
 <div class="main">
<nav id="side-nav" class="side-nav">
<div class="title-display"><h2> Teacher's Portal</h2></div>
<div>
<img class="nav-profile-image" src="./images/download.jpeg" alt="">
</div>
<?php $messagepass = md5(md5("teacher")); ?>
<ul>
<a style="text-decoration: none; color: white;" href="teacher.portal.php"><li><i class="fas fa-home"></i>Dashboard</li></a><hr>
<a style="text-decoration: none; color: white;" href="<?php echo "attendance.php?pass=$secretpass";?>"><li><i class="fas fa-clipboard-check"></i>Attendance</li></a>
<hr>
<li id="drop-message" class="show-message"><i class="fas fa-envelope"></i>Messages <i class="fas fa-chevron-right icn-small"></i>
<ul id="message-ul" class="hide message">
<a style="text-decoration: none; color: white;" href="<?php echo "teacher-messages.php?messagepass=$messagepass";?>"><li><i class="fas fa-envelope"></i>Messages</li></a>
<a style="text-decoration: none; color: white;" href="<?php echo "teacher-send-message.php?pass=$secretpass";?>"><li><i class="fas fa-paper-plane"></i>Send Message</li></a>
</ul>
</li>
<hr><a style="text-decoration: none; color: white;" href="<?php echo "teacher-send-notes.php?pass=$secretpass";?>"><li><i class="fas fa-book"></i>Send Notes</li></a>
<hr><a style="text-decoration: none; color: white;" href="<?php echo "teacher-timetable.php?pass=$secretpass";?>"><li><i class="fas fa-calendar"></i>Timetable</li></a>
<hr><a style="text-decoration: none; color: white;" href="<?php echo "teacher-assignment.php?pass=$secretpass";?>"><li><i class="fas fa-pencil-alt"></i>Assignment</li></a>
<hr><a style="text-decoration: none; color: white;" href="<?php echo "teacher-classes.php?pass=$secretpass";?>"><li><i class="fas fa-school"></i>Classes</li></a>
<hr><a style="text-decoration: none; color: white;" href="<?php echo "teacher-subject.php?pass=$secretpass";?>"><li><i class="fas fa-book"></i>Subjects</li></a>
</ul>

</nav>

