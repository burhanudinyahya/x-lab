<?php 
$title_a = $page_title = 'Portofolio';
$content_a = 'Portofolio Kami';
	require_once "core/init.php";
	require_once "views/header.php"; 
	require_once "views/navbar.php";    
    // $posts = view_post();
  require_once "views/page_title.php";
?>
<div class="container">
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
  		<h2 class="title-h2">Our Portofolio, free on Github</h2>
  		<p class="subtitle-p">You can dowbload and modify it and fork for you to learn. This under MIT lisence</p>
      <div class="row main-padding">
        <div class="col-sm-4 col-md-4 col-lg-4 col-relative">
          <a class="img-overlay" href="#"><span class="porto-btn">View details</span></a>
          <img class="img-rounded img-bordered" src="<?= $base_url ?>assets/images/portofolio/geelabs.png" alt="CMS GeeLabs">
          <div class="title-overlay">
          	<a href="#"><h2 class="title-thumbnail">GeeLabs</h2></a>
          	<p class="title-thumbnail2">CMS</p>
          </div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4 col-relative">
          <a class="img-overlay" href="#"><span class="porto-btn">View details</span></a>
          <img class="img-rounded img-bordered" src="<?= $base_url ?>assets/images/portofolio/theme.png" alt="CoverLab">
          <div class="title-overlay">
            <a href="#"><h2 class="title-thumbnail">CoverLab</h2></a>
            <p class="title-thumbnail2">Wp Theme</p>
          </div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4 col-relative">
          <a class="img-overlay" href="#"><span class="porto-btn">View details</span></a>
          <img class="img-rounded img-bordered" src="<?= $base_url ?>assets/images/portofolio/hijabuki.png" alt="Hijabuki">
          <div class="title-overlay">
            <a href="#"><h2 class="title-thumbnail">Hijabuki</h2></a>
            <p class="title-thumbnail2">Wp Theme</p>
          </div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4 col-relative">
          <a class="img-overlay" href="#"><span class="porto-btn">View details</span></a>
          <img class="img-rounded img-bordered" src="<?= $base_url ?>assets/images/portofolio/hijabuki.png" alt="Hijabuki">
          <div class="title-overlay">
            <a href="#"><h2 class="title-thumbnail">Hijabuki</h2></a>
            <p class="title-thumbnail2">Wp Theme</p>
          </div>
        </div>
      </div><!-- /.row -->
      <nav class="pagination-porto">
        <ul class="pagination">
          <li>
            <a href="#" aria-label="Previous">
              <span aria-hidden="true">Previous</span>
            </a>
          </li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li>
            <a href="#" aria-label="Next">
              <span aria-hidden="true">Next</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>

<?php 
    // require_once "views/sidebar.php"; 
	require_once "views/footer.php";
?>