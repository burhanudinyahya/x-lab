<?php 
$page_title = 'Register';
require_once "core/init.php";
    
if(isset($_SESSION['username'])){
    header('Location: '.$base_url.'admin');
}

$message = '';
if(isset($_POST['submit'])){
    $user   = htmlentities(strip_tags(trim($_POST['username'])));
    $user   = str_replace(" ", "", strtolower($user));
    $email  = trim($_POST['email']);
    $pass   = trim($_POST['password']);
    $key    = time().':'.sha1(time());
    // print_r($user1);

    if(!empty($user) && !empty($email) && !empty($pass)){
        if($user_exist = !(cek_user_exist($user, $email))){
            if(add_user($user, $email, $pass, $key)){
                if(sendKey($email, $user, $key)){
                    $message = 'Silahkan cek email anda untuk aktivasi';
                    $_SESSION['message'] = $message;
                    header('Location: '.$base_url.'login');
                }
            }else{
                $message = 'Any wrong while add user';
            }
        }elseif($user_exist = cek_user_exist($user, $email)){
            while($row = mysqli_fetch_assoc($user_exist)){
                $user_e = $row['user_login'];
                $email_e = $row['user_email'];
            }
            if($user == $user_e){
                $message = 'Username sudah terpakai';
            }elseif($email == $email_e){
                $message = 'Email ini sudah terdaftar';
            }
        }
    }else{
        $message = 'All Must Filled';
    }
}
require_once "views/header-login.php"; 
?>
<div class="header-login">
    <h1><a href="<?= $base_url ?>" title="Powered by x-lab" tabindex="-1">x-lab</a></h1>
    <p>Register to x-lab</p>
</div>
<div class="form-login">
    <div class="panel-login">
    <!-- validasi message -->
    <?php if($message) : ?>
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert"  aria-label="Close">
            <span aria-hidden="true">&times;</span>
      </button>
        <?=$message; ?>
    </div>
    <?php endif; ?>
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="" method="post">
                <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" autofocus>
                </div>
                <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                </div>
                <hr>
                <button type="submit" name="submit" class="btn btn-primary btn-login">Register</button>
                </form>
            </div>
        </div> 
        <div class="panel panel-default panel-trans">
            <div class="panel-body">
                <p><a href="<?= $base_url ?>login">Log in</a> . or . <a href="<?= $base_url ?>forgot">Lost your password?</a></p>
            </div>
        </div>
    </div>
</div>
<?php 
require_once "views/footer-login.php";
?>