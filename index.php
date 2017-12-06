<?php 
$content_a = 'x-lab adalah tampat berbagi hasil belajar web programming dan development. x-lab menyediakan Jasa pembuatan Website maupun Web Application dengan teknologi PHP Prosedural sampai Framework.';
require_once "core/init.php";
require_once "views/header.php"; 
// require_once "views/navbar.php";    
?>
<div class="site-wrapper">
  <div class="site-wrapper-inner">
    <div class="cover-container">
      <div class="masthead clearfix">
        <div class="inner">
          <a itemprop="headline" class="masthead-brand" href="<?= $base_url ?>"><img alt="Brand" height="20" src="<?= $base_url; ?>assets/images/logo-w.png"></a>
          <nav>
            <ul class="nav masthead-nav">
              <!-- <li><a href="product">Product</a></li> -->
              <!-- <li><a href="service">Service</a></li> -->
              <li><a href="portofolio">Portofolio</a></li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="inner cover">
        <h1 class="cover-heading">Belajar Web Programming dan Development</h1>
        <h2 class="cover-heading2">x-lab</h2>
        <p class="lead">x-lab adalah tampat berbagi hasil belajar web programming dan development.<br>x-lab juga menyediakan Jasa pembuatan Website maupun Web Application dengan teknologi PHP Prosedural sampai Framework.</p>
        <p class="lead">
          <a href="blog" class="btn btn-lg btn-primary mr-b">Learn More</a>
          <a href="contact" class="btn btn-lg btn-primary mr-b">Contact Us</a>
        </p>
      </div>
      <div class="mastfoot">
        <div class="inner">
          <p>x-lab &copy; 2017</p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php  
require_once "views/footer-login.php";
?>