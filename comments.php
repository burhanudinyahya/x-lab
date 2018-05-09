<?php 

if($comments = comment_by_id($id_a)){
	$_SESSION['id'] = $id_a;
	$_SESSION['url_con'] = $canonical;
	$comments = comment_by_id($id_a);
	$jumlah_komen = mysqli_num_rows($comments);
}

require_once "x-comments-post.php";

?>

<?php if(!$comments){ ?>
<h3>Belum ada komentar </h3>
<?php }else{ ?>
<h3><?= $jumlah_komen; ?> Komentar</h3>
<?php } ?>
<hr>
	<?php if($comments){ ?>
  <?php while($row = mysqli_fetch_assoc($comments)){ 
  $date_com = $row['comment_date'];
  $email_com = $row['comment_author_email'];
  $date_com= date_create($date_com);
  $date_com = date_format($date_com, 'F j, Y - H:i');
  $grav_url_com = "https://www.gravatar.com/avatar/".md5($email_com)."?s=40&d=mm&r=g";
   ?>
	<img id="comment-<?= $row['comment_ID']; ?>" class="com-author-avatar" src="<?= $grav_url_com; ?>" />
	<p class="com-author">
		<?php if($row['comment_author_url'] === ''){ ?>
		<strong><?= $row['comment_author']; ?></strong>
		<?php }else{ ?>
		<a rel="nofollow" target="_blank" href="<?= $row['comment_author_url']; ?>"><strong><?= $row['comment_author']; ?></strong></a>
		<?php } ?>
	</p>
	<p class="com-meta"><a href="#comment-<?= $row['comment_ID']; ?>"><?= $date_com; ?></a></p>
	<p><?= $row['comment_content']; ?></p>
	<div class="reply">
		<a rel="nofollow" class="comment-reply-link" href="?replytocom=<?= $row['comment_ID']; ?>#responds" onclick="return addComment.moveForm( 'comment-<?= $row['comment_ID']; ?>', '<?= $row['comment_ID']; ?>', 'responds', '<?= $row['comment_post_ID']; ?>' )" aria-label="Reply to <?= $row['comment_author']; ?>">Balas <span>&darr;</span>
		</a>			
	</div>
	<hr class="hr-komentar">
	<?php } ?>
	<?php } ?>
	<div id="responds" class="panel panel-default">
	  <div class="panel-body">
      <form action="" method="post">
        <div class="form-group">
        <textarea name="isi_komen" class="form-control" required rows="10" cols="45" maxlength="65525"></textarea>
        </div>
        <div class="form-group">
        <input type="author" name="nama" class="form-control" required size="30" maxlength="245" placeholder="Nama Kamu">
        </div>
        <div class="form-group">
        <input type="email" name="email" class="form-control" required size="30" maxlength="100" placeholder="Email Kamu">
        </div>
        <div class="form-group">
        <input type="text" name="web_url" class="form-control" size="30" maxlength="200" placeholder="http://www.webkamu.com">
        </div>
        <hr>
        <input type="submit" name="submit" class="btn btn-primary" value="Kirim Komentar">   
      </form> 
	  </div>
	</div> 


