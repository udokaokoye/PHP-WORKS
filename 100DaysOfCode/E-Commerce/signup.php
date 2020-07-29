<?php

?>
<?php include "./header.php"; ?>


<div class="container mb-5 mt-5">
    <form method="POST" action="register_products.php">
        <h3>Register As A Seller</h3><hr>
        <div class="form-group">
          <label for="exampleInputEmail1">Full Name<sup>*</sup></label>
          <input required type="text" name="full_name" placeholder="Enter Full Name" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Phone Number<sup>*</sup></label>
          <input required type="text" class="form-control" placeholder="Enter Phone Number" name="phone_number">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Display Name / Shop Name<sup>*</sup></label>
          <input required type="text" class="form-control" placeholder="Display Name / Shop Name" name="display_name">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Date of Birth<sup>*</sup></label>
          <input required type="text" class="form-control" placeholder="Enter Date of Birth" name="dob">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Gender<sup>*</sup></label>
          <select required type="text" class="form-control" placeholder="Enter Date of Birth" name="dob">
            <option value="">-Select Option-</option>
            <option value="">Male</option>
            <option value="">Femlae</option>
          </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email Address<sup>*</sup></label>
            <input required type="email" name="email" placeholder="Enter Email Address" class="form-control">
          </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Password<sup>*</sup></label>
            <input required type="password" name="password" placeholder="Enter Password" class="form-control">
          </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Confirm Password<sup>*</sup></label>
            <input required type="password" name="confirm_password" placeholder="Confirm Password" class="form-control">
          </div>


<hr><h1>Bussiness Information</h1><hr>


        <div class="form-group">
            <label for="exampleInputEmail1">Adress <sup>*</sup></label>
            <input required type="text" name="product_price" class="form-control">
          </div>
        <div class="form-group">
            <label for="exampleInputEmail1">City / Town <sup>*</sup></label>
            <input required type="text" name="delivery_date" class="form-control">
          </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Country<sup>*</sup></label>
            <input required type="text" name="delivery_date" class="form-control">
          </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Person In Charge<sup>*</sup></label>
            <input type="text" name="delivery_date" class="form-control">
          </div>
        <button type="submit" name="add_product" class="btn btn-primary">Submit</button>
      </form>
    </div>

<?php include "./footer.php"; ?>