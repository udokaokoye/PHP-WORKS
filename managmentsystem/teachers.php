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
    $error = "";
    $success = "";
    include "connection.php";
    $query = "SELECT * FROM `admin` WHERE `password` = '".mysqli_real_escape_string($link, $_GET['pass'])."'";
        $result = mysqli_query($link, $query);
        if (!mysqli_num_rows($result)) {
            header("Location: index.php");
        }else{
            $error = "";
            include "connection.php";
             if (array_key_exists('register-student', $_POST)) {
               $title = $_POST['title'];
                $first_name = $_POST['first-name'];
                $middle_name = $_POST['middle-name'];
                $last_name = $_POST['last-name'];
                $gender = $_POST['gender'];
                $dob = $_POST['dob'];
                $soo = $_POST["state-of-origin"];
                $lga = $_POST['lga'];
                $religion = $_POST['religion'];
                $address = $_POST['address'];
                $contact = $_POST['contact-number'];
                $email = $_POST['email'];
                $passport = $_FILES["passport"]["name"];

                // Login details

                $username = $_POST['username'];
                $password = $_POST['password'];


                $query = "SELECT `id` FROM `teachers` WHERE Fname = '".mysqli_real_escape_string($link, $first_name)."' AND Mname = '".mysqli_real_escape_string($link, $middle_name)."' AND Lname = '".mysqli_real_escape_string($link, $last_name)."'";
                    $result = mysqli_query($link, $query);
                    if (mysqli_num_rows($result) > 0) {
                       
                   $error .= "<div class='alert alert-danger' role='alert'> <strong>$first_name $middle_name $last_name</strong> Is Already Registerd To The Schools Database.</div>";
                    }else{
                    $query = "INSERT INTO  `teachers` (`Title`, `Fname`, `Mname`, `Lname`, `Gender`, `DOB`, `SOO`, `LGA`, `Religion`, `Address`, `Contact`, `Email`, `Passport`, `Username`, `Password`)
                    VALUES (
                  '".mysqli_real_escape_string($link, $title)."', 
                  '".mysqli_real_escape_string($link, $first_name)."', 
                  '".mysqli_real_escape_string($link, $middle_name)."', 
                  '".mysqli_real_escape_string($link, $last_name)."', 
                  '".mysqli_real_escape_string($link, $gender)."', 
                  '".mysqli_real_escape_string($link, $dob)."', 
                  '".mysqli_real_escape_string($link, $soo)."', 
                  '".mysqli_real_escape_string($link, $lga)."', 
                  '".mysqli_real_escape_string($link, $religion)."', 
                  '".mysqli_real_escape_string($link, $address)."', 
                  '".mysqli_real_escape_string($link, $contact)."', 
                  '".mysqli_real_escape_string($link, $email)."', 
                  '".mysqli_real_escape_string($link, $passport)."', 
                  '".mysqli_real_escape_string($link, $username)."', 
                  '".mysqli_real_escape_string($link, $password)."')";
                  if (mysqli_query($link, $query)) {
                    $success .= "<center><div class='alert alert-success' role='alert'>You Just Registerd <strong>$last_name $first_name</strong> To Elimshire College</div></center>";
                    $tardir = "./Files/Teachers_Passport/";
                            $tarfile = $tardir . basename($passport);
                            $type = pathinfo($tarfile,PATHINFO_EXTENSION);
                            move_uploaded_file($_FILES["passport"]["tmp_name"], $tarfile);
                    $query = "UPDATE `teachers` SET `password` = '".md5(md5(mysqli_insert_id($link)).$password)."' WHERE id =".mysqli_insert_id($link)." LIMIT 1";
                   mysqli_query($link, $query);
                  } else{
                    echo "error";
                }
              }
        }
}
}
else{
    header("Location: index.php");
}
}else{
  header("Location: index.php");
}
?>


<?php include "header.php"; include "admin-nav.php" ?>
<div class="det">
<div class="student-nav">
<h6 class="student-nav-active" id="reg-btn">Register Teacher </h6><h6> | </h6><h6 id="view-btn"> View Teachers</h6>
</div>

<div id="view" class="hide"><br>
<div class="container bg-white rounded"><br>
<table class="table table-striped table-bordered" id="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">First Name</th>
      <th scope="col">Middle Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Date Of Birth</th>
      <th scope="col">Gender</th>
      <th scope="col">Date Registerd</th>
    </tr>
  </thead>
  
  <tbody>
  <?php 
  $query = "SELECT * FROM `teachers` ORDER BY Fname";
  $result = mysqli_query($link, $query);
  while ($row = mysqli_fetch_array($result)) {

  ?>
    <tr>
      <td scope="row"><?php echo $row["id"] ?></td>
      <td><?php echo $row["Title"] ?></td>
      <td><?php echo $row["Fname"] ?></td>
      <td><?php echo $row["Mname"] ?></td>
      <td><?php echo $row["Lname"] ?></td>
      <td><?php echo $row["DOB"] ?></td>
      <td><?php echo $row["Gender"] ?></td>
      <td><?php echo $row["Date_Modified"] ?></td>
    </tr>
    <?php
  }
    ?>
  </tbody>
</table>
</div>
</div>


<div id="register" class="register">
<br>
<form method="POST" enctype="multipart/form-data">
  <strong><h2>Register a teacher below</h2></strong><br><hr><br>
<div class="form-bar"><h3>Personal Information</h3></div>
<br>
<?php  echo $success; ?>
<?php  echo $error; ?>
<br>
<div class="form-group">
    <label for="exampleSelect1">Title</label>
    <select required name="title" class="form-control" id="exampleSelect1">
      <option></option>
      <option value="Mr.">Mr.</option>
      <option value="Mrs.">Mrs.</option>
      <option value="Master.">Master.</option>
      <option value="Miss.">Miss.</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">First Name</label>
    <input required type="text" name="first-name" class="form-control" id="exampleInputEmail1" placeholder="First Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Middle Name</label>
    <input required type="text" name="middle-name" class="form-control" id="exampleInputEmail1" placeholder="Middle Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Last Name</label>
    <input required type="text" name="last-name" class="form-control" id="exampleInputEmail1" placeholder="Last Name">
  </div>
  <div class="form-group">
  <label for="example-date-input" class="col-2 col-form-label">Date Of Birth</label>
  <div class="col-10">
    <input required class="form-control" name="dob" type="date" value="0-0-0" id="example-date-input">
  </div>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">State Of Origin</label>
    <input required type="text" name="state-of-origin" class="form-control" id="exampleInputEmail1" placeholder="State Of Origin">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">LGA</label>
    <input required type="text" name="lga" class="form-control" id="exampleInputEmail1" placeholder="LGA">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Religion</label>
    <input required type="text" name="religion" class="form-control" id="exampleInputEmail1" placeholder="Religion">
  </div>
  <div class="form-group">
    <label for="exampleSelect1">Gender</label>
    <select required name="gender" class="form-control" id="exampleSelect1">
      <option></option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
  </div>
<div class="form-group">
    <label for="exampleInputEmail1">Residential Adress</label>
    <textarea required name="address" class="form-control" placeholder="Residential Adress" id=""  rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Contact Number</label>
    <input name="contact-number" type="text" class="form-control" id="">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Passport Photograph</label>
    <input required name="passport" type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
    <small id="fileHelp" class="form-text text-muted">Upload Students Passport <strong>(Size-Max: 64kb)</strong></small>
  </div><br><hr><br>
  



  <div class="form-bar"><h3>Login Details</h3></div>
  <br>
  <div class="alert alert-warning" role="alert">
  <strong>Note</strong> The following details that will be entered below will be used by teachers to <strong>login</strong> to their portal. 
</div>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input required type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input required type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Passsword">
  </div>
  <button type="submit" name="register-student" class="btn btn-primary">Register</button>
</form>
<span id="filter-btn"></span>
<span id="filter"></span>
  <br><hr><br>



</div>

<?php include "footer.php" ?>
