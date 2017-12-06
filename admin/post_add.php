<?php 
$page_title = 'Add New Post';
require_once "core/init.php";
$message = '';
if(isset($_POST['submit'])){
    $title = trim($_POST['title']);
    $slug = createSlug($title);
    $content = trim($_POST['content']);
    if(!empty($title) && !empty($content)){
        if(cekTitleSlug($slug)){
            if($_POST['submit'] == 'Publish'){
                if(add_post($title, $content, $slug)){
                    $message = 'Post published successfully';
                    $_SESSION['message'] = $message;
                    $adaId = cekIdBySlug($slug);
                    while($rows = mysqli_fetch_assoc($adaId)){
                        $id = $rows['ID'];
                    }
                    header("Location: post_edit.php?id=$id&action=edit");
                }else{
                    $message = 'Any wrong while add post';
                    $_SESSION['message'] = $message;
                }
            }else if($_POST['submit'] == 'Save Draft'){
                if(draft_post($title, $content, $slug)){
                    $message = 'Post save as draft successfully';
                    $_SESSION['message'] = $message;
                    $adaId = cekIdBySlug($slug);
                    while($rows = mysqli_fetch_assoc($adaId)){
                        $id = $rows['ID'];
                    }
                    header("Location: post_edit.php?id=$id&action=edit");
                }else{
                    $message = 'Any wrong while save post as draft';
                    $_SESSION['message'] = $message;
                }
            }
        }else{
            $message = '<strong>Gagal post.</strong> Judul post sudah terpakai';
        }
    }else{
        $message = 'Title and Content Must Filled';
        $_SESSION['message'] = $message;
    }

}
require_once "views/header.php"; 
require_once "views/navbar.php";
require_once "views/sidebar.php"; 
?>
    <div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
        <h2 class="page-header">Add New Post</h2>
        <!-- validasi message -->
        <?php if(isset($_SESSION['message'])) : ?>
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert"  aria-label="Close">
                <span aria-hidden="true">&times;</span>
          </button>
            <?=$_SESSION['message']; ?>
        </div>
        <?php endif; ?>
        <div class="col-xs-12 col-sm-9 col-md-9 sub-main-l">
            <form action="" method="post" id="add-form">
                <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Enter title here">
                </div>
                <div class="form-group">
                <textarea name="content" class="form-control ckeditor" rows="15"></textarea>
                </div>
            </form> 
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 sub-main-r">
            <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Post Status</h3>
            </div>
                <div class="panel-body">
                    <input type="submit" form="add-form" name="submit" class="btn btn-default" value="Save Draft"> 
                    <hr>
                    <p>Status : <strong>Draft</strong></p>
                    <p>Publish : <strong>Immediately</strong></p>
                    <p>Last Modified : - </p>
                    <hr>
                    <input type="submit" form="add-form" name="submit" class="btn btn-primary btn-right" value="Publish">   
                    <!-- <button type="submit" form="add-form" name="submit" class="btn btn-primary btn-right">Publish</button>                             -->
                </div>
            </div> 
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Categories</h3>
                </div>
                    <div class="panel-body">

                    </div>
            </div> 
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Belum perlu sih</h3>
                </div>
                    <div class="panel-body">

                    </div>
            </div> 
        </div>
    </div>

<!-- End All -->
</div>
</div>
<?php 
    // unset($_SESSION['message']);
	require_once "views/footer.php";
?>