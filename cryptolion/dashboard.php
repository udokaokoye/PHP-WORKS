<?php
session_start();
$URLROOT = "http://localhost/cyptolion";
if (array_key_exists("user_id", $_SESSION)) {
    if (!isset($_SESSION['ref'])) {
        $refreshAfter = 0;
        header('Refresh: ' . $refreshAfter);
        $_SESSION['ref'] = true;
    }
    
    ?>
    
    <?php include "./pages/dashboard_page.php"; ?>
<?php
}else{
    header("Location: " . $URLROOT);
}
?>