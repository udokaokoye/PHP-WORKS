<?php
include 'connection.php';
$URLROOT = "http://localhost/cyptolion";
if (isset($_COOKIE['admin'])) {

}else{
    header('Location: ' . $URLROOT);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Total Registerd Users</title>
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
    <h2>Total Registerd Users</h2>
    <table class="table table-striped" id="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">User ID</th>
      <th scope="col">Wallet Address</th>
      <th scope="col">Wallet Name</th>
      <th scope="col">Date Registered</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $num =0;
$query = "SELECT * FROM `users`";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_array($result)) {
    $num ++;
    ?>
    <tr>
      <th scope="row"><?php echo $num ?></th>
      <td><?php echo $row['user_id'] ?></td>
      <td><?php echo $row['wallet_id'] ?></td>
      <td><?php echo $row['wallet_name'] ?></td>
      <td><?php echo $row['created_at'] ?></td>
    </tr>
      <?php
}

  ?>
  </tbody>
 
</table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
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