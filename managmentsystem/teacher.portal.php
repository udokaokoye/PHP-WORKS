<?php
    session_start();
    if (isset($_SESSION['id'])) {
        include "connection.php";
        $id = $_SESSION['id'];
        $query = "SELECT * FROM `teachers` WHERE `id` = '$id'";
        $result = mysqli_query($link, $query);
        if (!mysqli_num_rows($result)) {
          header("Location: index.php");
      }
        $error = "";
        $id = $_SESSION['id'];
        include "connection.php";
        $query = "SELECT * FROM `teachers` WHERE id = $id";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        $_SESSION['id'] = $row['id'];
}else{
      header("Location: index.php");
        }
?>
<?php include "header.php"; include "teacher-nav.php"; ?>



<div class="det"><br>
<div class="profile-nav">
    <h3>Academic Session (2019-2020)</h3>
    
    <ul>
       <div>
        <li><img style="width: 30px; height: 30px; border-radius: 50%;" src="./images/download.jpeg" alt=""></li>
       <li class="drop"><span><?php echo $display; ?> <i class="fas fa-chevron-down"></i></span>
        <ul class="drop-show">
            <a style="text-decoration: none; color: inherit" href="<?php echo "teacher-profile.php?pass=$secretpass" ?>"><li>Profile</li></a>
            <li><form action="logout.php" method="post">
<button name="logout-btn" type="submit">Logout</button>
</form></li>
        </ul>
    </li> 
       </div>
    </ul>
</div><br>
<hr>
<h3 class="text-center">Welcome, <a style="text-decoration: none;" href="<?php echo "teacher-profile.php?pass=$secretpass" ?>"><span class="user-name"><?php echo $display ?></span></a></h3>
<hr>
<br>
</div>


<?php include "footer.php" ?>





