<?php 

//total post
function view_post()
{
	$query = "SELECT * FROM tb_posts 
						WHERE post_status='publish' AND post_type='post'
						ORDER BY ID DESC";
	if(result($query)){
		return mysqli_num_rows(result($query));
	}else{
		return 0;
	}
}

//post pagination limit
function view_post_perPage($start, $perPage)
{
	$query = "SELECT * FROM tb_posts 
						WHERE post_status='publish' AND post_type='post'
						ORDER BY ID DESC 
						LIMIT $start, $perPage";

	return result($query);
}

//Sudah tidak dipakai
function view_post_id($id, $slug)
{
	$query = "SELECT * FROM tb_posts 
						WHERE ID=$id AND title_slug='$slug'";

	return result($query);
}

//menampilkan slug
function view_post_slug($id, $slug)
{
	$query = "SELECT * FROM tb_posts 
						WHERE ID=$id AND title_slug='$slug'";

	return result($query);
}

// hasil pencarian
function search_result($search,$post_type)
{
	$query = "SELECT * FROM tb_posts 
						WHERE post_status='publish' AND post_type='$post_type'
						AND (post_title LIKE '%$search%' OR post_content LIKE '%$search%') 
						ORDER BY ID DESC";

	return result($query);
}

function result($query)
{
	global $link;
	
	if($result = mysqli_query($link, $query))
	{
		if(mysqli_num_rows($result) != 0) return $result;
		else return false;
	}
}

// except post di halaman blog
function except_post($string)
{
	$string = substr($string, 0, 500);
	return $string . "...";
}

//auto description untuk di meta description tiap post
function descriptionPost($string)
{
	$string = htmlentities(strip_tags(substr($string, 0, 250)));
	return $string . "";
}

// ==== KOMENTAR ==== 

function run($query){
	global $link;

	if(mysqli_query($link, $query)) return true;
	else return false;
}

function add_comment($id_a, $nama, $email, $web_url, $isi_komen){
	$query = "INSERT INTO tb_comments (comment_post_ID, comment_author, comment_author_email, comment_author_url, comment_date, comment_content)
						VALUES ('$id_a', '$nama', '$email', '$web_url', now(), '$isi_komen')";

	return run($query);
}

function comment_by_id($id_post)
{
	$query = "SELECT * FROM tb_comments
						WHERE comment_post_ID=$id_post";

	return result($query);
}

?>