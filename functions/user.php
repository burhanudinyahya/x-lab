<?php 

function cekToActivate($key)
{
	global $link;

	$query = "SELECT * FROM tb_users 
						WHERE user_activation_key='$key'";

	if($result = mysqli_query($link, $query))
	{
		if(mysqli_num_rows($result) != 0) return $result;
			else return false;
	}	
}

function updateStatus($key)
{
	global $link;

 	$query = "UPDATE tb_users SET user_status = 1 
 						WHERE user_activation_key='$key'";
	if(mysqli_query($link, $query)) return true;
	else return false;
}

function cek_user($user, $pass)
{
	global $link;
	$u = mysqli_escape_string($link, $user);
	$p = mysqli_escape_string($link, $pass);
	$p = md5($p);

	$query = "SELECT * FROM tb_users 
						WHERE user_login='$u' AND user_pass='$p'";
	if($result = mysqli_query($link, $query))
	{
		if(mysqli_num_rows($result) != 0) return $result;
			else return false;
	}
}

function cek_user_exist($user, $email)
{
	global $link;
	$u = mysqli_escape_string($link, $user);
	$e = mysqli_escape_string($link, $email);

	$query = "SELECT user_login, user_email FROM tb_users 
						WHERE user_login='$u' OR user_email='$e'";

	if($result = mysqli_query($link, $query))
	{
		if(mysqli_num_rows($result) != 0) return $result;
			else return false;
	}
	// if($result = mysqli_query($link, $query) or die('Gagal Menampilkan Data User')){
	// 	return $result;
	// }
}

function add_user($user, $email, $pass, $key){
	global $link;
	$u = mysqli_escape_string($link, $user);
	$e = mysqli_escape_string($link, $email);
	$p = mysqli_escape_string($link, $pass);
	$p = md5($p);

	$query = "INSERT INTO tb_users (user_login, user_email, user_pass, user_activation_key) 
						VALUES ('$u', '$e', '$p', '$key')";

	if(mysqli_query($link, $query)) return true;
	else return false;

}
?>