<?php Flight::render('blocks/header');?>
    <!-- Begin page content -->
    <div class="container">
        <div class="row row-offcanvas row-offcanvas-right">
            <div class="col-xs-12 col-sm-9">
              <div class="row">
                  <?php
                    if(!empty($post)){
                  ?>
                    <h3><?php echo $post->title; ?></h3>
                    <img src="<?php echo $post->getImgUrl(); ?>" class="myimg-show" title="post image">
                    <p class="post-prev-text"><?php echo $post->text;?></p>
                  <?php
                    } else {
                        echo '<h3>Постa нет</h3>';
                    }    
                  ?>
              </div>
            </div>    
        <?php  Flight::render('posts/postMenu'); ?>
        </div>    
    </div>
<?php Flight::render('blocks/footer'); ?>