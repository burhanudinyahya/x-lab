<?php
$request_uri = explode('/', $_SERVER['REQUEST_URI']);

// Route it up!
if(isset($request_uri[2]) && $request_uri[2] != ''){

	require_once 'single.php';

}else{
	
	switch ($request_uri[1]) {
		// Home page
		case '':
		case 'index':
			require_once 'home.php';
			break;
		// Login page
		case 'login':
			require_once 'x-login.php';
			break;
		// Register page
		case 'register':
			require_once 'x-register.php';
			break;
		// Forgot page
		case 'forgot':
			require_once 'x-forgot.php';
			break;
		// Blog page
		case 'blog':
			require_once 'blog.php';
			break;
		// Portfolio page
		case 'portofolio':
			require_once 'portofolio.php';
			break;
		// Contact page
		case 'contact':
			require_once 'contact.php';
			break;
		// Contact page
		case 'about':
			require_once 'about.php';
			break;
		// Everything else
		default:
			header('HTTP/1.0 404 Not Found');
			require '404.php';
			break;
	}

}
