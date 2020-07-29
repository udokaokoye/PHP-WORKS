<?php
    session_start();
    if (isset($_SESSION['id'])) {
        include "connection.php";
        $id = $_SESSION['id'];
        $query = "SELECT * FROM `students` WHERE `id` = '$id'";
        $result = mysqli_query($link, $query);
        if (!mysqli_num_rows($result)) {
          header("Location: index.php");
      }
        $error = "";
        $id = $_SESSION['id'];
        include "connection.php";
        $query = "SELECT * FROM `students` WHERE id = $id";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = "";
        $firstname = $row['Fname'];
        $middlename = $row['Mname'];
        $lastname = $row['Lname'];
        $_SESSION['name'] .= "<strong>$firstname $middlename $lastname</strong>";
        $_SESSION['class'] = $row['Class'];
        $display = $_SESSION['name'];
        $messagepass = md5(md5("student")); 
        $image = $row['Passport'];
}else{
      header("Location: index.php");
        }
?>
    <?php include "header.php"; include "student-nav.php"; ?>
    
        
        <div class="det">
        
        <br>
        <div class="profile-nav">
            <h3>Academic Session (2019-2020)</h3>
            
            <ul>
               <div>
                <li><img style="width: 30px; height: 30px; border-radius: 50%;" src="./Files/Students_Passport/<?php echo $row['Passport']; ?>" alt="Image"></li>
               <li class="drop"><span><?php echo $_SESSION['name']; ?> <i class="fas fa-chevron-down"></i></span>
                <ul class="drop-show">
                <a style="text-decoration: none; color: black;" href="<?php echo "student-profile.php?pass=$secretpass"; ?>"><li>Profile</li></a>
                    <li><form action="logout.php" method="post">
    <button name="logout-btn" type="submit">Logout</button>
</form></li>
                </ul>
            </li> 
               </div>
            </ul>
        </div><br><br>
        <div class="welcome-nav">
        <h1><i class="fas fa-graduation-cap"></i> Welcome, <span class="user-name"><?php echo $display; ?></span></h1>
        <div>
                <ul>
                    <a href="<?php echo "student-assignment.php?pass=$secretpass"?>"><li><i class="fas fa-bars"></i>Assigments</li></a>
                    <a href=""><li><i class="fas fa-book"></i>Notes</li></a> 
                    <a href=""><li><i class="fas fa-calendar"></i>Circular</li></a>
                    <a href=""><li><i class="fas fa-pen"></i>Exam</li></a> 
                </ul>
        </div>
        </div>
        <h4 class="stuclass" style="text-align: left; margin-left: 150px; color: rgb(83, 83, 83);"><?php echo $_SESSION['class']; ?></h4>
       <hr> <div class="display-main">
            <div class="students-det">
                
            <img src="./images/capture.png" width="100%" height="100%" alt="">
            </div>
            <div class="others">

            </div>
        </div>
        </div>
        
        </div>


<?php include "footer.php" ?>





