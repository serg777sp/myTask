<?php Flight::render('blocks/header');?>
    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>Sticky footer with fixed navbar</h1>
      </div>
      <p class="lead">Pin a fixed-height footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code>padding-top: 60px;</code> on the <code>body > .container</code>.</p>
      <p>Back to <a href="../sticky-footer">the default sticky footer</a> minus the navbar.</p>
      <p>Шаблон bootstrap с прижатым футером</p>
      <a href='/post/table/create'>
          <button class="btn btn-danger"><span class="glyphicon glyphicon-floppy-save"></span> Создать таблицу posts в базе данных</button>
      </a>
    </div>   
<?php Flight::render('blocks/footer'); ?>
