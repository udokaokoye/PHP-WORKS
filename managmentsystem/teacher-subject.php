<?php
if (array_key_exists("pass", $_GET)) {
  session_start();
    if (isset($_SESSION['id'])) {
    include "connection.php";
        $id = $_SESSION['id'];
        $query = "SELECT * FROM `teachers` WHERE `id` = '$id'";
        $result = mysqli_query($link, $query);
        if (!mysqli_num_rows($result)) {
          header("Location: index.php");
      }
    $success = "";
    $error = "";
    include "connection.php";
    $query = "SELECT `id` FROM `teachers` WHERE `password` = '".mysqli_real_escape_string($link, $_GET['pass'])."'";
        $result = mysqli_query($link, $query);
        if (!mysqli_num_rows($result)) {
            header("Location: index.php");
        }else{
            
         
        }
}else{
    header("Location: index.php");
}
}else{
  header("Location: index.php");
}

?>
<?php include "header.php"; include "teacher-nav.php"; ?>
<div class="det">
<h2>Subjects</h2>





<div class="subject-div">
        <h3>Sort Subjects</h3><br>
        <?php echo $success; echo $error; ?>
<form method="POST">
  <div class="form-group">
    <label for="exampleSelect1">Select Category</label>
    <select required width="500px" name="category" class="form-control" id="exampleSelect1">
      <option value="Junior Secondary">Junior Secondary</option>
      <option value="Senior Secondary">Senior Secondary</option>
    </select>
  </div>
  <input type="submit" name="submit" value="Send!" class="btn btn-success">
</form>

<br><br><br>



<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Subject</th>
      <th scope="col">Teacher</th>
      <th scope="col">Category</th>
    </tr>
  </thead>
  
  <tbody>
  <?php
  if (array_key_exists("submit", $_POST)) {
    $error ="";
    $category = $_POST['category'];
   $query = "SELECT * FROM `subjects` WHERE Category = '".mysqli_real_escape_string($link, $category)."'";
  $result = mysqli_query($link, $query);
  if (mysqli_num_rows($result) <= 0) {
        $error .= "<center><div class='alert alert-danger' role='alert'>No Data Recived.</div></center>";
  }
  while ($row = mysqli_fetch_array($result)) {
   
  ?>
    <tr>
      <td><?php echo $row["Subject"] ?></td>
      <td><?php echo $row["Teacher"] ?></td>
      <td><?php echo $row["Category"] ?></td>
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