<?php
 if (array_key_exists("pass", $_GET)) {
    $error = "";
    $success = "";
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
    <h2 class="text-center">Edit Students Data</h2>
    <div class="container">
<table class="table table-striped" id="table">
  <thead>
    <tr>
      <th>S/N</th>
      <th>Student Name</th>
      <th>Class</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      
      $query = "SELECT * FROM students";
      $result = mysqli_query($link, $query);
      $sn = 0;
      while ($row = mysqli_fetch_array($result)) {
        $student_department = $row['Department'];
        $student_firstname = $row['Fname'];
        $student_lastname =  $row['Lname'];
        $student_class = $row['Class'];
        $student_input = "$student_firstname $student_lastname";
        $student_id = $row['id'];
          $sn++;
      ?>
    <tr>
      <th scope="row"><?php echo $sn; ?></th>
      <td><?php echo $student_input; ?></td>
      <td><?php echo $student_class; ?></td>
      <td><a href="edit-students-data.php?id=<?php echo $student_id; ?>"><span class="badge badge-info"><i class="fas fa-pen"> Edit Data</i></span></a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
</div>
<?php include "footer.php" ?>