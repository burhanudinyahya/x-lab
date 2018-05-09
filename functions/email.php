<?php 
// Update 9/8/16
function sendKey($email, $user, $key)
{
  $to       = $email;
	$subject  = "[Link Aktivasi] x-lab";
	$pesan	  = "Hi <strong>$user</strong>,<br><br>
							You have joined in x-lab.<br>
							Please, klik this link below to activate your account :<br>
							<a rel='nofollow' target='_blank' href='http://x-lab.com/x-login.php?key=$key'>http://x-lab.com/login.php?key=$key</a>
							<br><br>
							Thank for your join.<br>
							Warm regard<br><br>
							<strong>x-lab</strong>";
				
	$headers  = "From: x-lab <no-replay@x-lab.com>\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

  return mail("$to", "$subject", "$pesan", "$headers", "no-reply@x-lab.com");  
}
    
?>