<?php 

function cek_data($user, $pass){
	global $link;
	$u = mysqli_escape_string($link, $user);
	$p = mysqli_escape_string($link, $pass);
	$p = md5($p);

	$query = "SELECT * FROM tb_users WHERE user_login='$u' AND user_pass='$p'";
	if($result = mysqli_query($link, $query)){
		if(mysqli_num_rows($result) != 0) return true;
			else return false;
	}
}

?>