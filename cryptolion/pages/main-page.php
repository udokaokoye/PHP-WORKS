<?php
$error = '';
$error_wallet_address = '';
            if (isset($_GET['error'])) {
               $error = "<span class='text-danger'>Incorrect Wallet Adress</span><br><span class='text-info'>please click <a href='#accepted-payments'>here</a> to view supported wallets</span><br>";
               $error_wallet_address = $_GET['address'];
            }
            $refer = '';
            if (isset($_GET['ref'])) {
              $refer = $_GET['ref'];
            }
        ?>
<div class="gen-site">
<div class="main-page">
    <br>
    <div class="descp">
        <h1>CRYPTO-LION</h1>
        <h5>CRYPTO-LION - Double your money in just 24 hours, guaranteed and reliable
</h5>
    </div>
<div class="main">
    <div class="form rounded">
        <h3 style="font-weight: 200" class="text-center"><strong>Double</strong> Your Deposit In 24hrs!!!</h3>
<form action="<?php echo $URLROOT; ?>/registeration/register.php" method="post">
    <br><br>
    <center>
    <div style="margin:0 auto;" class="form-group ">
        <center><input required value="<?php echo $error_wallet_address; ?>" placeholder="Enter BTC/LTC/ETH/DODGE Address" type="text"" name="wallet_id" class="form-control" id="walletid"></center>
        <input type="hidden" id="wallet_name" name="wallet_name">
        <?php echo $error; ?>
        <br>
        <center><button onclick="validateWalletId()" type="submit" name="submit" class="btn text-white"><i class="fas fa-sign-in-alt"></i> Get Started</button></center>
    </div>
    </center>
</form>
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
                <h5>420570</h5>
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
<hr>

<div class="affilate" id="d">
    <div class="aff-inner">
    <i class="fas fa-bolt aff-icn"></i>
    <p>All payouts are automated. We use fast and fault-tolerant server solutions. There are no delays in our system.</p>
    </div>
    <div class="aff-inner">
    <i class="fas fa-users aff-icn"></i>
    <p>Earn high 25% commission instantly paid to your wallet from every referral"s deposit.</p>
    </div>
    <div class="aff-inner">
    <i class="fas fa-shield-alt aff-icn"></i>
    <p>We use serious DDoS protection and high performance server to provide a high availability service.</p>
    </div>
    <div id="accepted-payments"></div>
    <div class="aff-inner">
    <i class="fas fa-registered aff-icn"></i>
    <p>The official registered company in the UK. CRYPTO-LION LIMTED, Company Number: <strong>#12698701</strong></p>
    </div>
</div>

<div class="accepted-payments rounded" id="">
    <h3>Accepted Payemnts</h3>
    <div class="accepted-payments-img">
      <center>
        <img src="<?php echo $URLROOT ?>/assets/images/btc.png" alt="">
        <img src="<?php echo $URLROOT ?>/assets/images/eth.png" alt="">
        <img src="<?php echo $URLROOT ?>/assets/images/ltc.png" alt="">
        </center>
        <div style="display: flex; justify-content: center">
        <img style="width: 40px" src="<?php echo $URLROOT ?>/assets/images/dodge_png.png" alt=""><span class="odd-one mt-10">Dodge Coin</span>
        </div>
    </div>
</div>
<br>

<div class="faqs" id="faqs">
<h3>FAQs?</h3>
<div id="accordion">
<div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn collapsed" data-toggle="collapse" data-target="#av" aria-expanded="false" aria-controls="av">
        Q1. I want to Start, how to do?
        </button>
      </h5>
    </div>
    <div id="av" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
      For example, you make a deposit of <strong>0.00001 BTC.</strong>, and after 24 hours you receive <strong>0.00002 BTC.</strong>
      </div>
    </div>
  </div>
</div>
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Q2. What makes CRYPTO-LION unique?
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      We place a very high value on transparency. At CRYPTO-EMIRATE you can monitor and follow all deposits and payouts of any user in real-time at any time.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="2">
      <h5 class="mb-0">
        <button class="btn" data-toggle="collapse" data-target="#as" aria-expanded="true" aria-controls="as">
        Q3. What payment systems do you accept?
        </button>
      </h5>
    </div>

    <div id="as" class="collapse" aria-labelledby="2" data-parent="#accordion">
      <div class="card-body">
      We accept: BTC, LTC, ETH, BNB
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Q4. Can I make more than one deposit?
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
      Yes, there are no limitations. You can make as many deposits as you wish, all you deposits are been monitored from our secure server.
      </div>
    </div>
  </div>
  
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Q5. When will my deposit show up on my Dashboard?
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        Your deposit will show on your dashboard after 10mins of deposit. NOTE: <strong>Deposit only shows when our server confirms the deposit.</strong> 
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn collapsed" data-toggle="collapse" data-target="#ac" aria-expanded="false" aria-controls="ac">
        Q6. Is CRYPTO-LION protected against hacker attacks & what about the security?
        </button>
      </h5>
    </div>
    <div id="ac" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
      Yes, we are using a strong 400 Gbps DDoS Protection with 99.9999% up-time guarantee. Complex Layer 7 Protection. Global CDN Acceleration. Global Protected DNS. Web Application Firewall 
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn collapsed" data-toggle="collapse" data-target="#aq" aria-expanded="false" aria-controls="aq">
        Q7. Do you charge any fees for your services?
        </button>
      </h5>
    </div>
    <div id="aq" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
      No, we do no charge any fee for our services or use of CRYPTO-LION website.
      </div>
    </div>
  </div>
</div><br>
<div class="contact" id="contact">
    <h3>Contact Us</h3>
    <div class="mail-add">
        <center><i class="fas fa-envelope"></i></center>
        <div class="txt-mail">
            <h5><a href="">support-cryptolion@gmail.com</a></h5>
            <span>24hrs Response Time</span>
        </div>
    </div>
</div>



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
  </div>
</div>
<script src="<?php echo $URLROOT ?>/assets/js/wallet-address-validator.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous"></script>

<script>
            function validateWalletId() {
                var wallet_address = document.getElementById('walletid').value;
                var wallet_name = document.getElementById('wallet_name').value;
                var str = document.getElementById('walletid').value;
                var strFirstThree = str.substring(0,3);
               var valid = WAValidator.validate(wallet_address, 'BTC');
                if(valid){
                    localStorage.setItem("wallet", "BTC");
                }
                else if(valid = WAValidator.validate(wallet_address, 'ETH')){
                    localStorage.setItem("wallet", "ETH");
                }else if(valid = WAValidator.validate(wallet_address, 'litecoin')){
                    localStorage.setItem("wallet", "LTH");
                }
                else if(valid = WAValidator.validate(wallet_address, 'DOGE')){
                    localStorage.setItem("wallet", "DODGE");
                }
                else if(strFirstThree === 'ltc' || strFirstThree === 'LTC'){
                    localStorage.setItem("wallet", "LTH");
                }
                else {
                    localStorage.setItem("wallet", "NONE");
                }

                var res = localStorage.getItem("wallet");
                
                var d = new Date();
                d.setTime(d.getTime() + (30 * 1000));
                var expires = "expires="+ d.toUTCString();
                document.cookie = "walletname=" + res + ";" + expires + ";path=/";
                }
                var ref = '<?php echo $refer ?>';
                var d = new Date();
                d.setTime(d.getTime() + (30 * 1000));
                var expires = "expires="+ d.toUTCString();
                document.cookie = "referral=" + ref + ";" + expires + ";path=/";
            
</script>



