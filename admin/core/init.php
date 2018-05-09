<?php

session_start();
require_once "functions/db.php";
require_once "functions/blog.php";
require_once "functions/user.php";
require_once "functions/slug.php";
require_once "functions/visitor.php";

$base_url              = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url              = $base_url.'://'.$_SERVER['HTTP_HOST'].'/';
// print_r($base_url);
if(isset($page_title)){
	$_SESSION['web_title'] = $page_title;
	$web_title             = $_SESSION['web_title'];
}

// if($page_id != 'login'){
	if(empty($_SESSION['username'])){
	    header('Location: '.$base_url.'login');
	}
// }
?>
