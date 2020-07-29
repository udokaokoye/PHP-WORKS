<?php
ini_set('display_errors',0);
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
<div class="det"><hr>
    <h2 class="text-center">Attendance Record</h2>
    <hr>
    <div class="msg-form">
    <form method="post">
        <h5>Select Class To View Attendance Record</h5><br>
        <h5>Class</h5>
        <select name="class" placeholder="Select Class" class="form-control" id="exampleSelect1">
            <option value="JSS 1">JSS 1</option>
            <option value="JSS 2">JSS 2</option>
            <option value="JSS 3">JSS 3</option>
            <option value="SSS 1">SSS 1</option>
            <option value="SSS 2">SSS 2</option>
            <option value="SSS 3">SSS 3</option>
        </select><br>


        <h5>Department</h5>
        <select name="department" placeholder="Select Class" class="form-control" id="exampleSelect1">
            <option value="None">None</option>
            <option value="Science">Science</option>
            <option value="Art">Art</option>
            <option value="Commercial">Commercial</option>
        </select><br>

        <div class="form-group">
            <div class="col-10">
            <input class="form-control" name="date" required type="date"  id="example-date-input">
        </div><br>
</div>
            <input type="submit" name="view" class="btn btn-success" value="View!">
    </form>
    </div><br><br>




<div class="container bg-white rounded"><br>
<table class="table table-striped table-bordered" id="table">
  <thead class="thead-dark">
    <tr>
      <th>S/N</th>
      <th>Student Name</th>
      <th>Class</th>
      <th>Department</th>
      <th>Attendance</th>
    </tr>
  </thead>
  <tbody>
      <?php

if (array_key_exists("view", $_POST)) {
    $date = $_POST['date'];
    $class = $_POST['class'];
    $department = $_POST['department'];
    if ($department == "None") {
        $query = "SELECT * FROM `attendance_record` WHERE Class = '".mysqli_real_escape_string($link, $class)."' AND `Date` = '$date'";
    }else{

    $query = "SELECT * FROM `attendance_record` WHERE Class = '".mysqli_real_escape_string($link, $class)."' AND Department = '".mysqli_real_escape_string($link, $department)."' AND `Date` = '$date'";

}
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) <= 0) {
            $error .= "<center><div class='alert alert-danger' role='alert'>No Data Recived.</div></center>";
    }
    $sn = 0;
    $show ="";
while ($row = mysqli_fetch_array($result)) {
$sn++;
$attendancestatus = $row['Attendance_Status'];
if ($attendancestatus == "Present") {

        $show = "<span class='badge badge-success'>$attendancestatus</span>";
}else{
    $show = "<span class='badge badge-danger'>$attendancestatus</span>";
}
?>
    <tr>
      <th scope="row"><?php echo $sn; ?></th>
      <td><?php echo $row['Student_Name']; ?></td>
      <td><?php echo $row['Class']; ?></td>
      <td><?php echo $row['Department'] ?></td>
      <td><strong><?php echo $show; ?></strong></td>
    </tr>

<?php } }?>  
  </tbody>
</table>

<?php echo $error; ?>
</div>
</div>
<?php include "footer.php";  ?>
