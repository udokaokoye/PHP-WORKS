<?php
include 'connection.php';
$URLROOT = "http://localhost/cyptolion";
if (isset($_COOKIE['admin'])) {
  $success = '';
  if (array_key_exists('payout', $_POST)) {
    $wallet_address = $_POST['wallet_address'];
    $wallet_name = $_POST['wallet_name'];
    $amount = $_POST['amount'];
    $query = "INSERT INTO `payouts` (`wallet_address`, `wallet_name`, `amount`) VALUES (
    '".mysqli_real_escape_string($link, $wallet_address)."', 
    '".mysqli_real_escape_string($link, $wallet_name)."', 
    '".mysqli_real_escape_string($link, $amount)."'
    )";
    if (mysqli_query($link, $query)) {
      $success ='<div class="alert alert-success" role="alert">
      Payout Was Succesfull!!!
    </div>';
    }else{
      $success = '<div class="alert alert-danger" role="alert">
      Error while Processing Payment, Try again later
    </div>';
    }
  }
}else{
    header('Location: ' . $URLROOT);
}
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
</head>
<body>
<div class="nav">
    <h1>CRYPTO LION</h1>
    </div>
    <ul>
    <a href=""><li>Dashboard</li></a>
    <a href="total_registerd.php"><li>View Total Registerd Users</li></a>
    <a href="view_deposits.php"><li>View All Deposits</li></a>
    <a href="view_payouts.php"><li>View All Payouts</li></a>
    <a href="update_payout.php"><li>Update Payout Records</li></a>
    
    </ul>
    <form action="logout.php" method="POST">
        <button class="btn btn-danger" name="logout" type="submit">Logout</button>
    </form>

    <div class="container">
    <form method='POST'>
    
  <h3>Add Payout</h3>
  <?php echo $success; ?>
  <div class="form-group">
    <label for="exampleInputEmail1">Wallet address</label>
    <input name="wallet_address" type="text" class="form-control" placeholder="Enter Wallet Address">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Wallet Name</label>
    <select name="wallet_name" class="form-control" id="exampleFormControlSelect1">
      <option value="BTC">BTC</option>
      <option value="ETH">ETH</option>
      <option value="LTC">LTC</option>
      <option value="DODGE">DODGE</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Amount</label>
    <input name="amount" type="text" class="form-control" id="" placeholder="Enter Amount">
  </div>
  
  <button name='payout' type="submit" class="btn btn-primary">Payout</button>
</form>
<br>
    <h2>Total Payouts</h2>
    <table class="table table-striped" id="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Wallet Address</th>
      <th scope="col">Amount</th>
      <th scope="col">Wallet Name</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $num =0;
$query = "SELECT * FROM `payouts`";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_array($result)) {
    $num ++;
    ?>
    <tr>
      <th scope="row"><?php echo $num ?></th>
      <td><?php echo $row['wallet_address'] ?></td>
      <td><?php echo $row['amount'] ?></td>
      <td><?php echo $row['wallet_name'] ?></td>
      <td><?php echo $row['date'] ?></td>
    </tr>
      <?php
}

  ?>
 
 </tbody>
</table>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js" integrity="sha256-+Q/z/qVOexByW1Wpv81lTLvntnZQVYppIL1lBdhtIq0=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(
        function(){
             $('#table').DataTable(); 
            });
            $(document).ready(
        function(){
             $('.table').DataTable(); 
            });
</script>
</body>
</html>