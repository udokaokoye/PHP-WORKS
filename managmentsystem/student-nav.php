<?php
include "connection.php";
$id = $_SESSION['id'];
 $query = "SELECT * FROM `students` WHERE id = $id";
 $result = mysqli_query($link, $query);
 $row = mysqli_fetch_array($result);
 $_SESSION['id'] = $row['id'];
 $secretpass = $row['Password'];
 $firstname = $row['Fname'];
    $lastname =  $row['Lname'];
    $display = "";
     $display .= "$firstname $lastname";
     $messagepass = md5(md5("student"));
?>




<title>Student | <?php echo $display; ?></title>
<div class="nav">
<button class="btn btn-light" id="menu">menu</button>
    <h1>Elimshire College</h1>

<form action="logout.php" method="post">
    <button class="btn btn-light" name="logout-btn" type="submit">Logout</button>
</form>
</div>
 <div class="main">
<nav id="side-nav" class="side-nav">
<br><h2>Students Portal</h2>
<?php $messagepass = md5(md5("student")); ?>
<ul>
<a style="text-decoration: none; color: white;" href="student.portal.php"><li><i class="fas fa-home"></i>Dashboard</li></a>
<hr><a style="text-decoration: none; color: white;" href="<?php echo "student-assignment.php?pass=$secretpass"?>"><li><i class="fas fa-pencil-alt"></i>Assignment</li></a>
<hr><a style="text-decoration: none; color: white;" href="<?php echo "student-messages.php?messagepass=$messagepass" ?>"><li><i class="fas fa-envelope"></i>Messages</li></a>
<hr><a style="text-decoration: none; color: white;" href="<?php echo "student-notes.php?pass=$secretpass"?>"><li><i class="fas fa-book"></i>View Notes</li></a>
<hr><a style="text-decoration: none; color: white;" href="<?php echo "student-timetable.php?pass=$secretpass"?>"><li><i class="fas fa-calendar"></i>Timetable</li></a>
<hr><a style="text-decoration: none; color: white;" href=""><li><i class="fas fa-book"></i>Exams</li></a>
<hr><a style="text-decoration: none; color: white;" href=""><li><i class="fas fa-book"></i>Subjects</li></a>
</ul>

</nav>