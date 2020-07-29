<?php
  session_start();
  if (isset($_SESSION['id'])) {
      include "connection.php";
     $id = $_SESSION['id'];
     $query = "SELECT * FROM `admin` WHERE `id` = '$id'";
     $result = mysqli_query($link, $query);
     if (!mysqli_num_rows($result)) {
       header("Location: index.php");
   }
    $error = "";
    $id = $_SESSION['id'];
    include "connection.php";
    $query = "SELECT * FROM `admin` WHERE id = $id";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $_SESSION['id'] = $row['id'];
    $firstname = $row['Fname'];
    $lastname = $row['Lname'];
    $display_name = "$lastname $firstname";
    $_SESSION['name'] = $display_name;
    $display = $_SESSION['name'];


   $query = "SELECT * FROM students";
   $result = mysqli_query($link, $query);
   $student_count = mysqli_num_rows($result);

   $query = "SELECT * FROM teachers";
   $result = mysqli_query($link, $query);
   $teacher_count = mysqli_num_rows($result);

   $query = "SELECT * FROM `admin`";
   $result = mysqli_query($link, $query);
   $admin_count = mysqli_num_rows($result);




}else{
  header("Location: index.php");
    }

    $secretpass = $row['Password'];

?>

<?php include "header.php"; include "admin-nav.php"; ?>
<div class="det">
<br>
<h1><div class="well text-center">Welcome <strong><?php echo $display; ?></strong></div></h1>
<br>
<hr>
<h3 class="text-center">Total Number Of Registerd Users</h3>
<div class="users">

    <div class="bg-primary text-white text-center">
      <h2><i id="users" class="fas fa-users icn"></i></h2>
      <h3>Admins</h3>
      <h1><?php echo $admin_count ?></h1>
      <a href="<?php echo "admin-panel.php?pass=$secretpass";?>"><button style="width: 100%" class="view-btnn">View</button></a>
    </div>

    <div class="bg-success text-white text-center">
    <h2><i id="users" class="fas fa-users icn"></i></h2>
    <h3>Students</h3>
    <h1><?php echo $student_count ?></h1>
    <a href="<?php echo "students.php?pass=$secretpass";?>"><button style="width: 100%" class="view-btnn">View</button></a>
    </div>

    <div class="bg-info text-white text-center">
    <h2><i class="fas fa-users icn"></i></h2>
    <h3>Teachers</h3>
    <h1><?php echo $teacher_count ?></h1>
    <a href="<?php echo "teachers.php?pass=$secretpass";?>"><button style="width: 100%" class="view-btnn">View</button></a>
    </div>

</div><hr><br>

<a href="#quick-access" style="text-decoration: none; color: inherit;"><h3 class="text-center">Quick  Access <i class="fas fa-chevron-down"></i></h3></a>
   <br><hr>
<div id="quick-access" class="quick-access">

      <div class="bg-danger text-white text-center">
      <br>
      <h2><i id="users" class="fas fa-eye icn"></i></h2>
          <h3>View All Class Data</h3>
          <a href="<?php echo "classes.php?pass=$secretpass";?>"><button style="width: 100%" class="view-btnn">View</button></a>
      </div>

      <div class="bg-warning  text-white text-center">
      <br>
      <h2><i id="users" class="fas fa-envelope icn"></i></h2>
          <h3>Messages</h3>
          <a href="<?php echo "admin-messages.php?messagepass=$messagepass";?>"><button style="width: 100%" class="view-btnn">View</button></a>
      </div>

      <div class="bg-dark  text-white text-center">
      <br>
      <h2><i id="users" class="fas fa-user-lock icn"></i></h2>
          <h3>Admin Panel</h3>
          <a href="<?php echo "admin-panel.php?pass=$secretpass";?>"><button style="width: 100%" class="view-btnn">View</button></a>
      </div>



</div>
<br><br>
<div class="quick-access">

<div class="bg-dark text-white text-center">
<br>
<h2><i id="users" class="fas fa-user-lock icn"></i></h2>
    <h3>Register Admin</h3>
    <a href="<?php echo "admin-panel.php?pass=$secretpass";?>"><button style="width: 100%" class="view-btnn">Register</button></a>
</div>

<div class="bg-danger  text-white text-center">
<br>
<h2><i id="users" class="fas fa-users icn"></i></h2>
    <h3>Register Students</h3>
    <a href="<?php echo "students.php?pass=$secretpass";?>"><button style="width: 100%" class="view-btnn">Register</button></a>
</div>

<div class="bg-warning  text-white text-center">
<br>
<h2><i id="users" class="fas fa-chalkboard-teacher icn"></i></h2>
    <h3>Register Teachers</h3>
    <a href="<?php echo "teachers.php?pass=$secretpass";?>"><button style="width: 100%" class="view-btnn">Register</button></a>
</div>
</div>
</div>

<?php include "footer.php"; ?>