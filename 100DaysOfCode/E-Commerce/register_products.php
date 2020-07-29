<?php
include "connection.php";
if (array_key_exists("add_product", $_POST)) {
    $seller_name = $_POST['seller_name'];
    $seller_id = $_POST['seller_id'];
    $category = $_POST['category'];
    $product_brand = $_POST['product_brand'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $delivery_date = $_POST['delivery_date'];
    $product_description = $_POST['product_description'];
    if (isset($_POST['return_policy_input'])) {
        $return_policy = $_POST['return_policy_input'];
    }else{
        $return_policy = "None";
    }
    $delivery = $_POST['delivery'];
    if (isset($_POST['warranty_input'])) {
        $warranty = $_POST['warranty_input'];
    }else{
        $warranty = "None";
    }
    $product_image_1_move = $_FILES["product_image_1"]["name"];
    $product_image_2_move = $_FILES["product_image_2"]["name"];
    $product_image_3_move = $_FILES["product_image_3"]["name"];


   $query = "INSERT INTO `product` ( `Product_Id`, `Item_Brand`, `Item_Name`, `Item_Price`, `Item_Description`, `Item_Category`, `Item_Image_1`, `Item_Image_2`, `Item_Image_3`, `Return_Policy`, `Delivery`, `Warranty`) VALUES (
    '".mysqli_real_escape_string($link, $seller_id)."', 
    '".mysqli_real_escape_string($link, $product_brand)."', 
    '".mysqli_real_escape_string($link, $product_name)."', 
    '".mysqli_real_escape_string($link, $product_price)."', 
    '".mysqli_real_escape_string($link, $product_description)."', 
    '".mysqli_real_escape_string($link, $category)."', 
    '".mysqli_real_escape_string($link, $product_image_1_move)."', 
    '".mysqli_real_escape_string($link, $product_image_2_move)."', 
    '".mysqli_real_escape_string($link, $product_image_3_move)."', 
    '".mysqli_real_escape_string($link, $return_policy)."', 
    '".mysqli_real_escape_string($link, $delivery)."', 
    '".mysqli_real_escape_string($link, $warranty)."')";
    if (mysqli_query($link, $query)) {
      $tardir = "./assets/Product_Image/";
      $tarfile = $tardir . basename($product_image_1_move);
      $type = pathinfo($tarfile,PATHINFO_EXTENSION);
      move_uploaded_file($_FILES["product_image_1"]["tmp_name"], $tarfile);
      
      if (isset($_FILES["product_image_2"]["name"])) {
          $tardir = "./assets/Product_Image/";
          $tarfile = $tardir . basename($product_image_2_move);
          $type = pathinfo($tarfile, PATHINFO_EXTENSION);
          move_uploaded_file($_FILES["product_image_2"]["tmp_name"], $tarfile);
      }

      if (isset($_FILES["product_image_3"]["name"])) {
        $tardir = "./assets/Product_Image/";
        $tarfile = $tardir . basename($product_image_3_move);
        $type = pathinfo($tarfile, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["product_image_3"]["tmp_name"], $tarfile);
    }
        echo "sent";
    }else{
        echo "Not Sent";
    }
 }
?>


<?php
include "header.php";
?>
<div class="container">
    <form method="POST" action="register_products.php" enctype="multipart/form-data">
        <h1>Add a product</h1>
        <div class="form-group">
          <label for="exampleInputEmail1">Seller Name</label>
          <input type="text" name="seller_name" readonly class="form-control">
          <small class="form-text text-muted">This filed cannot be edited</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Seller ID</label>
          <input type="text" class="form-control" readonly name="seller_id">
          <small class="form-text text-muted">This filed cannot be edited</small>
        </div>
        <div class="form-group">
          <label for="exampleSelect1">Category</label>
          <select required class="form-control" name="category" id="exampleSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Product Brand</label>
            <input required type="text" name="product_brand" class="form-control">
            <small class="form-text text-muted">This filed can be edited</small>
          </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Product Name</label>
            <input required type="text" name="product_name" class="form-control">
            <small class="form-text text-muted">This filed can be edited</small>
          </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Product Price</label>
            <input required type="text" name="product_price" class="form-control">
            <small class="form-text text-muted">This filed can be edited</small>
          </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Delivery Date</label>
            <input required type="date" name="delivery_date" class="form-control">
            <small class="form-text text-muted">This filed can be edited</small>
          </div>
        <div class="form-group">
          <label for="exampleTextarea">Product Description</label>
          <textarea required name="product_description" class="form-control" id="exampleTextarea" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Product Image</label>
          <input required type="file" name="product_image_1" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
          <small id="fileHelp" class="form-text text-muted">Insert Image 1</small>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Product Image</label>
          <input type="file" name="product_image_2" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
          <small id="fileHelp" class="form-text text-muted">Insert Image 2</small>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Product Image</label>
          <input type="file" name="product_image_3" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
          <small id="fileHelp" class="form-text text-muted">Insert Image 3</small>
        </div>
        <fieldset class="form-group">
          <legend>Return Policy?</legend>
          <div class="form-check">
            <label class="form-check-label">
              <input required type="radio" class="form-check-input" name="return_policy" id="return_policy_yes" value="yes">
              Yes
            </label>
          </div>
          <div class="form-check">
          <label class="form-check-label">
              <input required type="radio" class="form-check-input" name="return_policy" id="return_policy_no" value="no" >
              No
            </label>
          </div>
          <label>How Many Days?</label>
          <input type="text" class="form-control" name="return_policy_input" id="return_policy_input" disabled>
        </fieldset>

        <fieldset class="form-group">
            <legend>Delivery?</legend>
            <div class="form-check">
              <label class="form-check-label">
                <input required type="radio" class="form-check-input" name="delivery" id="optionsRadios1" value="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
            <label class="form-check-label">
                <input required type="radio" class="form-check-input" name="delivery" id="optionsRadios2" value="No" >
                No
              </label>
            </div>
          </fieldset>

          <fieldset class="form-group">
            <legend>Warranty?</legend>
            <div class="form-check">
              <label class="form-check-label">
                <input required type="radio" class="form-check-input" name="warranty" id="warrnty_yes" value="option1">
                Yes
              </label>
            </div>
            <div class="form-check">
            <label class="form-check-label">
                <input required type="radio" class="form-check-input" name="warranty" id="warrnty_no" value="option2" >
                No
              </label>
            </div>
            <label>How Many Months?</label>
            <input type="text" name="warranty_input" class="form-control" id="warranty_input" disabled>
        </fieldset>
        <button type="submit" name="add_product" class="btn btn-primary">Submit</button>
      </form>
    </div>

<?php include "footer.php"; ?>

<script>
         $("#warrnty_yes").click( function(){
   if( $(this).is(':checked') ) {
    $('#warranty_input').removeAttr("disabled");
   }
 });

 $("#warrnty_no").click( function(){
   if( $(this).is(':checked') ) {
    $('#warranty_input').attr('disabled', 'disabled');
   }
 });



 $("#return_policy_yes").click( function(){
   if( $(this).is(':checked') ) {
    $('#return_policy_input').removeAttr("disabled");
   }
 });

 $("#return_policy_no").click( function(){
   if( $(this).is(':checked') ) {
    $('#return_policy_input').attr('disabled', 'disabled');
   }
 });
    </script>