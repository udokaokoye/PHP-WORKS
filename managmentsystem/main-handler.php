<?php
if (array_key_exists('submit', $_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];
     if ($error != "") {
        $error = "<p>There were error(s) in your form:</p><br><br>".$error;
    }else {
       $query = "SELECT * FROM `students` WHERE Username = '".mysqli_real_escape_string($link, $username)."'";
       $result = mysqli_query($link, $query);
       $row = mysqli_fetch_array($result);
       if (isset($row)) {
           $hp = md5(md5($row['id']).$password);

           if ($hp == $row['Password']) {
             $_SESSION['id'] = $row['id'];
             header("Location: student.portal.php");
           }
           else{
            $error .= "E-mail and Password Combination Mismatch.";
        }
       }else{
           
        $query = "SELECT * FROM `teachers` WHERE Username = '".mysqli_real_escape_string($link, $username)."'";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        if (isset($row)) {
            $hp = md5(md5($row['id']).$password);
 
            if ($hp == $row['Password']) {
              $_SESSION['id'] = $row['id'];
              header("Location: teacher.portal.php");
            }
            else{
                $error .= "E-mail and Password Combination Mismatch.";
            }
    }else{
        $query = "SELECT * FROM `admin` WHERE Username = '".mysqli_real_escape_string($link, $username)."'";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        if (isset($row)) {
            $hp = md5(md5($row['id']).$password);
 
            if ($hp == $row['Password']) {
              $_SESSION['id'] = $row['id'];
              $_SESSION['email'] = $row['email'];
              header("Location: logged.php");
            }else{
                $error .= "E-mail and Password <br> Combination Mismatch.";
            }
    }else{
        $error .= "E-mail and Password <br> Combination Mismatch.";
    }
}
}
    }

    }

?>
<!DOCTYPE html>
<html>
<head>
<title>Elimshire College</title>
<link href="form.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>
</head>
<body>
    <center>
<div class="dav">
<img width="80px" height="60px" src="./images/logo.png" alt=""><h1>Elimshire College</h1>
</div>
</center>
		<div class="login">	
			<div class="ribbon-wrapper h2 ribbon-red">
				<div class="ribbon-front">
					<h2>User Login</h2>
				</div>
				<div class="ribbon-edge-topleft2"></div>
				<div class="ribbon-edge-bottomleft"></div>
            </div>
            <?php echo $error; ?>
			<form method="POST">
				<ul>
					<li>
						<form method="post">
						<input type="text" class="text" placeholder="Enter Username" name="username" ><i class="fas fa-user"></i>
					</li>
					 <li>
						<input type="password" placeholder="Enter Password" name="password"><i class="fas fa-lock"></i>
					</li>
				</ul>

			<div class="submit">
				<input type="submit" name="submit" value="Log in" >
			</form>
			</div>
		</div>

</body>
</html>

<?php include "footer.php"; ?>