<?php 
$page_title ='Edit Post';
require_once "core/init.php";

if(empty($_GET['id']) OR empty($_GET['action'])){
    header('Location: index.php');
}

$message = '';
$id = $_GET['id'];
if($_GET['action'] === 'edit'){
    if(isset($_POST['submit']) && $_POST['submit'] == 'Update'){
        $title = trim($_POST['title']);
        $slug = createSlug($title);
        $content = trim($_POST['content']);

        if(!empty($title) && !empty($content)){
            if(edit_post($title, $content, $slug, $id)){
                $message = 'Post berhasil diupdate';
                $_SESSION['message'] = $message;
            }else{
                $message = 'Ada masalah saat update post';
                $_SESSION['message'] = $message;
            }
        }else{
            $message = 'Judul Post dan Konten harus di isi!';
            $_SESSION['message'] = $message;
        }
    }else if(isset($_POST['submit']) && $_POST['submit'] == 'Publish'){
        $title = trim($_POST['title']);
        $slug = createSlug($title);
        $content = trim($_POST['content']);

        if(!empty($title) && !empty($content)){
            if(publish_post($title, $content, $slug, $id)){
                $message = 'Post berhasil dipublish';
                $_SESSION['message'] = $message;
            }else{
                $message = 'Ada masalah saat publish post';
                $_SESSION['message'] = $message;
            }
        }else{
            $message = 'Judul Post dan Konten harus di isi!';
            $_SESSION['message'] = $message;
        }
    }else if(isset($_POST['submit']) && $_POST['submit'] == 'Save Draft'){
        $title = trim($_POST['title']);
        $slug = createSlug($title);
        $content = trim($_POST['content']);

        if(!empty($title) && !empty($content)){
            if(draft_post_2($title, $content, $slug, $id)){
                $message = 'Post berhasil di simpan di draft';
                $_SESSION['message'] = $message;
            }else{
                $message = 'Ada masalah saat simpan post di draft';
                $_SESSION['message'] = $message;
            }
        }else{
            $message = 'Judul Post dan Konten harus di isi!';
            $_SESSION['message'] = $message;
        }
    }        
}else if($_GET['action'] === 'trash'){
    if(!empty($_GET['id'])){
        if(trash_post($_GET['id'])){
            header('Location: post.php?post_status=trash');
            $message = 'Post berhasil dipindahkan ke tong sampah';
            $_SESSION['message'] = $message;
        }else{
            $message = 'Ada masalah saat post dipindahkan!';
            $_SESSION['message'] = $message;
        }
    }else{
        header('Location: index.php');
    }
}else if($_GET['action'] === 'untrash'){
    if(!empty($_GET['id'])){
        if(untrash_post($_GET['id'])){
            header('Location: post.php?post_status=draft');
            $message = 'Post telah dikeluarkan dari tong sampah. Lihat bagian <strong>Draft</strong>';
            $_SESSION['message'] = $message;
        }else{
            $message = 'Ada masalah saat mengeluarkan post dari tong sampah!';
            $_SESSION['message'] = $message;
        }
    }else{
        header('Location: index.php');
    }
}else if($_GET['action'] === 'delete'){
    if(!empty($_GET['id'])){
        if(del_post($_GET['id'])){
            header('Location: post.php?post_status=trash');
            $message = 'Post berhasil di hapus secara permanen';
            $_SESSION['message'] = $message;
        }else{
            $message = 'Ada masalah saat menghapus post';
            $_SESSION['message'] = $message;
        }
    }else{
        header('Location: index.php');
    }
}

// dapatkan array post berdadarkan id
if(isset($_GET['id'])){
    if($post = view_post_id($id)){  // jika true atau ada datanya
        while($row = mysqli_fetch_assoc($post)){
            $id = $row['ID'];
            $date = date_create($row['post_date']);
            $publised = date_format($date, 'F j, Y');
            $title_a = $row['post_title'];
            $content_a = $row['post_content'];
            $status_a = ucfirst($row['post_status']).'ed';
            $slug_a = $row['title_slug'];
            $modified = date_create($row['post_modified']);
            $lastmod_a = date_format($modified, 'F j, Y');
        }
    }else{ // jika false
        $message = 'Post sudah terhapus, post tidak ketemu';
        $_SESSION['message'] = $message;
        header('Location: post.php');
    }
}

require_once "views/header.php"; 
require_once "views/navbar.php";
require_once "views/sidebar.php"; 
?>
    <div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
        <h2 class="page-header">Edit Post</h2>
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
            <form action="" method="post" id="edit-form">
                <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Enter title here" value="<?= $title_a; ?>">
                </div>
                <p><strong>Permalink :</strong> <a target="_blank" href="<?= $base_url ?>blog/<?= $slug_a; ?>">
                <?= $base_url ?>blog/<?= $slug_a; ?></a></p>
                <div class="form-group">
                <textarea name="content" class="form-control ckeditor" rows="35"><?= $content_a; ?></textarea>
                </div>                       
            </form> 
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 sub-main-r">
            <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Post Status</h3>
            </div>
                <div class="panel-body">
                    <?php if($status_a == 'Drafted'){ ?>
                    <input type="submit" form="edit-form" name="submit" class="btn btn-default" value="Save Draft"> 
                    <hr>
                    <?php } ?> 
                    <p>Status : <strong><?= $status_a; ?></strong></p>
                    <p>Published on : <strong><?= $publised; ?></strong></p>
                    <p>Last Modified : <strong><?= $lastmod_a; ?></strong></p>
                    <hr>
                    <a href="../admin/post_edit.php?id=<?= $id ?>&action=trash">Move to trash</a>
                    <?php if($status_a == 'Drafted'){ ?>
                    <input type="submit" form="edit-form" name="submit" class="btn btn-primary btn-right" value="Publish">
                    <!-- <button type="submit" form="edit-form" name="submit" class="btn btn-primary btn-right">Publish</button> -->
                    <?php }else{ ?> 
                    <input type="submit" form="edit-form" name="submit" class="btn btn-primary btn-right" value="Update">
                    <!-- <button type="submit" form="edit-form" name="submit" class="btn btn-primary btn-right">Update</button> -->   
                    <?php } ?>                       
                </div>
            </div> 
            <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Activity</h3>
            </div>
                <div class="panel-body">

                </div>
            </div> 
            <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Activity</h3>
            </div>
                <div class="panel-body">

                </div>
            </div> 
        </div>   
    </div>
</div>
<?php 
    // unset($_SESSION['message']);
	require_once "views/footer.php";
?>