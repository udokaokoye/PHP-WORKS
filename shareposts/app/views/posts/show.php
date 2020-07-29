<?php
require APPROOT . '/views/inc/header.php';
?>
<a href="<?php echo URLROOT ?>/posts" class="btn btn-dark"><i class="fa fa-backward mr-1"></i>Back</a>
<br>
<h1><?php echo $data['post']->title; ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
Written by <strong><?php echo $data['user']->name; ?></strong> on <?php echo $data['post']->created_at; ?>
</div>
<p><?php echo nl2br($data['post']->body); ?></p>
<?php if ($data['post']->user_id == $_SESSION['user_id']) { ?>
<hr>
    
        <a href="<?php echo URLROOT ?>/posts/edit/<?php echo $data['post']->id ?>"><button class="btn btn-primary"><i class="fa fa-pencil mr-1"></i>Edit</button></a>
        
        <form class="pull-right" action="<?php echo URLROOT ?>/posts/delete/<?php echo $data['post']->id ?>" method="post">
        <button class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Delete</button>
        </form>
        
<?php } ?>
<?php
require APPROOT . '/views/inc/footer.php';
?>