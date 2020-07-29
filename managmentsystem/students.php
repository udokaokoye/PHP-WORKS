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
        }else{$error = "";
            include "connection.php";
             if (array_key_exists('register-student', $_POST)) {
                $first_name = $_POST['first-name'];
                $middle_name = $_POST['middle-name'];
                $last_name = $_POST['last-name'];
                $class = $_POST['class'];
                $class_teacher = $_POST['class-teacher'];
                $department = $_POST['department'];
                $gender = $_POST['gender'];
                $dob = $_POST['dob'];
                $soo = $_POST["state-of-origin"];
                $lga = $_POST['lga'];
                $religion = $_POST['religion'];
                $address = $_POST['address'];
                $contact = $_POST['contact-number'];
                $email = $_POST['email'];
                $passport = $_FILES["passport"]["name"];

                // PARENTS DETAILS
                // Fathers details

                $fathers_first_name = $_POST['fathers-first-name'];
                $fathers_last_name = $_POST['fathers-last-name'];
                $fathers_soo = $_POST['fathers-state-of-origin'];
                $fathers_contact = $_POST['fathers-contact-number'];  
                $fathers_email = $_POST['fathers-email'];


                // Mothers details

                $mothers_first_name = $_POST['mothers-first-name'];
                $mothers_last_name = $_POST['mothers-last-name'];
                $mothers_soo = $_POST['mothers-state-of-origin'];
                $mothers_contact = $_POST['mothers-contact-number'];  
                $mothers_email = $_POST['mothers-email'];


                $parents_address = $_POST['parents-address'];


                // Login details

                $username = $_POST['username'];
                $password = $_POST['password'];
                


                $query = "SELECT `id` FROM `students` WHERE Fname = '".mysqli_real_escape_string($link, $first_name)."' AND Mname = '".mysqli_real_escape_string($link, $middle_name)."' AND Lname = '".mysqli_real_escape_string($link, $last_name)."'";
                    $result = mysqli_query($link, $query);
                    if (mysqli_num_rows($result) > 0) {
                       
                   $error .= "<div class='alert alert-danger' role='alert'> <strong>$first_name $middle_name $last_name</strong> Is Already Registerd To The Schools Database.</div>";
                    }else{
                    $query = "INSERT INTO  `students` (`Fname`, `Mname`, `Lname`, `Class`, `Class_Teacher`, `Department`, `Gender`, `DOB`, `SOO`, `LGA`, `Religion`, `Address`, `Contact`, `Email`, `Passport`, `F_Fname`, `F_Lname`, `F_SOO`, `F_Contact`, `F_Email`, `M_Fname`, `M_Lname`, `M_SOO`, `M_Contact`, `M_Email`, `Parent_Address`, `Username`, `Password`)
                    VALUES (
                  '".mysqli_real_escape_string($link, $first_name)."', 
                  '".mysqli_real_escape_string($link, $middle_name)."', 
                  '".mysqli_real_escape_string($link, $last_name)."', 
                  '".mysqli_real_escape_string($link, $class)."', 
                  '".mysqli_real_escape_string($link, $class_teacher)."', 
                  '".mysqli_real_escape_string($link, $department)."',  
                  '".mysqli_real_escape_string($link, $gender)."', 
                  '".mysqli_real_escape_string($link, $dob)."', 
                  '".mysqli_real_escape_string($link, $soo)."', 
                  '".mysqli_real_escape_string($link, $lga)."', 
                  '".mysqli_real_escape_string($link, $religion)."', 
                  '".mysqli_real_escape_string($link, $address)."', 
                  '".mysqli_real_escape_string($link, $contact)."', 
                  '".mysqli_real_escape_string($link, $email)."', 
                  '".mysqli_real_escape_string($link, $passport)."', 
                  '".mysqli_real_escape_string($link, $fathers_first_name)."', 
                  '".mysqli_real_escape_string($link, $fathers_last_name)."', 
                  '".mysqli_real_escape_string($link, $fathers_soo)."', 
                  '".mysqli_real_escape_string($link, $fathers_contact)."', 
                  '".mysqli_real_escape_string($link, $fathers_email)."', 
                  '".mysqli_real_escape_string($link, $mothers_first_name)."', 
                  '".mysqli_real_escape_string($link, $mothers_last_name)."', 
                  '".mysqli_real_escape_string($link, $mothers_soo)."', 
                  '".mysqli_real_escape_string($link, $mothers_contact)."', 
                  '".mysqli_real_escape_string($link, $mothers_email)."', 
                  '".mysqli_real_escape_string($link, $parents_address)."', 
                  '".mysqli_real_escape_string($link, $username)."', 
                  '".mysqli_real_escape_string($link, $password)."')";
                  if (mysqli_query($link, $query)) {
                    $success .= "<center><div class='alert alert-success' role='alert'>You Just Registerd <strong>$last_name $first_name</strong> To Elimshire College</div></center>";
                            $tardir = "./Files/Students_Passport/";
                            $tarfile = $tardir . basename($passport);
                            $type = pathinfo($tarfile,PATHINFO_EXTENSION);
                            move_uploaded_file($_FILES["passport"]["tmp_name"], $tarfile);
                    $query = "UPDATE `students` SET `password` = '".md5(md5(mysqli_insert_id($link)).$password)."' WHERE id =".mysqli_insert_id($link)." LIMIT 1";
                   mysqli_query($link, $query);
                  } else{
                    echo "error";
                }
              }
        }
}
}else{
 header("Location: index.php");
}
}
else{
    header("Location: index.php");
}

$secretpass = $_GET['pass'];


?>
<title>Register Students</title>
<?php include "header.php"; include "admin-nav.php"; ?>


<div class="det">
<div class="student-nav">
<h6 class="student-nav-active" id="reg-btn">Register Student </h6><h6> | </h6><h6 id="view-btn"> View All Students</h6><h6 class="br"> | </h6><h6 id="filter-btn"> Filter Search</h6>
</div>
<div id="view" class="view hide"><br>
  <div class="container bg-white rounded"><br>
<table class="table table-bordered table-striped" id="table">
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
      <td><?php echo $row["id"] ?></td>
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
    ?>
  </tbody>
</table>
</div>
</div>














<div id="register" class="register">
<br>
<form method="POST" enctype="multipart/form-data">
<div class="form-bar"><h3>Personal Information</h3></div>
<br>
<?php  echo $success; ?>
<?php  echo $error; ?>
<br>
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
  </div>
  <div class="form-group">
    <label for="exampleSelect1">Select Class</label>
    <select required name="class" class="form-control" id="exampleSelect1">
      <option></option>
      <option value="JSS 1">JSS 1</option>
      <option value="JSS 2">JSS 2</option>
      <option value="JSS 3">JSS 3</option>
      <option value="SSS 1">SSS 1</option>
      <option value="SSS 2">SSS 2</option>
      <option value="SSS 3">SSS 3</option>
    </select>
    <label for="exampleSelect2">Select Department</label>
        <select required name="department" placeholder="Select Class" class="form-control" id="exampleSelect2">
        <option></option>
        <option value="None">None</option>
      <option value="Science">Science</option>
      <option value="Art">Art</option>
      <option value="Commercial">Commercial</option>
        </select><br>

        <label for="exampleSelect2">Class Teacher</label>
        <select required name="class-teacher" placeholder="Class Teacher" class="form-control" id="exampleSelect2">
        <?php
            $query = "SELECT * FROM `teachers` ORDER BY Fname";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
              $title = $row['Title'];
              $fname = $row['Fname'];
              $lname = $row['Lname'];
              $input = "$title $lname $fname";
        ?>
        <option value="<?php echo $input ?>"><?php echo $input ?></option>
        <?php } ?>
        </select>
            
        <br>
  </div>
  <br><hr><br>






  <div class="form-bar"><h3>Parent/Guardian Information</h3></div>
  <br>
   <strong><h5 style="text-decoration: underline;">Fathers Info</h5></strong> 
    <br>
<div class="form-group">
    <label for="exampleInputEmail1">Fathers First Name</label>
    <input required type="text" name="fathers-first-name" class="form-control" id="exampleInputEmail1" placeholder="Fathers First Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Fathers Last Name</label>
    <input required type="text" name="fathers-last-name" class="form-control" id="exampleInputEmail1" placeholder="Fathers Last Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">State Of Origin</label>
    <input required type="text" name="fathers-state-of-origin" class="form-control" id="exampleInputEmail1" placeholder="State Of Origin">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Fathers Contact Number</label>
    <input required type="text" name="fathers-contact-number" class="form-control" id="exampleInputEmail1" placeholder="Fathers Contact Number">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"> Fathers Email address</label>
    <input type="email" name="fathers-email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Fathers Email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <br>

  <strong><h5 style="text-decoration: underline;">Mothers Info</h5></strong> 
    <br>
<div class="form-group">
    <label for="exampleInputEmail1">Mothers First Name</label>
    <input required type="text" name="mothers-first-name" class="form-control" id="exampleInputEmail1" placeholder="Mothers First Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Mothers Last Name</label>
    <input required type="text" name="mothers-last-name" class="form-control" id="exampleInputEmail1" placeholder="Mothers Last Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">State Of Origin</label>
    <input required type="text" name="mothers-state-of-origin" class="form-control" id="exampleInputEmail1" placeholder="State Of Origin">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Mothers Contact Number</label>
    <input required type="text" name="mothers-contact-number" class="form-control" id="exampleInputEmail1" placeholder="Mothers Contact Number">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"> Mothers Email address</label>
    <input type="email" name="mothers-email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Mothers Email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <br>
  <div class="form-group">
    <label for="exampleInputEmail1">Parent/Guardian Residential Adress</label>
    <input required type="text" name="parents-address" class="form-control" id="exampleInputEmail1" placeholder="Parent/Guardian Residential Adress">
  </div>
  <br><hr><br>




  <div class="form-bar"><h3>Login Details</h3></div>
  <br>
  <div class="alert alert-warning" role="alert">
  <strong>Note</strong> The following details that will be entered below will be used by students to <strong>login</strong> to their portal. 
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
   </div>



   <div class="hide"; id="filter">
   <div class="msg-form">
    <form method="post">
        <h5>Select Class To View Class Data</h5>
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
        <input type="submit" name="view" class="btn btn-success" value="View!">
    </form>
    </div>









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
  if (array_key_exists("view", $_POST)) {
        $class = $_POST['class'];
        $department = $_POST['department'];
        if ($department == "None") {
            $query = "SELECT * FROM `students` WHERE Class = '".mysqli_real_escape_string($link, $class)."'";
        }else{

        $query = "SELECT * FROM `students` WHERE Class = '".mysqli_real_escape_string($link, $class)."' AND Department = '".mysqli_real_escape_string($link, $department)."'";
    
    }
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
</div>
<?php include "footer.php" ?>