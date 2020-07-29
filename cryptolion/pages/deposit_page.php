<?php
$URLROOT = "http://localhost/cyptolion";
include 'connection.php';
$id = $_SESSION['user_id'];
$query = "SELECT * FROM `users` WHERE `id` = '$id'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
$wallet_name = $row['wallet_name'];
$wallet_id = $row['wallet_id'];
$deposits = $row['deposits'];
$total_deposits = $row['total_deposits'];
$payouts = $row['payouts'];
$total_payouts = $row['total_payouts'];
$image_url = '';
$border_color = '';
$payment_addres = '';
$qrcode_image = "";
if ($wallet_name == 'BTC') {
    $image_url = $URLROOT . '/assets/images/btc_svg.svg';
    $payment_addres = 'bc1q04zwyc6q89q67hkzxezmc634t36hn8ns9jl7t4';
    $qrcode_image = $URLROOT . '/assets/images/QR/BTC_qr.jpeg';
    $border_color = '#F89B2B';
}elseif ($wallet_name == 'LTH') {
    $image_url = $URLROOT . '/assets/images/ltc_svg.svg';
    $payment_addres = 'ltc1qx2762206tn2y6egcv2p8e6lf939zqje45qgx0y';
    $qrcode_image = $URLROOT . '/assets/images/QR/LTC_qr.jpeg';
    $border_color ='#345D9D';
}elseif ($wallet_name == 'ETH') {
    $image_url = $URLROOT . '/assets/images/eth_svg.svg';
    $payment_addres = '0x90B5756e213a0Cd4786D25822C3A158Ee9f681f6';
    $qrcode_image = $URLROOT . '/assets/images/QR/ETH_qr.jpeg';
    $border_color = '#8A92B2';
}elseif ($wallet_name == 'DODGE') {
    $image_url = $URLROOT . '/assets/images/dodge_svg.svg';
    $payment_addres = 'DC6Z8vNWFX8hJqYaS4BUEYieoUv2sjKSLF';
    $qrcode_image = $URLROOT . '/assets/images/QR/DODGE_qr.jpeg';
    $border_color = '#c2a633';
}

$success ='';
$loader = 'Please hold on while we generate your deposit wallet address';
if (isset($_GET['success'])) {
    echo "redirect()";
    $success = "<div class='alert alert-success text-center' role='alert'>
    Your Payment Was Successful! Please Return To Your Dashboard.<br>
    <strong>You'll be automatically redirected in <span id='count'>10</span> seconds...</strong>
  </div><br>";
?>
<script>

function redirect() {
    var counter = 10;
setInterval(function() {
  counter--;
  if (counter >= 0) {
    span = document.getElementById("count");
    span.innerHTML = counter;
  }
  // Display 'counter' wherever you want to display it.
  if (counter === 0) {
    window.location.replace("<?php echo $URLROOT ?>");
      clearInterval(counter);
  }

}, 1000);
}
setTimeout(redirect, 8500);
</script>
<?php
  $loader = 'Please hold on while your payment is been processed...';
 }
?>

<?php include  "./incs/navbar.php" ?>


<div class="gen-site">
    <div id="init-hide" class="deposit-page">
    <br>
    <?php echo $success; ?>
    <div class="qr">
        <center><img width="200px" src="<?php echo $qrcode_image; ?>" alt="<?php echo $wallet_name; ?>-QR"></center>
        <div class="col-auto">
        <h5 class="text-center">Your Payment Address<hr></h5>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><img width="20px" src="<?php echo $image_url; ?>" alt="<?php echo $row['wallet_name']; ?> Coin" title="<?php echo $wallet_name; ?>"></div>
        </div>
        <input style="font-size: 13px;" readonly type="text" class="form-control" value="<?php echo $payment_addres ?>" id="inlineFormInputGroup" placeholder="Wallet Name">
      </div>
    </div>
    </div>
    <br>
    <form method="POST" action="<?php echo $URLROOT ?>/registeration/deposit.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Your unique payment address</label>
    <input type="text" class="form-control" id="foo" value="<?php echo $payment_addres; ?>" readonly placeholder="Enter email">
    <span class="btn btn-primary mt-1 mb-1" data-clipboard-target="#foo" id="btn"><i class="far fa-copy"></i></span>
    <div class="alert alert-warning" role="alert">
            Payments Should be Made to The Above Wallet Address
    </div>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Amount</label>
    <input type="hidden" name="wallet_name" value="<?php echo $wallet_name ?>" >
    <input type="hidden" name="wallet_address" value="<?php echo $wallet_id ?>" >
    <input required type="text" class="form-control" id="" name="amount" placeholder="Enter Amount">
  </div>
  <button type="submit" name="pay" class="btn btn-primary"><i class="fas fa-dollar-sign mr-1"></i> Pay</button>
</form>
    </div>
    <br><br><br>
</div>
<?php include "./incs/footer_page.php"; ?>



<script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.6/dist/clipboard.min.js"></script>

<script>

    
var btn = document.getElementById('btn');
    var clipboard = new ClipboardJS(btn);
</script>
<div id="load" class="loader-p">
    <h4 style="text-align:center"><?php echo $loader ?></h4>
    <div style="margin: 0 auto;">
        <center>
<div style="width: 5rem; height: 5rem" class="spinner-grow text-muted"></div>
<div style="width: 5rem; height: 5rem" class="spinner-grow text-primary"></div>
<div style="width: 5rem; height: 5rem" class="spinner-grow text-success"></div>
<div style="width: 5rem; height: 5rem" class="spinner-grow text-info"></div>
<div style="width: 5rem; height: 5rem" class="spinner-grow text-warning"></div>
<div style="width: 5rem; height: 5rem" class="spinner-grow text-danger"></div>
<div style="width: 5rem; height: 5rem" class="spinner-grow text-secondary"></div>
<div style="width: 5rem; height: 5rem" class="spinner-grow text-dark"></div>
<div style="width: 5rem; height: 5rem" class="spinner-grow text-primary"></div>
</center>
    </div>

</div>

<script>
  // hoides the overflow
  function hideof() {
    document.getElementById("init-hide").style.display = "none";
  }
  hideof();
    function load() {
        $('#load').fadeOut()
        document.getElementById("init-hide").style.display = "block";
    }
    setTimeout(load, 8000);
</script>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div style="
    background:  #283c86;
    color: white;" class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Rules</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span style="color: white;" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <h6>Please read the following rules carefully before registration:</h6>
            <h6>General provisions:</h6>
            <p>
            1.1.1 Commission project withdrawal is 0% of output by the user amount. <br><br>

            1.2 by Registering with us You agree to these rules in full. <br><br>

            1.3 the Administration is not responsible for any damages suffered by You as a result of using this System. <br><br>

            1.4 At the time of registration, the user must be at least 18 years of age on the day of its birth. <br><br>
            </p>
            <h3>The user has the right:</h3>
            <p>
            2.1 cash deposits on its balance sheet. <br><br>

            2.2 Produce information and attract new members in various advertising methods sites, threads on forums, social networks, etc. <br><br>

            2.3 to Send in your suggestions and comments to improve the service System. <br><br>
            </p>

            <h3>The user agrees to:</h3>
            <p>
            2.4 to Comply with these rules in full. <br><br>

            2.5 Carefully read the terms of enrollment and payments. <br><br>

            2.6 does Not enter the System Administration misled by inaccurate information. <br><br>

            2.7 at least once per month to once again meet with these rules. <br><br>

            2.8 Upon detection of faults or some errors in the script site to report to support. <br><br>

            2.9 Not to conduct the attempts of breaking of site and not utillize possible errors in the scripts. <br><br>
            </p>

            <h3>When you try to break, the administration has the full right to remove, block or fine a user.</h3>
            <p>
            2.10 Not to publish offensive messages, defamation and other types of messages spoiling the reputation of the System or its users. <br><br>

            2.11 Not to register more than one account. Each participant has the right to have only one account. In case of detection of multi-accounts, administration has full right to remove, block or fine a user. <br><br>
            </p>
            <h3>Rights and responsibilities of the administration:</h3>
            <p>
            3.1 In the case of ignoring the users of these rules, the administration reserves the right to remove, block or fine an account user without warning and without explanation. <br><br>

            3.2 the Administration may amend these rules change without warning the user. <br><br>

            3.3 Letter sent by the administration with obscene content, carrying offensive or threats - will be ignored, and users are removed. <br><br>

            3.4 When you try to enter the administration misled cheating, measures will be taken to remove, block or fine an account. <br><br>

            3.5 the company agrees to maintain the confidentiality of the information of the authorized user, got from him during registration. <br><br>

            3.6 In the event of refusal to accept the new rules, the administration reserves the right to refuse to further participation in our service. <br><br>
            </p>
            <h3>Payments</h3>
            <p>
       3.7 the List of the payment systems by which you can make the Deposit and withdrawal of funds may be corrected by the administration. <br><br>

        3.8 Removal takes place automatically. If the client provides inaccurate, incomplete data on the withdrawal of the system, the withdrawal of funds does not occur, and the withdrawal request is rejected to correct or clarify all inaccuracies in the data <br><br>

        3.9 Requests for withdrawal are accepted around the clock. <br><br>
            </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
