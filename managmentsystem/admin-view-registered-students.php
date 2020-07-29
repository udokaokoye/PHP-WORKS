<?php 
if (array_key_exists("pass", $_GET)) {
    include "connection.php";
    $query = "SELECT `id` FROM `admin` WHERE `password` = '".mysqli_real_escape_string($link, $_GET['pass'])."'";
        $result = mysqli_query($link, $query);
        if (!mysqli_num_rows($result)) {
            header("Location: index.php");
        }else{
           view();
        }
}else{
    header("Location: index.php");
}

function view(){
    include "connection.php";
    $query = "SELECT * FROM `students`";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);

    echo "<a target='_blank' href='./Book1_files/sheet001.html'><button>View Doc</button></a>";
}
?>