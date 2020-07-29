<script>
function time() {
    return new Date().getTime();
}
</script>
<?php
include "../connection.php";
if (array_key_exists('pay', $_POST)) {
    $wallet_address = $_POST['wallet_address'];
    $wallet_name = $_POST['wallet_name'];
    $amount = $_POST['amount'];
    $time = date('Format String');

    $query = "INSERT INTO `deposits` (`wallet_address`, `wallet_name`, `amount`, `status`) VALUES (
        '".mysqli_real_escape_string($link, $wallet_address)."', 
        '".mysqli_real_escape_string($link, $wallet_name)."', 
        '".mysqli_real_escape_string($link, $amount)."', 
        '".mysqli_real_escape_string($link, 'Pending')."'
    )";

if (mysqli_query($link, $query)) {
    header("Location: ../deposit.php?success=1");
}else{
    echo "wrong";
}
}else{
    echo "noooooooooooooooooooooooooo";
}
?>