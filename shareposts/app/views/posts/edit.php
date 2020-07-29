<?php
require APPROOT . '/views/inc/header.php';
?>
    <a href="<?php echo URLROOT ?>/posts" class="btn btn-dark"><i class="fa fa-backward mr-1"></i>Back</a>
    <div class="card card-body bg-light mt-5">
    
    <h2>Edit Post</h2>
    <p>Edit post with this form</p>
    <form action="<?php  echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post">
        <div class="form-group">
        <label for="email">Title<sup>*</sup></label>
            <input type="text" name="title" placeholder="Enter Title" id="" class="form-control <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
            <span class="invalid-feedback"><?php echo $data['title_err'] ?></span>
        </div>
        <div class="form-group">
        <label for="password">Post<sup>*</sup></label>
            <textarea placeholder="Write Post" id="" name="body" class="form-control <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" cols="30" rows="10"><?php echo $data['body']; ?></textarea>
            <span class="invalid-feedback"><?php echo $data['body_err'] ?></span>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
    </div>


<?php
require APPROOT . '/views/inc/footer.php';
?>