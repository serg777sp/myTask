<div class="col-6 col-sm-6 col-lg-4 post">
    <h3><?php echo $post->title; ?></h3>
    <img src="<?php echo $post->getImgUrl(); ?>" class="myimg" title="post image">
    <p class="post-prev-text"><?php echo $post->getPrevText();?></p>
    <p><a class="btn btn-default" href="/post/show/<?php echo $post->id ?>" role="button">View details &raquo;</a></p>
</div>