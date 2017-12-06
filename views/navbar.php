<header itemscope itemtype="http://schema.org/WPHeader">
  <nav class="navbar-new navbar-trans navbar-static-top">
    <div class="container">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">  
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a itemprop="headline" class="navbar-brand" href="<?= $base_url ?>"><img alt="Brand" height="20" src="<?= $base_url; ?>assets/images/logo.png"></a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" itemscope itemtype="http://schema.org/SiteNavigationElement">
            <!--
            <ul class="nav navbar-nav">
                <li><a href="<?= $base_url ?>product">Product</a></li>
                <li><a href="<?= $base_url ?>service">Service</a></li>
            </ul>
            -->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?= $base_url ?>blog">Blog</a></li>
                <li><a href="<?= $base_url ?>portofolio">Portofolio</a></li>
                <?php if(isset($_SESSION['username'])): ?>
                <a class="btn btn-primary site-header-actions-btn mar-0 ml-15" href="<?= $base_url ?>admin" role="button"><span class="glyphicon glyphicon-user"></span> Your Account</a>
                <?php else: ?>
                <a rel="nofollow" class="btn site-header-actions-btn mar-0 ml-15" href="<?= $base_url ?>login" role="button">Log in</a>
                <a rel="nofollow" class="btn btn-primary site-header-actions-btn mar-0" href="<?= $base_url ?>register" role="button">Register</a>
                <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>

