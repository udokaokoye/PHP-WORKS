<?php
$URLROOT = "http://localhost/cyptolion";
session_start();
session_unset();
session_destroy();
setcookie('user_id', "", time() - 60*60);
$_COOKIE['user_id'] = "";
header("Location: ". $URLROOT);
?>