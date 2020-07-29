<?php
$URLROOT = "http://localhost/cyptolion";
if (isset($_COOKIE['admin'])) {
    include 'main.php';
}else{
    header('Location: ' . $URLROOT);
}
?>