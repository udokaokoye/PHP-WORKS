<?php
if (array_key_exists("pass", $_GET)) {
    $error = "";
    $success = "";
    session_start();
      if (isset($_SESSION['id'])) {
      include "connection.php";
          $id = $_SESSION['id'];
          $query = "SELECT * FROM `teachers` WHERE `id` = '$id'";
          $result = mysqli_query($link, $query);
          if (!mysqli_num_rows($result)) {
            header("Location: index.php");
        }
        $query = "SELECT * FROM `teachers` WHERE `id` = '$id'";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        $class = $row['Class'];
        $firstname = $row['Fname'];
        $lastname =  $row['Lname'];
        $teacher_input = "$firstname $lastname";

        $query = "SELECT * FROM `students` WHERE `Class` = '$class'";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        $student_firstname = $row['Fname'];
        $student_lastname =  $row['Lname'];
        $student_input = "$student_firstname $student_lastname";

        $date = date("Y-m-d");

        if (array_key_exists("submit", $_POST)) {
          $query = "SELECT * FROM `attendance_record` WHERE `Class` = '$class' AND `Date` = '$date'";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) > 0) {
          $error .= "<div class='alert alert-danger text-center' role='alert'>Attendance Already Taken.</div>";
           }
           else{

          foreach ($_POST['attendance'] as $do=>$attendance) {
           $studentname = $_POST['student_name'][$do];
           $studentdepartment = $_POST['student_department'][$do];
           $studentclass = $class;
           $date = date("Y-m-d");
           $query = "INSERT INTO `attendance_record` (`Student_Name`, `Class`, `Department`, `Attendance_Status`, `Date`) VALUES ('$studentname', '$studentclass', '$studentdepartment', '$attendance', '$date')";
              if (mysqli_query($link, $query)) {
                $success .= "<center><div class='alert alert-success' role='alert'>You Have Successfully Marked The Attendance Of <strong>$studentname</strong>.</div></center>";
              }else{
                $error .= "<center><div class='alert alert-danger' role='alert'>Cannot Mark Attendance Now.<br>If Issue Countinues Please Contact Your Administrator.</div></center>";
              }
          }
          
        }
        }

        

    }else{
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}

?>

<?php include "header.php"; include "teacher-nav.php";?>

<div class="det">
  <form method="POST">
    <div class="bg-success text-white"><h1 class="text-center">Date: <?php echo date("d-m-Y") ?></h1></div>
    <?php echo $success; echo $error; ?>
  <div class="container">
<table class="table table-striped">
  <thead>
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
      $query = "SELECT * FROM `students` WHERE `Class` = '$class'";
      $result = mysqli_query($link, $query);
      $sn = 0;
      $counter = 0;
      while ($row = mysqli_fetch_array($result)) {
          $student_department = $row['Department'];
          $student_firstname = $row['Fname'];
          $student_lastname =  $row['Lname'];
          $student_input = "$student_firstname $student_lastname";
          $student_id = $row['id'];
          $sn++;
    ?>
    <tr>
      <th scope="row"><?php echo $sn; ?></th>
      <td>
          <?php echo $student_input ?>
          <input type="hidden" name="student_name[]" value="<?php echo $student_input ?>">
      </td>
      <td><?php echo $class; ?></td>
      <td>
        <?php echo $student_department; ?>
        <input type="hidden" name="student_department[]" value="<?php echo $student_department; ?>">
      </td>
      <td>
            <div class="form-check form-check-inline">
            <label class="form-check-label">
            <input required class="form-check-input" type="radio" name="attendance[<?php echo $counter ?>]" id="" value="Present"> Present
            </label>
            </div>


            <div class="form-check form-check-inline">
            <label class="form-check-label">
            <input required class="form-check-input" type="radio" name="attendance[<?php echo $counter ?>]" id="" value="Absent"> Absent
            </label>
            </div>
      </td>
    </tr>
      <?php
      $counter++;
     } 
     ?>
  </tbody>
</table>
<input type="submit" value="Mark Attendance" name="submit" class="btn btn-primary">
</form>
</div>
</div>
<?php include "footer.php"; ?>
