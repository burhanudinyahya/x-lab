<?php
$page_title = $web_title = $title_a = '404 Page Not Found';
$base_url   = 'http://'.$_SERVER['HTTP_HOST'].'/';
require_once "views/header.php";
require_once "views/navbar.php";
require_once "views/page_title.php";
?>

<div class="container">
  <div class="row">
    <div class="col-xs-10 col-xs-offset-1">
      <p itemprop="description" style="font-size:16px;text-align:center;margin:0 0 30px 0;">The page you requested was not found. May be page has been deleted or absolutely nothing.</p>
      <div style="margin-bottom:0px">
        <form action="<?= $base_url ?>blog" method="get" accept-charset="UTF-8">
            <input type="text" name="search" class="form-control" placeholder="Cari Post disini...!">
        </form>
      </div>
    </div>
  </div>
</div>

<?php
require_once "views/footer.php";
?>
