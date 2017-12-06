<?php 
$page_title = 'Forgot Password';
require_once "core/init.php";
require_once "views/header-login.php"; 

if(isset($_SESSION['username'])){
    header('Location: '.$base_url.'admin/index.php');
}
$message = '';
?>
<div class="header-login">
    <h1><a href="<?= $base_url ?>" title="Powered by x-lab" tabindex="-1">x-lab</a></h1>
    <p>Reset your password</p>
</div>
<div class="form-login">
    <!-- validasi message -->
    <?php if($message) : ?>
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert"  aria-label="Close">
            <span aria-hidden="true">&times;</span>
      </button>
        <?=$message; ?>
    </div>
    <?php endif; ?>
    <div class="panel-login">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="" method="post">
                <div class="form-group">
                <label>Enter your email address and we will send you a link to reset your password.</label>
                <input type="email" name="email" class="form-control" autofocus>
                </div>
                <hr>
                <button type="submit" name="submit" class="btn btn-primary btn-login">Send Password Reset</button>
                </form>
            </div>
        </div> 
        <div class="panel panel-default panel-trans">
            <div class="panel-body">
            <p><a href="<?= $base_url ?>">Back to x-lab</a></p>
            </div>
        </div>
    </div>
</div>
<?php 
require_once "views/footer-login.php";
?>