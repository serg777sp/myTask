<?php Flight::render('blocks/header');?>
    <!-- Begin page content -->
    <div class="container">
        <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
<!--          <p class="pull-right visible-xs">
              fsfasdvfasgfas
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>-->
          <div class="row">
                <div class="panel panel-warning form-panel-500">
                    <div class="panel-heading"><span class="glyphicon glyphicon-plus"></span> Добавление поста</div>
                    <div class="panel-body">
                        <form class="form" method="post" enctype="multipart/form-data" action="/post/add">
                            <label>Заголовок:</label>
                            <input class="form-control" type="text" name="title" required>
                            <label>Текст поста:</label>
                            <textarea class="form-control" name="text" required></textarea>
                            <label>Картинка:</label>
                            <input class="form-control" name="pic" type="file"><br>
                            <button class="btn btn-success" name="submit" value="true" type="submit">Add post</button>
                        </form>
                    </div>
                </div>        
          </div><!--/row-->
        </div><!--/span-->
        <?php Flight::render('posts/postMenu'); ?>
        </div>
    </div>
<?php Flight::render('blocks/footer'); ?>