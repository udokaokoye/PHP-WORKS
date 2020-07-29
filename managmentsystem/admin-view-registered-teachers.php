<?php
include 'connection.php';
$query = 'SELECT * FROM `students`';
$result = mysqli_query( $link, $query );
while ( $row = mysqli_fetch_array( $result ) ) {

}
if ( array_key_exists( 'sub', $_POST ) ) {
    echo $_POST['this-is'];
}
include 'header.php';
?>

<form method = 'post'>
<input name = 'this-is' type = 'text'>
<input name = 'sub' type = 'submit' value = 'sub'>
</form>

<?php include 'footer.php';
?>