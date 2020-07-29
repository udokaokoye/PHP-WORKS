<?php
include 'connection.php';
$URLROOT = "http://localhost/cyptolion";
if (isset($_COOKIE['admin'])) {
$success = '';
if (isset($_GET['success'])) {
  $success = '<div class="alert alert-success" role="alert">
  Deposit Has Been Activated!!!
</div>';
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
    <h2>Total Deposits</h2>
    <?php echo $success; ?>
    <table class="table table-striped" id="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Wallet Address</th>
      <th scope="col">Amount</th>
      <th scope="col">Wallet Name</th>
      <th scope="col">Status</th>
      <th scope="col">Time Remaining</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $num =0;
$query = "SELECT * FROM `deposits`";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_array($result)) {
    $num ++;
    ?>
    <tr>
      <th scope="row"><?php echo $num ?></th>
      <td><?php echo $row['wallet_address'] ?></td>
      <td><?php echo $row['amount'] ?></td>
      <td><?php echo $row['wallet_name'] ?></td>
      <td><?php if ($row['status'] === 'Pending') {
?>
 <span class="badge badge-danger">Pending</span>
 <a href="activate.php?row_id=<?php echo $row['id']; ?>"><h5 style="cursor: pointer;"><span class="badge badge-success">Activate!</span></h5></a>
       
<?php
      }
      else{
        echo '<span class="badge badge-success">Active</span>';
      } ?></td>
      <td>
      <?php
            if ($row['status'] === 'Active') {
              ?>
                <span class="<?php echo $row['id'] ?>"></span>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js" integrity="sha512-rmZcZsyhe0/MAjquhTgiUcb4d9knaFc7b5xAfju483gbEXTkeJRUMIPk6s3ySZMYUHEcjKbjLjyddGWMrNEvZg==" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
                <script src="<?php echo $URLROOT ?>/assets/js/jquery.countdown.min.js"></script>
                <script>
                var tomorrow = moment('<?php echo $row['date'] ?>',).add(1,'days').format('YYYY-MM-DD HH:mm:ss');
                function countdownfunc() {
                $('.<?php echo $row['id'] ?>').countdown(tomorrow, function(event) {
                var totalHours = event.offset.totalDays * 24 + event.offset.hours;
                $(this).html(event.strftime(totalHours + ' hr %M min %S sec'));
                if (event.elapsed) {
                $(this).html("<h4><span class='badge badge-danger'>Payment Is Due!!!</span></h4>");
                }
                });
                }
                countdownfunc()
                </script>
              <?php
            }else{
              echo "<h4><span class='badge badge-danger'>------</span></h4>";
            }
        ?>
      </td>
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