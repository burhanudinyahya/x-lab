<?php 


function view_post($post_type){
	global $link;

	$query = "SELECT * FROM tb_posts WHERE post_type='$post_type' AND post_status <> 'trash' ORDER BY ID DESC";
	$result = mysqli_query($link, $query) or die('Gagal Menampilkan Post');

	return $result;
}

function view_post_by($status,$post_type){
	global $link;

	$query = "SELECT * FROM tb_posts WHERE post_type='$post_type' AND post_status='$status' ORDER BY ID DESC";
	$result = mysqli_query($link, $query) or die('Gagal Menampilkan Post');

	return $result;
}

function countPost($status,$post_type){
	global $link;
	$query = "SELECT * FROM tb_posts WHERE post_status='$status' AND post_type='$post_type'";
	if($result = mysqli_query($link, $query)){
		if(mysqli_num_rows($result) != 0) return mysqli_num_rows($result);
			else return 0;
	}
}

function view_post_id($id){
	global $link;

	$query = "SELECT * FROM tb_posts WHERE ID=$id";
	if($result = mysqli_query($link, $query)){
		if(mysqli_num_rows($result) != 0) return $result;
			else return false;
	}
}

function cekTitleSlug($slug){
	global $link;
	$query = "SELECT * FROM tb_posts WHERE title_slug='$slug'";
	if($result = mysqli_query($link, $query)){
		if(mysqli_num_rows($result) == 0) return true;
			else return false;
	}
}

function cekIdBySlug($slug){
	global $link;
	$query = "SELECT * FROM tb_posts WHERE title_slug='$slug'";
	if($result = mysqli_query($link, $query) or die('Gagal Menampilkan Data User')){
		return $result;
	}
}

 function add_post($title, $content, $slug){
 	$query = "INSERT INTO tb_posts (post_title, post_content, title_slug) VALUES ('$title', '$content', '$slug')";

 	return run($query);
 }

 function draft_post($title, $content, $slug){
 	$query = "INSERT INTO tb_posts (post_title, post_content, title_slug, post_status) VALUES ('$title', '$content', '$slug', 'draft')";

 	return run($query);
 }

  function draft_post_2($title, $content, $slug, $id){
 	$query = "UPDATE tb_posts SET post_title='$title', post_content='$content', title_slug='$slug', post_status='draft', post_modified=now() WHERE ID=$id";

 	return run($query);
 }

 function edit_post($title, $content, $slug, $id){
 	$query = "UPDATE tb_posts SET post_title='$title', post_content='$content', title_slug='$slug', post_modified=now() WHERE ID=$id";

 	return run($query);
 }

function publish_post($title, $content, $slug, $id){
 	$query = "UPDATE tb_posts SET post_title='$title', post_content='$content', title_slug='$slug', post_status='publish', post_modified=now() WHERE ID=$id";

 	return run($query);
 }

function trash_post($id){
 	$query = "UPDATE tb_posts SET post_status='trash', post_modified=now() WHERE ID=$id";

 	return run($query);
 }

 function untrash_post($id){
 	$query = "UPDATE tb_posts SET post_status='draft', post_modified=now() WHERE ID=$id";

 	return run($query);
 }

 function del_post($id){
 	$query = "DELETE FROM tb_posts WHERE ID=$id";

 	return run($query);
 }

function run($query){
	global $link;

	if(mysqli_query($link, $query)) return true;
	else return false;
}
?>