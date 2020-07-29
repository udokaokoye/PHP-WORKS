<?php
include "connection.php";
session_start();
if (isset($_COOKIE['user_id'])) {
   header("Location: dashboard.php");
}
?>


<?php  include "./incs/header.php"; ?>

<?php  include "./incs/navbar.php"; ?>

<?php include "./pages/main-page.php" ?>
<?php include "./incs/footer_page.php" ?>
<?php include "./incs/footer.php"; ?>
