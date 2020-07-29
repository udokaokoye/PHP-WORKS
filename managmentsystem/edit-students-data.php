<?php
if (array_key_exists("id", $_GET)) {
    session_start();
    include "connection.php";
    $success = "";
    $error = "";
    $student_id = $_GET['id'];
    $query = "SELECT * FROM students WHERE id = '$student_id'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);

    $student_firstname = $row['Fname'];
    $student_middlename = $row['Mname'];
    $student_lastname = $row['Lname'];
    $class = $row['Class'];
    $classteacher = $row['Class_Teacher'];
    $department = $row['Department'];
    $gender = $row['Gender'];
    $dob = $row['DOB'];
    $soo = $row['SOO'];
    $lga = $row['LGA'];
    $religion = $row['Religion'];
    $address = $row['Address'];
    $contact = $row['Contact'];
    $email = $row['Email'];
    $student_passport = $row['Passport'];
    $fathersfirstname = $row['F_Fname'];
    $fatherslastname = $row['F_Lname'];
    $fathers_stateoforigin = $row['F_SOO'];
    $fathers_contact = $row['F_Contact'];
    $fathersemail = $row['F_Email'];
    $mothersfirstname = $row['M_Fname'];
    $motherslastname = $row['M_Lname'];
    $mothers_stateoforigin = $row['M_SOO'];
    $mothers_contact = $row['M_Contact'];
    $mothersemail = $row['M_Email'];
    $parents_address = $row['Parent_Address'];
    $username = $row['Username'];
    $student_pass = $row['Password'];








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
      
      if (empty($passport)) {
        $passport = $student_passport;
      }else{
        $passport = $_FILES["passport"]["name"];
      }

      $password = $_POST['password'];


      $query = "UPDATE `students` SET
       `Fname` = '".mysqli_real_escape_string($link, $first_name)."',   
      `Mname` = '".mysqli_real_escape_string($link, $middle_name)."', 
      `Lname` = '".mysqli_real_escape_string($link, $last_name)."', 
      `Class` = '".mysqli_real_escape_string($link, $class)."', 
      `Class_Teacher` = '".mysqli_real_escape_string($link, $class_teacher)."',   
      `Department` = '".mysqli_real_escape_string($link, $department)."', 
      `Gender` = '".mysqli_real_escape_string($link, $gender)."', 
      `DOB` = '".mysqli_real_escape_string($link, $dob)."', 
      `SOO` = '".mysqli_real_escape_string($link, $soo)."', 
      `LGA` = '".mysqli_real_escape_string($link, $lga)."', 
      `Religion` = '".mysqli_real_escape_string($link, $religion)."',   
      `Address` = '".mysqli_real_escape_string($link, $address)."', 
      `Contact` = '".mysqli_real_escape_string($link, $contact)."', 
      `Email` = '".mysqli_real_escape_string($link, $email)."', 
      `Passport` = '".mysqli_real_escape_string($link, $passport)."',  
      `F_Fname` = '".mysqli_real_escape_string($link, $fathers_first_name)."', 
      `F_Lname` = '".mysqli_real_escape_string($link, $fathers_last_name)."', 
      `F_SOO` = '".mysqli_real_escape_string($link, $fathers_soo)."', 
      `F_Contact` = '".mysqli_real_escape_string($link, $fathers_contact)."',  
      `F_Email` = '".mysqli_real_escape_string($link, $fathers_email)."', 
      `M_Fname` = '".mysqli_real_escape_string($link, $mothers_first_name)."', 
      `M_Lname` = '".mysqli_real_escape_string($link, $mothers_last_name)."',
      `M_SOO` = '".mysqli_real_escape_string($link, $mothers_soo)."', 
      `M_Contact` = '".mysqli_real_escape_string($link, $mothers_contact)."',  
      `M_Email` = '".mysqli_real_escape_string($link, $mothers_email)."', 
      `Parent_Address` = '".mysqli_real_escape_string($link, $parents_address)."',  
      `Username` = '".mysqli_real_escape_string($link, $username)."' 
      WHERE `id` = '$student_id'";
                    if (mysqli_query($link, $query)) {
                      $success .= "<center><div class='alert alert-success' role='alert'>You Just Updated <strong>$last_name $first_name</strong> Data</div></center>";
                              
                              $tardir = "./Files/Students_Passport/";
                              $tarfile = $tardir . basename($passport);
                              $type = pathinfo($tarfile,PATHINFO_EXTENSION);
                              move_uploaded_file($_FILES["passport"]["tmp_name"], $tarfile);
                              
                                if (!empty($password)) {
                                  $query = "UPDATE `students` SET `Password` = '".md5(md5($student_id).$password)."' WHERE id = '$student_id' LIMIT 1";
                                  mysqli_query($link, $query);
                                }
                             
                    }
                    

    }


}else{
    header("Location: index.php");
}
?>
<?php include "header.php"; include "admin-nav.php"; ?>
<div class="det">
    
<h1 class="text-center">Edit Data</h1>

<div class="edit-form">
<form method="POST" enctype="multipart/form-data">
<div class="form-bar"><h3>Personal Information</h3></div>
<br>
<?php  echo $success; ?>
<?php  echo $error; ?>
<br>
  <div class="form-group">
    <label for="exampleInputEmail1">First Name</label>
    <input required type="text" value="<?php echo $student_firstname; ?>" name="first-name" class="form-control" id="exampleInputEmail1" placeholder="First Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Middle Name</label>
    <input required type="text" value="<?php echo $student_middlename; ?>" name="middle-name" class="form-control" id="exampleInputEmail1" placeholder="Middle Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Last Name</label>
    <input required type="text" value="<?php echo $student_lastname; ?>"  name="last-name" class="form-control" id="exampleInputEmail1" placeholder="Last Name">
  </div>
  <div class="form-group">
  <label for="example-date-input" class="col-2 col-form-label">Date Of Birth</label>
  <div class="col-10">
    <input required class="form-control" name="dob" type="date"  value="<?php echo $dob ?>" id="example-date-input">
  </div>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">State Of Origin</label>
    <input required type="text" value="<?php echo $soo ?>" name="state-of-origin" class="form-control" id="exampleInputEmail1" placeholder="State Of Origin">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">LGA</label>
    <input required type="text" value="<?php echo $lga ?>" name="lga" class="form-control" id="exampleInputEmail1" placeholder="LGA">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Religion</label>
    <input required type="text" value="<?php echo $religion; ?>" name="religion" class="form-control" id="exampleInputEmail1" placeholder="Religion">
  </div>
  <div class="form-group">
    <label for="exampleSelect1">Gender</label>
    <select required name="gender"  class="form-control" id="exampleSelect1">
      <option value="<?php echo $gender ?>"><?php echo $gender ?></option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
  </div>
<div class="form-group">
    <label for="exampleInputEmail1">Residential Adress</label>
    <textarea required name="address" class="form-control" placeholder="Residential Adress" id=""  rows="3"><?php echo $address ?></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Contact Number</label>
    <input name="contact-number" value="<?php echo $contact ?>" type="text" class="form-control" id="">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" value="<?php echo $email ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Passport Photograph</label>
    <input name="passport" type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
    <small id="fileHelp" class="form-text text-muted">Upload Students Passport <strong>(Size-Max: 64kb)</strong></small>
  </div>
  <div class="form-group">
    <label for="exampleSelect1">Select Class</label>
    <select required name="class"  class="form-control" id="exampleSelect1">
      <option value="<?php echo $class ?>"><?php echo $class ?></option>
      <option value="JSS 1">JSS 1</option>
      <option value="JSS 2">JSS 2</option>
      <option value="JSS 3">JSS 3</option>
      <option value="SSS 1">SSS 1</option>
      <option value="SSS 2">SSS 2</option>
      <option value="SSS 3">SSS 3</option>
    </select>
    <label for="exampleSelect2">Select Department</label>
        <select required name="department"  placeholder="Select Class" class="form-control" id="exampleSelect2">
        <option value="<?php echo $department; ?>"><?php echo $department; ?></option>
        <option value="None">None</option>
      <option value="Science">Science</option>
      <option value="Art">Art</option>
      <option value="Commercial">Commercial</option>
        </select><br>

        <label for="exampleSelect2">Class Teacher</label>
        <select required name="class-teacher"  placeholder="Class Teacher" class="form-control" id="exampleSelect2">
            <option value="<?php echo $classteacher ?>"><?php echo $classteacher ?></option>
        <?php
            $query = "SELECT * FROM `teachers` ORDER BY Fname";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
              $title = $row['Title'];
              $fname = $row['Fname'];
              $lname = $row['Lname'];
              $input = "$title $lname $fname";
        ?>
        <option><?php echo $input ?></option>
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
    <input required type="text" value="<?php echo $fathersfirstname ?>" name="fathers-first-name" class="form-control" id="exampleInputEmail1" placeholder="Fathers First Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Fathers Last Name</label>
    <input required type="text" value="<?php echo $fatherslastname ?>" name="fathers-last-name" class="form-control" id="exampleInputEmail1" placeholder="Fathers Last Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">State Of Origin</label>
    <input required type="text" value="<?php echo $fathers_stateoforigin ?>" name="fathers-state-of-origin" class="form-control" id="exampleInputEmail1" placeholder="State Of Origin">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Fathers Contact Number</label>
    <input required type="text" value="<?php echo $fathers_contact ?>" name="fathers-contact-number" class="form-control" id="exampleInputEmail1" placeholder="Fathers Contact Number">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"> Fathers Email address</label>
    <input type="email" name="fathers-email" value="<?php echo $fathersemail ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Fathers Email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <br>

  <strong><h5 style="text-decoration: underline;">Mothers Info</h5></strong> 
    <br>
<div class="form-group">
    <label for="exampleInputEmail1">Mothers First Name</label>
    <input required type="text" value="<?php echo $mothersfirstname ?>" name="mothers-first-name" class="form-control" id="exampleInputEmail1" placeholder="Mothers First Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Mothers Last Name</label>
    <input required type="text" value="<?php echo $motherslastname ?>" name="mothers-last-name" class="form-control" id="exampleInputEmail1" placeholder="Mothers Last Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">State Of Origin</label>
    <input required type="text" value="<?php echo $mothers_stateoforigin; ?>" name="mothers-state-of-origin" class="form-control" id="exampleInputEmail1" placeholder="State Of Origin">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Mothers Contact Number</label>
    <input required type="text" value="<?php echo $mothers_contact ?>" name="mothers-contact-number" class="form-control" id="exampleInputEmail1" placeholder="Mothers Contact Number">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"> Mothers Email address</label>
    <input type="email" value="<?php echo $mothersemail ?>" name="mothers-email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Mothers Email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <br>
  <div class="form-group">
    <label for="exampleInputEmail1">Parent/Guardian Residential Adress</label>
    <input required type="text" value="<?php echo $parents_address ?>" name="parents-address" class="form-control" id="exampleInputEmail1" placeholder="Parent/Guardian Residential Adress">
  </div>
  <br><hr><br>




  <div class="form-bar"><h3>Login Details</h3></div>
  <br>
  <div class="alert alert-warning" role="alert">
  <strong>Note</strong> The following details that will be entered below will be used by students to <strong>login</strong> to their portal. 
</div>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input required type="text" value="<?php echo $username ?>" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input  type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Passsword">
  </div>
  <button type="submit" name="register-student" class="btn btn-primary">Register</button>
</form>
   </div>
       
</div>