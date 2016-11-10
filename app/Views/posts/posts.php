<?php Flight::render('blocks/header');?>
    <!-- Begin page content -->
    <div class="container">
        <div class="row row-offcanvas row-offcanvas-right">
            <div class="col-xs-12 col-sm-9">
                <?php
                    if(!empty($paginator)){
                        echo $paginator;
                    }
                ?>
              <div class="row">
                  <?php
                    if(!empty($posts)){
                        foreach($posts as $post){
                            Flight::render('blocks/post',['post' => $post]);
                        }
                    } else {
                        echo '<h3>Постов нет <a href="/post/add">Add post</a></h3>';
                    }    
                  ?>
              </div>
            </div>    
        <?php  Flight::render('posts/postMenu'); ?>
        </div>
    </div>
<?php Flight::render('blocks/footer'); ?>