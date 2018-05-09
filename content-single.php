<?php 
// require_once "core/init.php";
while($row = mysqli_fetch_assoc($post)){
    $id_a = $row['ID'];
    $title_a = $row['post_title'];
    $content_a = $row['post_content'];
    $date_a = $row['post_date'];
    $date = date_create($date_a);
    $date = date_format($date, 'F j, Y');
    // Ini untuk title page di browser
    $web_title = $title_a;
}

require_once "views/header.php"; 
require_once "views/navbar.php";
require_once "views/head_title.php";
?>

<div class="container">
    <div class="row">
        <div class="col-sm-7 col-sm-offset-1 col-md-7 col-md-offset-1">   
            <ol class="breadcrumb basic">
              <li><a rel="nofollow" href="<?= $base_url ?>">Home</a></li>
              <li><a rel="nofollow" href="<?= $base_url ?>blog">Blog</a></li>
              <li class="active"><?=$title_a;?></li>
            </ol>
            <div class="content">
                <ul class="meta-post">
                    <li class="meta-item">
                        <span class="glyphicon glyphicon-calendar"></span> <p><?= $date ?></p>
                    </li>
                    <li class="meta-item">
                        <?php $grav_url = "https://www.gravatar.com/avatar/".md5('bor.yahya@gmail.com')."?s=16&d=identicon"; ?>
                        <img class="author-avatar" src="<?= $grav_url; ?>" />
                        <a rel="nofollow" href="#">x-lab</a>
                    </li>
                    <li class="meta-item">
                        <span class="glyphicon glyphicon-bookmark"></span> <a rel="nofollow" href="#">Mesin antrian</a>
                    </li>
                </ul>
                <div class="post detail-post" itemscope itemtype="http://schema.org/Article">
                    <?=$content_a;?>
                </div>
            </div>
            <div class="artikel-terkait">
                <h3>Belum ada artikel terkait</h3>
                <hr>
            </div>
            <div class="form-komentar">
                <?php require_once "comments.php"; ?>
            </div>
        </div>

<?php 
require_once "views/sidebar.php"; 
require_once "views/footer.php";
?>