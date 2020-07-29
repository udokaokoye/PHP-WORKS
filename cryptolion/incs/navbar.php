<nav>
    <div class="nav">

        <div class="logo">
        <a href="">
            <img class="logo-img" src="<?php echo $URLROOT ?>/assets/images/lion.svg" alt="">
            <h1>Crypto-Lion</h1>
        </a>
        </div>
        <div class="links">
            <ul>
                <a href="<?php echo $URLROOT ?>"><li><i class="fas fa-home"></i> Home</li></a>
                <a href="#affilate"><li><i class="fas fa-dollar-sign"></i> Affilate Program</li></a>
                <!--! Button trigger rules modal -->   <a href="" data-toggle="modal" data-target="#exampleModalLong"><li><i class="fas fa-book-open"></i> Rules</li></a>
                <a href="#faqs"><li><i class="far fa-question-circle"></i> FAQs</li></a>
                <a href="#contact"><li><i class="fas fa-id-card"></i> Contact Us</li></a>
            </ul>
        </div>
        
        <span id='bar'><i class="fas fa-bars bar"></i></span>
    </div>
    <input type="hidden" name="wallet_name">
    <span id="top"></span>
</nav>

<div id='mobile-nav' class="mobile-nav">
    <span class="mt-3" id="close" style="text-align: right; margin-right: 45px;"><i style="font-size: 25px; cursor: pointer; " class="fas fa-times"></i></span>
            <ul>
                <a onClick="closeSideBar()" href="<?php echo $URLROOT ?>"><li><i class="fas fa-home"></i> Home</li></a>
                <a onClick="closeSideBar()" href="#affilate"><li><i class="fas fa-dollar-sign"></i> Affilate Program</li></a>
             <!--! Button trigger rules modal -->   <a onClick="closeSideBar()" href="" data-toggle="modal" data-target="#exampleModalLong"><li><i class="fas fa-book-open"></i> Rules</li></a>
                <a onClick="closeSideBar()" href="#faqs"><li><i class="far fa-question-circle"></i> FAQs</li></a>
                <a onClick="closeSideBar()" href="#contact"><li><i class="fas fa-id-card"></i> Contact Us</li></a>
            </ul>
</div>


<a href="#top"><span class="back-top"><i class="tp fas fa-angle-double-up"></i></span></a>