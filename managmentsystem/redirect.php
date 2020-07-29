<?php
session_start();
if (array_key_exists("uni_messageid", $_GET)) {
  $message_pass = $_GET['messagepass'];
  $uni_identity = $_GET['uni_messageid'];
  header("Location: admin-messages.php?messagepass=$message_pass&&con=true&&uni_id=$uni_identity");
}
?>