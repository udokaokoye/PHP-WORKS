<?php
session_start();
if (array_key_exists("user_id", $_SESSION)) {
    include "./incs/header.php";
    include "./pages/deposit_page.php";
    include "./incs/footer.php";
}else{
    echo "<h1>Unauthorized Access</h1>";
}
?>
