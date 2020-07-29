<?php
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/footer.php';

?>
<div class="row">
    <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
    <h2>Create An Account</h2>
    <p>Please fill out this form to register with us</p>
    <form action="<?php  echo URLROOT; ?>/users/register" method="post">
        <div class="form-group">
        <label for="name">Name<sup>*</sup></label>
            <input type="text" name="name" placeholder="Enter Name" id="" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err'] ?></span>
        </div>
        <div class="form-group">
        <label for="email">Email<sup>*</sup></label>
            <input type="email" name="email" placeholder="Enter email" id="" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err'] ?></span>
        </div>
        <div class="form-group">
        <label for="password">Password<sup>*</sup></label>
            <input type="password" name="password" placeholder="Enter Password" id="" value="<?php echo $data['password'] ?>" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err'] ?></span>
        </div>
        <div class="form-group">
        <label for="confirm_password">Confirm Pasword<sup>*</sup></label>
            <input type="password" name="confirm_password" placeholder="Confirm Password" value="<?php echo $data['confirm_password'] ?>" id="" class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>">
            <span class="invalid-feedback"><?php echo $data['confirm_password_err'] ?></span>
        </div>
        <div class="row">
        <div class="col"><button type="submit" class="btn btn-success btn-block">Register</button></div>
        <div class="col"><a class="btn btn-light btn-block" href="<?php echo URLROOT ?>/users/login">Have an account? Login</a></div>
        </div>
    </form>
    </div>
    </div>
</div>
