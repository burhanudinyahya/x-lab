<?php 
$page_title = 'Login';
require_once "core/init.php";  
// print_r($_GET['key']);
if(isset($_GET['key'])){
    if($adaUser = cekToActivate($_GET['key'])){
        // print_r($adaUser);
        while($row = mysqli_fetch_assoc($adaUser)){
            $userToAct = $row['user_login'];
        }
        // print_r($userToAct);
        if(updateStatus($_GET['key'])){
            $message = 'Your account has been activated, Wellcome';
            $_SESSION['username'] = $user;
            $_SESSION['message'] = $message;
            header('Location: '.$base_url.'admin'); 
        }
    }
}

if(isset($_GET['action'])){
    if($_GET['action'] === 'logout'){
        if(isset($_SESSION['username'])){
            session_destroy();
            header('Location: '.$base_url.'login');
        }else{
            header('Location: '.$base_url.'login');
        }
    }
}

if(isset($_SESSION['username'])){
    header('Location: '.$base_url.'admin');
}
$message = '';
if(isset($_POST['submit'])){
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);
    if(!empty($user) && !empty($pass)){
        if($userStatus = cek_user($user, $pass)){
            while($row = mysqli_fetch_assoc($userStatus)){
                $stts = $row['user_status'];
            }
            if($stts == 1){
                $message = 'Wellcome, You login here';
                $_SESSION['username'] = $user;
                $_SESSION['message'] = $message;
                header('Location: '.$base_url.'admin'); 
            }else{
                $message = 'Your account have not active, please cek your email to activate';
                $_SESSION['message'] = $message;
            }
        }else{
            $message = 'Any wrong while Login';
            $_SESSION['message'] = $message;
        }
    }else{
        $message = 'User and Password Must Filled';
        $_SESSION['message'] = $message;
    }
}
require_once "views/header-login.php"; 
?>

<div class="header-login">
    <h1><a href="<?= $base_url ?>" title="Powered by x-lab" tabindex="-1">x-lab</a></h1>
    <p>Login to x-lab</p>
</div>
<div class="form-login">
    <div class="panel-login">
      <!-- validasi message -->
      <?php if(isset($_SESSION['message'])) : ?>
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert"  aria-label="Close">
              <span aria-hidden="true">&times;</span>
        </button>
          <?=$_SESSION['message']; ?>
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
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                </div>
                <hr>
                <button type="submit" name="submit" class="btn btn-primary btn-login">Log in</button>
                </form>
            </div>
        </div> 
        <div class="panel panel-default panel-trans">
            <div class="panel-body">
            <p><a href="<?= $base_url ?>register">Register</a> . or . <a href="<?= $base_url ?>forgot">Lost your password?</a></p>
            </div>
        </div>
    </div>
</div>
<?php 
	require_once "views/footer-login.php";
?>