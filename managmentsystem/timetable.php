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
}else{
  header("Location");
}
include "connection.php";

?>


<?php
 include "header.php"; include "admin-nav.php";?>

<div class="det">
<h1>Timetable</h1>
<table class="table table-striped">
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
  $query = "SELECT * FROM `students` ORDER BY Fname";
  $result = mysqli_query($link, $query);
  while ($row = mysqli_fetch_array($result)) {

  ?>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <?php
  }
    ?>
  </tbody>
</table>
</div>
<?php include "footer.php" ?>