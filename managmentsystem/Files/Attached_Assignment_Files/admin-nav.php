<?php
include 'connection.php';
$id = $_SESSION['id'];
$query = "SELECT * FROM `admin` WHERE id = $id";
$result = mysqli_query( $link, $query );
$row = mysqli_fetch_array( $result );
$_SESSION['id'] = $row['id'];
$firstname = $row['Fname'];
$lastname = $row['Lname'];
$passport_show = $row['Passport'];
$display_name = "$lastname $firstname";
$_SESSION['name'] = $display_name;
$display = $_SESSION['name'];
$secretpass = $row['Password'];
?>

<title>Admin | <?php echo $_SESSION['name'];
?></title>
<div class = 'nav'><h1>Elimshire College</h1>
<form action = 'logout.php' method = 'post'>
<button class = 'btn btn-light' name = 'logout-btn' type = 'submit'>Logout</button>
</form>
<button class = 'btn btn-light' id = 'menu'>menu</button>
</div>
<div class = 'main'>
<nav id = 'side-nav' class = 'side-nav'>
<br><h2>Admin Portal</h2>
<img style = 'width: 110px; height: 100px; border-radius: 50%;' src = "./Files/Admins_Passport/<?php echo $passport_show; ?>" alt = "<?php echo $display ?>">
<?php $messagepass = md5( md5( 'admin' ) );
?>
<ul>
<a style = 'text-decoration: none; color: white;' href = 'logged.php'><li><i class = 'fas fa-home'></i>Dashboard</li></a>
<hr><a style = 'text-decoration: none; color: white;' href = '<?php echo "admin-messages.php?messagepass=$messagepass";?>'><li><i class = 'fas fa-envelope'></i>Messages</li></a>
<hr><a style = 'text-decoration: none; color: white;' href = '<?php echo "admin-send-message.php?pass=$secretpass";?>'><li><i class = 'fas fa-paper-plane'></i>Send Message</li></a>
<hr><a style = 'text-decoration: none; color: white;' href = '<?php echo "admin-view-attendance.php?pass=$secretpass";?>'><li><i class = 'fas fa-share-square'></i>View Attendance Record</li></a>
<hr><a style = 'text-decoration: none; color: white;' href = '<?php echo "timetable.php?pass=$secretpass";?>'><li><i class = 'fas fa-calendar'></i>Timetable</li></a>
<hr><a style = 'text-decoration: none; color: white;' href = '<?php echo "admin-assignment.php?pass=$secretpass";?>'><li><i class = 'fas fa-pencil-alt'></i>Assignment</li></a>
<hr><a style = 'text-decoration: none; color: white;' href = '<?php echo "classes.php?pass=$secretpass";?>'><li><i class = 'fas fa-school'></i>Classes</li></a>
<hr><a style = 'text-decoration: none; color: white;' href = '<?php echo "subject.php?pass=$secretpass";?>'><li><i class = 'fas fa-book'></i>Subjects</li></a>
<hr><a style = 'text-decoration: none; color: white;' href = '<?php echo "teachers.php?pass=$secretpass";?>'><li><i class = 'fas fa-chalkboard-teacher'></i>Teachers</li></a>
<hr><a style = 'text-decoration: none; color: white;' href = '<?php echo "students.php?pass=$secretpass";?>'><li><i class = 'fas fa-users'></i>Students</li></a>
<hr><a style = 'text-decoration: none; color: white;' href = '<?php echo "edit-students.php?pass=$secretpass";?>'><li><i class = 'fas fa-pen'></i>Edit Students Data</li></a>
<hr><a style = 'text-decoration: none; color: white;' href = '<?php echo "parents.php?pass=$secretpass";?>'><li><i class = 'fas fa-user-friends'></i>Parents</li></a>
<hr><a style = 'text-decoration: none; color: white;' href = '<?php echo "admin-panel.php?pass=$secretpass";?>'><li><i class = 'fas fa-user-lock'></i>Administrator</li></a>
</ul>

</nav>