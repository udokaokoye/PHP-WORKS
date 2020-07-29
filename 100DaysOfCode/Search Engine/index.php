<?php
if (array_key_exists("search", $_POST)) {
    $search = $_POST['search_input'];
    header("Location: https://www.google.com/search?q=$search");
}
?>