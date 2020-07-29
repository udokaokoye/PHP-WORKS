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
        $query = "SELECT * FROM `teachers` WHERE id = $id";
                $result = mysqli_query($link, $query);
                $row = mysqli_fetch_array($result);
                $title = $row['Title'];
                $fname = $row['Fname'];
                $lname = $row['Lname'];
                $input = "$title $lname $fname";

                if (array_key_exists('submit', $_POST)) {
                    $text = $_POST['textarea'];
                    $subject = $_POST['subject'];
                    $to = $_POST['to'];
                    $note = $_FILES["note-file"]["name"];
                
                    $query = "INSERT INTO  `note` (`Teacher`, `Subject`, `Reciever`, `Note_Text`, `Note_file`) VALUES (
                        '".mysqli_real_escape_string($link, $input)."', 
                       '".mysqli_real_escape_string($link, $subject)."',  
                       '".mysqli_real_escape_string($link, $to)."',    
                       '".mysqli_real_escape_string($link, $text)."',  
                       '".mysqli_real_escape_string($link, $note)."'
                    )";
                    if (mysqli_query($link, $query)) {
                        $tardir = "./Files/Attached_Note_Files/";
                        $tarfile = $tardir . basename($note);
                        $type = pathinfo($tarfile,PATHINFO_EXTENSION);
                        move_uploaded_file($_FILES["note-file"]["tmp_name"], $tarfile);
                $success .= "<center><div class='alert alert-success' role='alert'>Your Note Has Been Sent To <strong>$to</strong> </div></center>";
                } else{
                $error .= "<center><div class='alert alert-danger' role='alert'>Unable To Complete Your Request, Try Again Later. </div></center>";
                }
                }

    }else{
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}
?>
<?php include "header.php"; include "teacher-nav.php"; ?>

<span id="filter"></span>
<span id="filter-btn"></span>
<div class="det">
    <br>
    <div class="student-nav">
<h6 class="student-nav-active" id="reg-btn">Your Messages </h6><h6> | </h6><h6 id="view-btn">Sent</h6>
</div>
<div id="register"></div>
    <div class="msg-form">
        <h4 class="text-center">Send Notes To Students</h4><br>
        <?php echo $success; echo $error; ?><br>
        <form method="post" enctype="multipart/form-data">
        
        
        <div class="form-group">
    <label for="exampleSelect1">Send To</label>
    <select required width="500px" name="to" class="form-control" id="exampleSelect1">
        <option value="Students">Students (All)</option>
        <option value="JSS 1">JSS 1</option>
        <option value="JSS 2">JSS 2</option>
        <option value="JSS 3">JSS 3</option>
        <option value="SSS 1-All">SSS 1 (All)</option>
        <option value="SSS 1-Science">SSS 1 (Science)</option>
        <option value="SSS 1-Art">SSS 1 (Art)</option>
        <option value="SSS 1-Commercial">SSS 1 (Commercial)</option>
        <option value="SSS 2-All">SSS 2 (All)</option>
        <option value="SSS 2-Science">SSS 2 (Science)</option>
        <option value="SSS 2-Art">SSS 2 (Art)</option>
        <option value="SSS 2-Commercial">SSS 2 (Commercial)</option>
        <option value="SSS 3-All">SSS 3 (All)</option>
        <option value="SSS 3-Science">SSS 3 (Science)</option>
        <option value="SSS 3-Art">SSS 3 (Art)</option>
        <option value="SSS 3-Commercial">SSS 3 (Commercial)</option>
    </select>
  </div> <br>

  <div class="form-group">
    <label for="exampleSelect1">Subject</label>
    <select required width="500px" name="subject" class="form-control" id="exampleSelect1">
    <?php
      include "connection.php";
      $query = "SELECT * FROM `subjects` WHERE Teacher = '$input'";
      $result = mysqli_query($link, $query);
      while ($row = mysqli_fetch_array($result)) {
        
        ?>
        <option value="<?php echo $row['Subject']  ?>"><?php echo $row['Subject']  ?></option>
      <?php } ?>
    </select>
  </div>


  <div class="form-group">
            <label for="exampleTextarea">Text</label>
            <textarea class="form-control" name="textarea" id="exampleTextarea" rows="2"></textarea>
        </div><br>
    
    <div class="form-group">
            <label for="exampleInputFile">Note File</label>
            <input name="note-file" type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Upload Note File To Students <strong>(any format).</strong></small>
  </div><br>
  <button type="submit" class="btn btn-success" name="submit">Submit</button>
        </form>
    </div>
</div>

<?php


?>