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
if (array_key_exists("pass", $_GET)) {
    include "connection.php";
    
    $display_result = "";
           
        }
else{
    header("Location: index.php");
}
 }else{
  header("Location: index.php");
}

?>
<?php include "header.php"; include "admin-nav.php"; ?>

<div class="det">
    <div class="msg-form">
    <form method="post">
        <h5>Select Class To View Class Data</h5>
        <select name="class" class="form-control" id="exampleSelect1">
      <option value="JSS 1">JSS 1</option>
      <option value="JSS 2">JSS 2</option>
      <option value="JSS 3">JSS 3</option>
      <option value="SSS 1">SSS 1</option>
      <option value="SSS 2">SSS 2</option>
      <option value="SSS 3">SSS 3</option>
        </select><br>
        <input type="submit" name="view" class="btn btn-success" value="View!">
    </form>
    </div>
<br>






  <div class="container bg-white rounded"><br>
    <table class="table table-striped table-bordered" id="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Middle Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Date Of Birth</th>
      <th scope="col">Class</th>
      <th scope="col">Gender</th>
      <th scope="col">Date Registerd</th>
    </tr>
  </thead>
  
  <tbody>
  <?php
  if (array_key_exists("view", $_POST)) {
    $class = $_POST['class'];
    $_SESSION['class'] = $class;
   $query = "SELECT * FROM `students` WHERE Class = '".mysqli_real_escape_string($link, $class)."'";
  $result = mysqli_query($link, $query);
  if (mysqli_num_rows($result) <= 0) {
        $error .= "<center><div class='alert alert-danger' role='alert'>No Data Recived.</div></center>";
  }
  while ($row = mysqli_fetch_array($result)) {
   
  ?>
    <tr>
      <th scope="row"><?php echo $row["id"] ?></th>
      <td><?php echo $row["Fname"] ?></td>
      <td><?php echo $row["Mname"] ?></td>
      <td><?php echo $row["Lname"] ?></td>
      <td><?php echo $row["DOB"] ?></td>
      <td><?php echo $row["Class"] ?></td>
      <td><?php echo $row["Gender"] ?></td>
      <td><?php echo $row["Date_Modified"] ?></td>
    </tr>
    <?php
  }
}
    ?>
  </tbody>
</table>
<?php echo $error; ?>
</div>
</div>
<?php include "footer.php"; ?>
