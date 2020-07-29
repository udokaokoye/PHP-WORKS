<?php
$URLROOT = "http://localhost/cyptolion";
if (array_key_exists('logout', $_POST)) {
setcookie('admin', "", time() - 60*60);
$_COOKIE['admin'] = "";
header("Location: ". $URLROOT);
}

?>