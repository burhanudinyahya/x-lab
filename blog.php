<?php 
$title_a = $page_title = 'Blog';
$content_a = 'Artikel Kami';
require_once "core/init.php";
require_once "views/header.php"; 
require_once "views/navbar.php"; 
// Ini formula untul pagination
// Minimail post per halaman
$perPage = 7;
// ambil halaman berapa dari url, jika tidak ada page = 1
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
// Jika page > 1 maka (page * perPage) - perPage, jika tidak = 1
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
// Ambil post dengan LIMIT
$posts = view_post_perPage($start, $perPage);
// Ambil total semua post yang ada
$totalPosts = view_post();
// Pembulatan jumlan halaman
$pages = ceil($totalPosts/$perPage);
// Formula dari form search
if(isset($_GET['search'])){
  $search = $_GET['search'];
  $posts  = search_result($search,'post');
} 
require_once "views/head_title.php";
?>

<div class="container">
  <div class="row">
    <!-- <div class="auto-center"> -->
    <div class="col-sm-7 col-sm-offset-1 col-md-7 col-md-offset-1">     
      <?php if($posts){ ?>
		  <?php while($rows = mysqli_fetch_assoc($posts)): ?>
      <div class="posts">
        <h2><a href="<?= $base_url ?>blog/<?= $rows['title_slug']; ?>"><?= $rows['post_title'] ?></a></h2>
          <ul class="meta-post">
            <li class="meta-item">
              <span class="glyphicon glyphicon-calendar"></span> <p><?= date_format(date_create($rows['post_date']), 'F j, Y'); ?></p>
            </li>
            <li class="meta-item">
              <?php $grav_url = "https://www.gravatar.com/avatar/".md5('bor.yahya@gmail.com')."?s=16&d=identicon"; ?>
              <img class="author-avatar" src="<?= $grav_url; ?>" />
              <a rel="nofollow" href="#">x-lab</a>
            </li>
            <li class="meta-item">
              <span class="glyphicon glyphicon-bookmark"></span> <a rel="nofollow" href="#">PHP Prosedural</a>
            </li>
          </ul>
          <div class="post detail-post">
            <?= except_post($rows['post_content']); ?>
          </div>
    	</div>
    	<hr>
      <?php endwhile; ?> 
      <?php if(isset($_GET['search']) == ""){ ?>
      <nav>
        <ul class="pager">
        <?php if($page < $pages){ ?>
          <li class="next"><a href="<?= $base_url ?>blog/page/<?= (int)$page + 1; ?>">Older <span aria-hidden="true">&rarr;</span></a></li>
        <?php } ?>
        <?php if($page > 1){ ?>
          <li class="previous"><a href="<?= $base_url ?>blog/page/<?= (int)$page - 1; ?>"><span aria-hidden="true">&larr;</span> Newer</a></li>
        <?php } ?>
        </ul>
      </nav>
      <?php } ?>
      <?php }else{ ?>
      <div class="posts">
          <h2>Post yang Anda cari tidak tersedia</h2>
      </div>
      <?php } ?>
    </div>
<?php 
require_once "views/sidebar.php"; 
require_once "views/footer.php";
?>