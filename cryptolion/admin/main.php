<?php
include "connection.php";
$query = "SELECT * FROM `users`";
$result = mysqli_query($link, $query);
$total_users = mysqli_num_rows($result);

$query = "SELECT * FROM `deposits`";
$result = mysqli_query($link, $query);
$total_deposits = mysqli_num_rows($result);

$query = "SELECT * FROM `payouts`";
$result = mysqli_query($link, $query);
$total_payouts = mysqli_num_rows($result);

$query = "SELECT * FROM `referral`";
$result = mysqli_query($link, $query);
$total_referral = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <div class="nav">
    <h1>CRYPTO LION</h1>
    </div>
    <ul>
    <a href="<?php echo $URLROOT ?>/admin/home.php"><li>Dashboard</li></a>
    <a href="total_registerd.php"><li>View Total Registerd Users</li></a>
    <a href="view_deposits.php"><li>View All Deposits</li></a>
    <a href="view_payouts.php"><li>View All Payouts</li></a>
    <a href="update_payout.php"><li>Update Payout Records</li></a>
    </ul>
    <form action="logout.php" method="POST">
        <button class="btn btn-danger" name="logout" type="submit">Logout</button>
    </form>

    <div class="bd">
    <div class="bg-primary text-white">
    <i class="fas fa-users ic"></i>
    <h6>Total Registered Users</h6>
    <h6><?php echo $total_users ?></h6>
    </div>


    <div class="bg-warning text-white">
    <i class="fas fa-users ic"></i>
    <h6>Total Number Of Deposits</h6>
    <h6><?php echo $total_deposits ?></h6>
    </div>

    <div class="bg-danger text-white">
    <i class="fas fa-users ic"></i>
    <h6>Total Number Of Payouts</h6>
    <h6><?php echo $total_payouts ?></h6>
    </div>


    <div class="bg-info text-white">
    <i class="fas fa-users ic"></i>
    <h6>Total Number Of referrals</h6>
    <h6><?php echo $total_referral ?></h6>
    </div>

    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js" integrity="sha256-+Q/z/qVOexByW1Wpv81lTLvntnZQVYppIL1lBdhtIq0=" crossorigin="anonymous"></script>

</body>
</html>