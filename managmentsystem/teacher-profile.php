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


    }else{
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}

?>

<?php 

$query = "SELECT * FROM `teachers` WHERE `id` = '$id'";
          $result = mysqli_query($link, $query);
          $row = mysqli_fetch_array($result);
          
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" href="./fontawesome-free-5.12.1-web/css/all.css">
    <link rel="stylesheet" href="profile.css">
    <title>Profile Card</title>
</head>
<body>
    
    <div class="modal">
        <img src="./images/new.JPG" alt="hhhhh">
        <div class="close"></div>
    </div>
    
    <div class="container">
        <div class="card">
            <div class="header">
                <a href="index.php"><div class="hamburger-menu">
                    <i style="color: white" class="fas fa-arrow-left"></i>
                </div></a>
                <div class="main">
                    <div class="image">
                        <img src="./images/new.JPG" width="200px" alt="">
                        <div class="hover">
                            <i class="fas fa-camera fa-2x"></i>
                        </div>
                    </div>
                    <h3 class="name"><?php echo $row['Fname']; echo " "; echo $row['Lname']; ?></h3>
                    <h3 class="sub-name">Teacher</h3>
                </div>
            </div>

            <div class="content">
                <div class="left">
                    <div class="about-container">
                        <h3 class="title">Information</h3>
                        <p class="text">Username: <?php echo $row['Username'] ?></p><br>
                        <p class="text">Class: <?php echo $row['Class']; ?></p><br>
                        <p class="text">Contact Mail: <?php echo $row['Email']; ?></p><br>
                        <p class="text">Contact No: <?php echo $row['Contact'] ?></p><br>
                    </div>
                    <div class="buttons-wrap">
                        <div class="follow-wrap">
                            <a href="index.php" class="follow">Back</a>
                        </div>
                        <div class="share-wrap">
                            <a style="opacity: 0" href="#" class="share">Share</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="profile.js"></script>
</body>
</html>