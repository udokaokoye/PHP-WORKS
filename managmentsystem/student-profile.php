<?php
if (array_key_exists("pass", $_GET)) {
    session_start();
      if (isset($_SESSION['id'])) {
      include "connection.php";
          $id = $_SESSION['id'];
          $query = "SELECT * FROM `students` WHERE `id` = '$id'";
          $result = mysqli_query($link, $query);
          $row = mysqli_fetch_array($result);
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
<?php include "header.php"; include "student-nav.php"; ?>


<div class="det">
    <div class="profile">
   <center><img style="width: 300px; height: 300px; border-radius: 50%;" src="./images/download.jpeg" alt=""></center> 
<div class= "profile-det">
        <h3>First Name: <strong><?php echo $row['Fname'] ?></strong> </h3>
        <h3>Middle Name: <strong><?php echo $row['Mname'] ?></strong> </h3>
        <h3>Last Name: <strong><?php echo $row['Lname'] ?></strong> </h3>
        <h3>Class: <strong><?php echo $row['Class'] ?></strong> </h3>
        <h3>Department: <strong><?php echo $row['Department'] ?></strong> </h3>
        <h3>Class Teacher: <strong><?php echo $row['Class_Teacher'] ?></strong> </h3>
    </div>
    </div>
</div>

<?php include "footer.php"; ?>