<?php 
$title_a = $page_title = 'Product';
$content_a = 'x-lab adalah tampat berbagi hasil belajar web programming dan development. x-lab juga menyediakan tutorial PHP Dasar, tutorial PHP Lanjutan, tutorial PHP MySQLi, tutorial PHP Native Prosedural, tutorial PHP OOP, PHP CMS dan PHP Framework, CodeIgniter, Laravel dan masih banyak lagi';
require_once "core/init.php";
require_once "views/header.php"; 
require_once "views/navbar.php";    
// $posts = view_post();
// require_once "views/head_title.php";
?>
<div class="jumbotron jumbotron-product jumbotron-inverse">
<div class="container-responsive">
<div class="container container-home">
<div class="row">
<div class="col-xs-10 col-xs-offset-1">
<h1 class="jumbotron-title display-heading-1" itemprop="name">Product of conduct</h1>
<p class="jumbotron-lead display-intro" itemprop="description">This is a template for a simple marketing or informational website.<br> Lorem ipsum dolor sit amet.<br>Consectetur adipisicing elit. Obcaecati, nemo.</p>
<!-- <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn hard</a></p> -->
<p><a href="#" class="btn btn-jumbotron btn-theme-purple" rel="nofollow">See more Product</a></p>
</div>
</div>
</div>
</div>
</div>
<div class="container">
<div class="row">
<div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
<h2 class="title-h2">Our Product, see below on Stuff</h2>
<p class="subtitle-p">You can try demo to make sure our products or can directly contact us if you interested</p>
<div class="container marketing">
<!-- START THE FEATURETTES -->
<div class="row featurette">
<div class="col-sm-5 col-md-5">
<img class="featurette-image img-responsive center-block" src="<?= $base_url ?>assets/images/product/product (4).png" alt="Generic placeholder image" width="100%">
</div>
<div class="col-sm-5 col-md-5">
<h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
<p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
</div>
</div>

<hr class="featurette-divider">

<div class="row featurette">
<div class="col-sm-5 col-sm-push-5 col-md-5 col-md-push-5">
<img class="featurette-image img-responsive center-block" src="<?= $base_url ?>assets/images/product/product (2).png" alt="Generic placeholder image" width="100%">
</div>
<div class="col-sm-5 col-sm-pull-5 col-md-5 col-md-pull-5">
<h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
<p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
</div>
</div>

<hr class="featurette-divider">

<div class="row featurette">
<div class="col-sm-5 col-md-5">
<img class="featurette-image img-responsive center-block" src="<?= $base_url ?>assets/images/product/product (3).png" alt="Generic placeholder image" width="100%">
</div>
<div class="col-sm-5 col-md-5">
<h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
<p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
</div>
</div>
</div>
</div>
</div>
<?php 
// require_once "views/sidebar.php"; 
require_once "views/footer.php";
?>