<script>
var n = localStorage.getItem('wallet'); 
</script>
<?php
$URLROOT = "http://localhost/cyptolion";
include "../connection.php";
session_start();

if (array_key_exists("submit", $_POST)) {
    $walletid = $_POST['wallet_id'];
    $wallet_address = $_COOKIE['walletname'];
    if (isset($_COOKIE['referral'])) {
        if ($_COOKIE['referral'] != '') {
            $referral = $_COOKIE['referral'];
        }
    }
    $uni_id = uniqid();
    if ($wallet_address === "NONE") {
        header("Location: ../index.php?error=invalidwalletaddress&&address=" . $walletid);
    }
    else{
        $query = "SELECT * FROM `users` WHERE `wallet_id` = '".mysqli_real_escape_string($link, $walletid)."'";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $_SESSION['user_id'] = $row['id'];
            header("Location: ../dashboard.php");
        } else {
            if ($_COOKIE['referral'] != '') {
                $query = "INSERT INTO `referral` (`wallet_address`, `referred`) VALUES ('".mysqli_real_escape_string($link, $referral)."', '".mysqli_real_escape_string($link, $walletid)."')";
            mysqli_query($link, $query);
            }
            $query = "INSERT INTO `users` (`user_id`, `wallet_id`, `wallet_name`, `deposits`, `total_deposits`, payouts, `total_payouts`) VALUES (
        '".mysqli_real_escape_string($link, $uni_id)."', 
        '".mysqli_real_escape_string($link, $walletid)."', 
        '".mysqli_real_escape_string($link, $wallet_address)."', 
        '".mysqli_real_escape_string($link, '0.00')."', 
        '".mysqli_real_escape_string($link, '0.00')."', 
        '".mysqli_real_escape_string($link, '0.00')."', 
        '".mysqli_real_escape_string($link, '0.00')."'
    )";
            if (mysqli_query($link, $query)) {
                $_SESSION['user_id'] = mysqli_insert_id($link);
                header("Location: ../dashboard.php");
            } else {
                echo "failed";
            }
        }
    }
}
?>

<script>
    function setcok() {
        var d = new Date();
                d.setTime(d.getTime() + (30 * 1000));
                var expires = "expires="+ d.toUTCString();
                document.cookie = "asa=" + 'res' + ";" + expires + ";path=/";
    }
    
</script>









