<?php
include "connection.php";
$error ='';
if (isset($_GET['error'])) {
  $error ='<div class="alert alert-danger" role="alert">
  incorrect username/password.
</div>';
}
if (array_key_exists('login', $_POST)) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $query = "SELECT * FROM `admin` WHERE `username` = '".mysqli_real_escape_string($link, $username)."'";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_array($result);
  if (isset($row)) {
    $hp = md5(md5($password));

    if ($hp == $row['password']) {
      $_SESSION['admin'] = $row['id'];
      setcookie("admin", $row['id'], time() + 60*60*24*365);
      header("Location: home.php");
    }else{
        header("Location: index.php?error=passwordmismatch");
    }
}else{
header("Location: index.php?error=passwordmismatch");
}

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h2 class="text-center">ADMIN</h2>
    <h3>Login</h3>
    <?php echo $error ?>
    <form method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input required type="text" class="form-control" name="username" id="" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input required type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" name="login" class="btn btn-primary">Submit</button>
</form>
    </div>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js" integrity="sha256-+Q/z/qVOexByW1Wpv81lTLvntnZQVYppIL1lBdhtIq0=" crossorigin="anonymous"></script>

</body>
</html>