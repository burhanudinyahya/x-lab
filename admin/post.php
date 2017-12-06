<?php 
$page_title = 'All Post';
	require_once "core/init.php";
	require_once "views/header.php"; 
	require_once "views/navbar.php";
	require_once "views/sidebar.php"; 
    
  if(isset($_GET['post_status'])){
    if(isset($_GET['post_type'])){
      $posts = view_post_by($_GET['post_status'],$_GET['post_type']);
    }else{
      $posts = view_post_by($_GET['post_status'],'post');
    }
  }else{
    if(isset($_GET['post_type'])){
      $posts = view_post($_GET['post_type']);
    }else{
      $posts = view_post('post');
    }
  }

  if(isset($_GET['post_type'])){ 
    $post_type = $_GET['post_type'];
  }else{
    $post_type = 'post';
  }
?>

    <div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
        <?php if(isset($_GET['post_status'])){ ?>
          <h2 class="page-header"><?= ucfirst($_GET['post_status']).' '.ucfirst($post_type) ?></h2>
        <?php }else{ ?>
          <h2 class="page-header">All <?= ucfirst($post_type) ?></h2>
        <?php } ?>
        <!-- validasi message -->
        <?php if(isset($_SESSION['message'])) : ?>
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert"  aria-label="Close">
                <span aria-hidden="true">&times;</span>
          </button>
            <?=$_SESSION['message']; ?>
        </div>
        <?php endif; ?> 
        <ul class="nav-post">
          <li class="all">
            <a href="post.php<?php if(isset($_GET['post_type'])){ echo '?post_type='.$_GET['post_type'];} ?>" class="current">
              All <span class="count">(<?= countPost('publish',$post_type) + countPost('draft',$post_type) ?>)</span>
            </a>
          </li>
          <?php if(countPost('publish',$post_type) != 0){ ?>
          <li class="publish">| 
            <a href="post.php?post_status=publish<?php if(isset($_GET['post_type'])){ echo '&post_type='.$_GET['post_type'];} ?>">
              Published <span class="count">(<?= countPost('publish',$post_type) ?>)</span>
            </a>
          </li>
          <?php } ?>
          <?php if(countPost('draft',$post_type) != 0){ ?>
          <li class="draft">| 
            <a href="post.php?post_status=draft<?php if(isset($_GET['post_type'])){ echo '&post_type='.$_GET['post_type'];} ?>">
              Draft <span class="count">(<?= countPost('draft',$post_type) ?>)</span>
            </a>
          </li>
          <?php } ?>
          <?php if(countPost('trash',$post_type) != 0){ ?>
          <li class="trash">| 
            <a href="post.php?post_status=trash<?php if(isset($_GET['post_type'])){ echo '&post_type='.$_GET['post_type'];} ?>">
              Trash <span class="count">(<?= countPost('trash',$post_type) ?>)</span>
            </a>
          </li>
          <?php } ?>
        </ul>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Categories</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php while($rows = mysqli_fetch_assoc($posts)): ?>
                <?php 
                    $id = $rows['ID'];
                    $author = $rows['post_author'];
                    $judul  = $rows['post_title']; 
                    $slug   = $rows['title_slug'];
                    $status   = $rows['post_status'];
                    $date   = $rows['post_modified'];
                    $date   = date_create($date);
                    $date   = date_format($date, 'F j, Y');
                ?>
                <tr>
                  <td>
                  <?php if($status == 'draft'){ ?>
                    <p><a href="<?= $base_url; ?>admin/post_edit.php?id=<?= $id; ?>&action=edit"><strong><?= $judul ?></strong></a> — <strong>Draft</strong></p>
                  <?php }else{ ?>
                    <p><a href="<?= $base_url; ?>admin/post_edit.php?id=<?= $id; ?>&action=edit"><strong><?= $judul ?></strong></a></p>
                  <?php } ?>

                    <?php if($status == 'draft'){ ?>
                    <a href="<?= $base_url; ?>admin/post_edit.php?id=<?= $id; ?>&action=edit">Edit</a> | <a href="<?= $base_url; ?>admin/post_edit.php?id=<?= $id; ?>&action=trash">Move to trash</a> | <a target="_blank" href="#">Preview</a>
                    <?php }elseif($status == 'trash'){ ?>
                    <a href="<?= $base_url; ?>admin/post_edit.php?id=<?= $id; ?>&action=untrash">Restore</a> | <a href="<?= $base_url; ?>admin/post_edit.php?id=<?= $id; ?>&action=delete">Delete Permanenly</a>
                    <?php }elseif($status == 'publish'){ ?>
                    <a href="<?= $base_url; ?>admin/post_edit.php?id=<?= $id; ?>&action=edit">Edit</a> | <a href="<?= $base_url; ?>admin/post_edit.php?id=<?= $id; ?>&action=trash">Move to trash</a> | <a target="_blank" href="<?= $base_url; ?>blog/<?= $slug; ?>">View</a>
                    <?php } ?>
                  </td>
                  <td><a href="<?= $base_url; ?>admin/post_edit.php?id=<?= $id; ?>&author=<?= $author ?>">x-lab</a></td>
                  <td><a href="#">--</a></td>
                  <td><p>Last Modified</p><?= $date ?></td>
                </tr>
                <?php endwhile; ?> 
              </tbody>
              <tfoot>
                <th>Title</th>
                  <th>Author</th>
                  <th>Categories</th>
                  <th>Date</th>
                </tr>
              </tfoot>
            </table>
        </div> 
    </div>
<?php 
    unset($_SESSION['message']);
	require_once "views/footer.php";
?>