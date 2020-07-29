<?php
include 'connection.php';
$id = $_SESSION['user_id'];
$query = "SELECT * FROM `users` WHERE `id` = '$id'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
$wallet_name = $row['wallet_name'];
$wallet_id = $row['wallet_id'];
$deposits = $row['deposits'];
$payouts = $row['payouts'];
$total_payouts = $row['total_payouts'];
$image_url = '';
$border_color = '';
if ($wallet_name == 'BTC') {
    $image_url = $URLROOT . '/assets/images/btc_svg.svg';
    $border_color = '#F89B2B';
}elseif ($wallet_name == 'LTH') {
    $image_url = $URLROOT . '/assets/images/ltc_svg.svg';
    $border_color ='#345D9D';
}elseif ($wallet_name == 'ETH') {
    $image_url = $URLROOT . '/assets/images/eth_svg.svg';
    $border_color = '#8A92B2';
}elseif ($wallet_name == 'DODGE') {
    $image_url = $URLROOT . '/assets/images/dodge_svg.svg';
    $border_color = '#c2a633';
}
$query = "SELECT SUM(`amount`) AS total FROM `deposits` WHERE `wallet_address` = '$wallet_id'";
$sum = mysqli_query($link, $query);
$s = mysqli_fetch_array($sum);
$total_deposits = $s['total'];

if (empty($total_deposits)) {
  $total_deposits ='0.00';
}

$query = "SELECT SUM(`amount`) AS total_payouts FROM `payouts` WHERE `wallet_address` = '$wallet_id'";
$sum = mysqli_query($link, $query);
$s = mysqli_fetch_array($sum);
$total_payouts = $s['total_payouts'];

if (empty($total_deposits)) {
  $total_payouts ='0.00';
}

$query = "SELECT * FROM `referral` WHERE `wallet_address` = '$wallet_id'";
$result = mysqli_query($link, $query);
$referal = mysqli_num_rows($result);
?>

<?php  include "./incs/header.php"; ?>

<?php  include "./incs/navbar.php"; ?>

<?php setcookie("user_id", $_SESSION['user_id'], time() + (24*60*60*365)); ?>
<div class="gen-site">
<div class="dashboard">
    <br>
    
    <?php echo $_SESSION['user_id']; ?>
    <?php echo $row['wallet_name'] ?>
<div class="descp">
        <h1>CRYPTO-LION</h1>
        <h5>CRYPTO-LION - Double your money in just 24 hours, guaranteed and reliable
</h5>

    </div>
<div class="main">
    <div class="form rounded">
        <br>
        <h3 style="font-weight: 800; color: #494949;" class="text-center">YOUR <img width="25px" src="<?php echo $image_url; ?>" alt="<?php echo $row['wallet_name']; ?> Coin" title="<?php echo $wallet_name ?>"> ADDRESS</h3>
            <div style="border-left-color: <?php echo $border_color; ?>; " class="wallet-id">
            <img src="<?php echo $image_url; ?>" alt="<?php echo $row['wallet_name']; ?> Coin" title="<?php echo $wallet_name ?>">
                <h5><?php echo $wallet_id; ?></h5>
            </div>
            <br><br>
            
            <div class="butts">
            <form action="<?php echo $URLROOT ?>/logout.php" method="post">
            <a href="#account" class="btn" style="background-color: <?php echo $border_color ?>; color: white;"> <i class="far fa-user-circle mr-1"></i> My Account</a>
            <button type="submit" class="btn btn-info"><i class="fas fa-sign-out-alt mr-1"></i> Logout</button>
            </form>
            </div>
    </div>
    <div class="inform">
        <div style="background-color: #009EFB;" class="information-div rounded">
            <div class="content">
                <h5>+100%</h5>
                <h6>Automatic Payment after 24 Hours</h6>
                <span class="text-white-50">Min Deposit: 1 USD</span>
            </div>
            <i class="fab fa-bitcoin icn"></i>
        </div>
        <div style="background-color: #FFBC34;" class="information-div rounded">
            <div class="content">
                <h5>420,570</h5>
                <span>Total Investors</span>
            </div>
            <i class="fas fa-user-check icn"></i>
        </div>
        <div style="background-color: #55CE63;" class="information-div rounded">
            <div class="content">
                <h5>172.97414816</h5>
                <span class="text-white-50">Total Deposited BTC</span>
            </div>
            <i class="fas fa-download icn"></i>
        </div>
        <div style="background-color: #7460EE;" class="information-div rounded">
            <div class="content">
                <h5>107.81964482</h5>
    <div id="affilate"></div>
                <span class="text-white-50">Total Paid BTC</span>
            </div>
            <i class="fas fa-upload icn"></i>
        </div>
    </div>
</div>
</div>
<div>
</div>
<div id="account" class="account">

<hr>
<div class="account-inner">
    <div class="account-nav">
        <div class="inner-acc-nav">
        <a href='#account' class="active-nav"><li id="acc_btn" class="active-nav"> <i class="far fa-user-circle icn-nav"></i> ACCOUNT</li></a>
        <a href="<?php echo $URLROOT ?>/deposit.php"><li> <i class="fas fa-money-check-alt icn-nav"></i> MAKE A DEPOSIT</li></a>
        <a href='#account'><li id="depo_btn"> <i class="fas fa-wallet icn-nav"></i> MY DEPOSITS</li></a>
        <a href='#account'><li id="payout_btn"> <i class="far fa-money-bill-alt icn-nav"></i> MY PAYOUTS</li></a>
        <a href='#account'><li id="ref_btn"> <i class="fas fa-user-friends icn-nav"></i>  MY REFERRALS </li></a>
        </div>
    </div>
    <div style="transition: all 0.4s ease-in-out;" class="acc-content">
        <!-- !ACCOUNT TO TOGGLE -->
        <div id="acc-det">
            <!-- !ACCOUNT TO TOGGLE -->
    <h2 class="p-2">Account</h2>
    <div class="col-auto">
        <h5>Your Wallet Address <hr></h5>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><img width="20px" src="<?php echo $image_url; ?>" alt="<?php echo $row['wallet_name']; ?> Coin" title="<?php echo $wallet_name ?>"></div>
        </div>
        <input readonly type="text" class="form-control" value="<?php echo $wallet_id ?>" id="inlineFormInputGroup" placeholder="Wallet Name">
      </div>
    </div>
<br>
    <div class="col-auto">
        <h5>Your Total Deposits <hr></h5>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-arrow-alt-circle-down"></i></div>
        </div>
        <input readonly type="text" class="form-control" value="<?php echo $total_deposits ?>" id="inlineFormInputGroup" placeholder="Wallet Name">
      </div>
    </div>

<br>

    <div class="col-auto">
        <h5>Your Total Payouts <hr></h5>
      <label class="sr-only" for="inlineFormInputGroup">Username</label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="far fa-credit-card"></i></div>
        </div>
        <input readonly type="text" class="form-control" value="<?php echo $total_payouts ?>" id="inlineFormInputGroup" placeholder="Wallet Name">
      </div>
    </div>

    <br>

    <div class="col-auto">
        <h5>Your Referral Link <hr></h5>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-link"></i></div>
        </div>
        <input readonly type="text" class="form-control" value="<?php echo $URLROOT ?>/?ref=<?php echo $wallet_id ?>" id="inlineFormInputGroup" placeholder="Wallet Name">
      </div>
    </div>
<!-- !ACCOUNT TO TOGGLE -->
        </div>
<!-- !ACCOUNT TO TOGGLE -->

<div style="transition: all 0.4s ease-in-out;" id="my-deposits" class="none">
<h3>Deposits</h3>
<div class="in" style="width: 100%; overflow-x: scroll; ">
<table class="table" style="width: max-content">
  <thead>
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Wallet Adress</th>
      <th scope="col">Amount</th>
      <th scope="col">Wallet Name</th>
      <th scope="col">Date Of Payment</th>
      <th scope="col">Date Of Activation</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <!-- PHP CODE HERE -->
    <?php
      $query = "SELECT * FROM `deposits` WHERE `wallet_address` = '$wallet_id'";
      $result = mysqli_query($link, $query);
      $num = 0;
      while ($row = $result->fetch_assoc()) {
       $num ++;
     ?>
      <tr>
      <th scope="row"><?php echo $num ?></th>
      <td><?php echo $row['wallet_address'] ?></td>
      <td><?php echo $row['amount'] ?></td>
      <td><?php echo $row['wallet_name'] ?></td>
      <td><?php echo $row['date'] ?></td>
      <td><?php if ($row['status'] === 'Pending') {
        echo "--__--";
      }else{
        echo $row['date_activated'];
      } ?>
      </td>
      <td>
        <?php
            if ($row['status'] === 'Active') {
              echo '<h5><span class="badge badge-success">Active</span></h5>';
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
                $(this).html("You Are Now Ready To Get <strong>Double Your Money!!!</strong>. Please Execise Patience While The Team Reviews The Payment. This Might Take 20-30mins. Thanks");
                }
                });
                }
                countdownfunc()
                </script>
              <?php
            }else{
              echo "<h4><span class='badge badge-danger'>Pending</span></h4>";
            }
        ?>
      </td>
      </tr>
      <?php
          }
      ?>
  </tbody>
</table>
</div>
</div>

<div style="transition: all 0.4s ease-in-out;" id="my-payouts" class="none">
<h3>Payouts</h3>
<div class="in" style="width: 100%; overflow-x: scroll; ">
<table class="table">
  <thead>
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Wallet Adress</th>
      <th scope="col">Amount</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <!-- PHP CODE HERE -->
    <?php
      $query = "SELECT * FROM `payouts` WHERE `wallet_address` = '$wallet_id'";
      $result = mysqli_query($link, $query);
      $num = 0;
      while ($row = $result->fetch_assoc()) {
          $num ++; ?>
          <tr>
      <td><?php echo $num ?></td>
      <td><?php echo $row['wallet_address'] ?></td>
      <td><?php echo $row['amount'] ?></td>
      <td><?php echo $row['date'] ?></td>
      <td><span class="badge badge-success">Paid!</span></td>
      </tr>
<?php
      }
?>
  </tbody>
</table>
</div>
</div>

<div style="transition: all 0.4s ease-in-out;" id="ref-div" class="none">
<div class="col-auto">
        <h5>Your Total referrals <hr></h5>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-user"></i></div>
        </div>
        <input readonly type="text" class="form-control" value="<?php echo $referal ?>" id="inlineFormInputGroup" placeholder="Wallet Name">
      </div>
    </div>
</div>

</div>
</div>
</div>

<?php include "./incs/footer_page.php" ?>
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


<script>
    var accountBtn = document.getElementById('acc_btn');
    var depositBtn = document.getElementById('depo_btn');
    var payoutBtn = document.getElementById('payout_btn');
    var refBtn = document.getElementById('ref_btn');
    var mainDiv = document.getElementById('acc-det');
    var depositDiv = document.getElementById('my-deposits');
    var payoutDiv = document.getElementById('my-payouts');
    var refDiv = document.getElementById('ref-div');

    accountBtn.addEventListener('click', function () {
        accountBtn.classList.add('active-nav');
        depositBtn.classList.remove('active-nav');
        payoutBtn.classList.remove('active-nav');
        refBtn.classList.remove('active-nav');
        mainDiv.classList.remove('none');
        depositDiv.classList.add('none');
        payoutDiv.classList.add('none');
        refDiv.classList.add('none');
    });

    depositBtn.addEventListener('click', function () {
        accountBtn.classList.remove('active-nav');
        depositBtn.classList.add('active-nav');
        payoutBtn.classList.remove('active-nav');
        refBtn.classList.remove('active-nav');
        mainDiv.classList.add('none');
        depositDiv.classList.remove('none');
        payoutDiv.classList.add('none');
        refDiv.classList.add('none');
    });

    payoutBtn.addEventListener('click', function () {
        accountBtn.classList.remove('active-nav');
        depositBtn.classList.remove('active-nav');
        payoutBtn.classList.add('active-nav');
        refBtn.classList.remove('active-nav');
        mainDiv.classList.add('none');
        depositDiv.classList.add('none');
        payoutDiv.classList.remove('none');
        refDiv.classList.add('none');
    });

    refBtn.addEventListener('click', function () {
        accountBtn.classList.remove('active-nav');
        depositBtn.classList.remove('active-nav');
        payoutBtn.classList.remove('active-nav');
        refBtn.classList.add('active-nav');
        mainDiv.classList.add('none');
        depositDiv.classList.add('none');
        payoutDiv.classList.add('none');
        refDiv.classList.remove('none');
    });
    </script>
<?php include "./incs/footer.php"; ?>