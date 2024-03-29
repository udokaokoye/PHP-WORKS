<?php
require APPROOT . '/views/inc/header.php';
?>


<div class="row">
    <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
    <?php flash('register_success') ?>
    <h2>Login</h2>
    <p>Please fill out this form to login</p>
    <form action="<?php  echo URLROOT; ?>/users/login" method="post">
        <div class="form-group">
        <label for="email">Email<sup>*</sup></label>
            <input type="email" name="email" placeholder="Enter email" id="" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err'] ?></span>
        </div>
        <div class="form-group">
        <label for="password">Password<sup>*</sup></label>
            <input type="password" name="password" placeholder="Enter Password" value="<?php echo $data['password']; ?>" id="" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err'] ?></span>
        </div>
        <div class="row">
        <div class="col"><button type="submit" class="btn btn-success btn-block">Login</button></div>
        <div class="col"><a class="btn btn-light btn-block" href="<?php echo URLROOT ?>/users/register">No account? Signup</a></div>
        </div>
    </form>
    </div>
    </div>
</div>

<?php
require APPROOT . '/views/inc/footer.php';
?>