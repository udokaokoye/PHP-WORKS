<?php
    $ref = "";
if (array_key_exists("messagepass", $_GET)) {
    session_start();
  if (isset($_SESSION['id'])) {
      include "connection.php";
     $id = $_SESSION['id'];
     $query = "SELECT * FROM `admin` WHERE `id` = '$id'";
     $result = mysqli_query($link, $query);
     if (!mysqli_num_rows($result)) {
       header("Location: index.php");
   }
   include "connection.php";
   if ($_GET['messagepass'] == md5(md5("student"))) {
    $ref = "Students";    
}else if ($_GET['messagepass'] == md5(md5("teacher"))) {
    $ref = "Teachers";
}else if ($_GET['messagepass'] == md5(md5("admin"))) {
    $ref = "Admin";
}
  
}else{
    header("Location: index.php");
}
}

else{
    header("Location: index.php");
}

?>
<?php include "header.php"; ?>


<?php
if ($_GET['messagepass'] == md5(md5("admin"))) { 
?>
<title>Admin | <?php echo $_SESSION['name']; ?></title>
<div class="nav">
    <h1>Elimshire College</h1>
    <form action="logout.php" method="post">
        <button class="logoutbtn" name="logout-btn" type="submit">Logout</button>
    </form>
    <button id="menu">menu</button>
</div>
<div class="main">
    <nav id="side-nav" class="side-nav">
        <br>
        <h2>Admin Portal</h2>
        <?php $messagepass = md5(md5("admin")); ?>
        <ul>
            <a style="text-decoration: none; color: white;" href="logged.php">
                <li><i class="fas fa-tachometer-alt"></i>Dashboard</li>
            </a>
            <hr><a style="text-decoration: none; color: white;"
                href="<?php echo "messages.php?messagepass=$messagepass";?>">
                <li><i class="fas fa-envelope"></i>Messages</li>
            </a>
            <hr><a style="text-decoration: none; color: white;"
                href="<?php echo "admin-send-message.php?pass=$secretpass";?>">
                <li><i class="fas fa-share-square"></i>Send Message</li>
            </a>
            <hr><a style="text-decoration: none; color: white;" href="">
                <li><i class="fas fa-calendar"></i>Timetable</li>
            </a>
            <hr><a style="text-decoration: none; color: white;" href="">
                <li><i class="fas fa-pencil-alt"></i>Assignment</li>
            </a>
            <hr><a style="text-decoration: none; color: white;" href="">
                <li><i class="fas fa-school"></i>Classes</li>
            </a>
            <hr><a style="text-decoration: none; color: white;" href="">
                <li><i class="fas fa-book"></i>Subjects</li>
            </a>
            <hr><a style="text-decoration: none; color: white;"
                href="<?php echo "admin-view-registered-teachers.php?pass=$secretpass";?>">
                <li><i class="fas fa-chalkboard-teacher"></i>Teachers</li>
            </a>
            <hr><a style="text-decoration: none; color: white;" href="<?php echo "students.php?pass=$secretpass";?>">
                <li><i class="fas fa-users"></i>Students</li>
            </a>
            <hr><a style="text-decoration: none; color: white;" href="">
                <li><i class="fas fa-user-friends"></i>Parents</li>
            </a>
            <hr><a style="text-decoration: none; color: white;" href="">
                <li><i class="fas fa-user-lock"></i>Administrator</li>
            </a>
        </ul>

    </nav>
    <div class="det">
        <br><br><br>
        <?php
 include "connection.php";
    $query = "SELECT * FROM `messages` WHERE Reciever = '$ref'";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_array($result)) {
        echo $row['Message'];
    }
    ?>
    </div>
</div>
<?php
}
?>



<?php
if ($_GET['messagepass'] == md5(md5("teacher"))) {

    ?>

<title>Teacher | <?php echo $_SESSION['name']; ?></title>
<div class="nav">
    <h1>Elimshire College</h1>
    <form action="logout.php" method="post">
        <button class="logoutbtn" name="logout-btn" type="submit">Logout</button>
    </form>
    <button id="menu">menu</button>
</div>
<div class="main">
    <nav id="side-nav" class="side-nav">
        <br>
        <h2>Teachers Portal</h2>
        <?php $messagepass = md5(md5("teacher")) ?>
        <ul>
            <a href="<?php echo "messages.php?messagepass=$messagepass";?>">
                <li>View Messages</li>
            </a>
            <center><a style="text-decoration: none;" href="./admin-register-students.php">
                    <li>Register Students</li>
                </a>
                <a style="text-decoration: none;" href="./admin-register-teachers.php">
                    <li>Register Teachers</li>
                </a>
                <a style="text-decoration: none;" href="./admin-view-register-teachers.php">
                    <li>View Registered Teachers</li>
                </a>
                <a style="text-decoration: none;" href="./admin-view-register-students.php">
                    <li>View Registered Students</li>
                </a>
                <a style="text-decoration: none;" href="./admin-resultsheet.php">
                    <li>Send Result Sheet</li>
                </a>
                <br>
                <form action="logout.php" method="post">
                    <button class="logoutbtn" name="logout-btn" type="submit">Logout</button>
                </form>
            </center>
        </ul>
    </nav>

    <div class="det">
        <br><br><br>
        <h4><?php echo $error; ?></h4>
        <h1>Welcome <?php echo $display; ?></h1>
    </div>

</div>
<?php
}
?>
















<?php include "footer.php"; ?>