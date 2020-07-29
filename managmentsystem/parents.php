<?php
    if (array_key_exists("pass", $_GET)) {
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
        $query = "SELECT `id` FROM `admin` WHERE `password` = '".mysqli_real_escape_string($link, $_GET['pass'])."'";
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

<?php include "header.php"; include "admin-nav.php"; ?>

<div class="det">


<div class="subject-div">
        <h3>Parents</h3><br>
<form method="POST">
  <div class="form-group">
    <label for="exampleSelect1">Select Category</label>
    <select required width="500px" name="category" class="form-control" id="exampleSelect1">
      <option value="All">All Parents</option>
      <option value="JSS 1">JSS 1 Parents</option>
      <option value="JSS 2">JSS 2 Parents</option>
      <option value="JSS 3">JSS 3 Parents</option>
      <option value="SSS 1">SSS 1 Parents</option>
      <option value="SSS 2">SSS 2 Parents</option>
      <option value="SSS 3">SSS 3 Parents</option>
    </select>
  </div>
  <input type="submit" name="submit" value="Send!" class="btn btn-success">
</form><br> <br>


<div class="container bg-white rounded"><br>
<table class="table table-bordered table-striped" id="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Father's Name</th>
      <th scope="col">Mother's Name</th>
      <th scope="col">Child's Name</th>
      <th scope="col">Parents Contact</th>
    </tr>
  </thead>
  
  <tbody>
  <?php
  
  $error ="";
  if (array_key_exists("submit", $_POST)) {
    $category = $_POST['category'];
    if ($category == "All") {
        $query = "SELECT * FROM `students`";
    }else{
        $query = "SELECT * FROM `students` WHERE Class = '".mysqli_real_escape_string($link, $category)."'";
    }
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) <= 0) {
              $error .= "<center><div class='alert alert-danger' role='alert'>No Data Recived.</div></center>";
        }
        while ($row = mysqli_fetch_array($result)) {
         
     $fathers_name_1= $row["F_Lname"];
     $fathers_name_2= $row["F_Fname"];
     $mothers_name_1= $row["M_Lname"];
     $mothers_name_2= $row["M_Fname"];
     $childs_name_1= $row["Fname"];
     $childs_name_2= $row["Lname"];
     $fathers_contact = $row["F_Contact"];
     $mothers_contact = $row["M_Contact"];

  ?>
    <tr>
      <td><?php echo "<strong>$fathers_name_1 $fathers_name_2</strong>";?></td>
      <td><?php echo "<strong>$mothers_name_1 $mothers_name_2</strong>";?></td>
      <td><?php echo "$childs_name_1 $childs_name_2";?></td>
      <td><?php echo "<strong>$fathers_contact, $mothers_contact</strong>";?></td>
    </tr>
    <?php
  }
}
    ?>
  </tbody>
</table>
</div>
<?php echo $error; ?>
</div>
</div>

<?php include "footer.php"; ?>