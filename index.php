<?php 

session_start();

require_once "functions/db.php";
require_once "functions/blog.php";
require_once "functions/slug.php";
require_once "functions/user.php";
require_once "functions/email.php";
require_once "functions/visitor.php";

$http              = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");

$canonical			   = $http.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$base_url          = $http.'://'.$_SERVER['HTTP_HOST'].'/';

// fungsi ini untuk mendeteksi link dari luar yang masuk ke web kita (backlink) 
// ini nofollow/follow belum dapat difilter
if(isset($_SERVER['HTTP_REFERER'])){
	$url = $_SERVER['HTTP_REFERER'];
	$parts_url = parse_url($url);
	if ($parts_url['host'] != $_SERVER['HTTP_HOST']){
		InsertVisitor($_SERVER['HTTP_REFERER'], $canonical);
	}
}else{
	//tidak diketahui karena kemungkinan situs kita sudah di bookmark 
	//atau user ketik langsung di address bar browser
	InsertVisitor('tidak diketahui', $canonical);
}
// }

if(isset($page_title)){
	$_SESSION['web_title'] = $page_title;
	$web_title             = $_SESSION['web_title'];
}

require_once "routes.php";