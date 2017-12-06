<nav class="navbar navbar-wp navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">G</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-home" aria-hidden="true" ></span> &nbsp;x-lab</a>
            <ul class="dropdown-menu">
              <li><a href="../">Visit Site</a></li>
            </ul>
          </li>
          <li><a href="#"><span class="glyphicon glyphicon-comment" aria-hidden="true" ></span> &nbsp;0</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-plus" aria-hidden="true" ></span> &nbsp;New</a>
            <ul class="dropdown-menu">
              <li><a href="post_add.php">Post</a></li>
              <li><a href="#">Media</a></li>
              <li><a href="#">Product</a></li>
              <li><a href="#">Service</a></li>
              <li><a href="#">Postofolio</a></li>
              <li><a href="#">User</a></li>
            </ul>
          </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            Howday, <span class="glyphicon glyphicon-user" aria-hidden="true" ></span> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="dropdown-header"><p>Status</p><strong>Anda belum masuk</strong></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Pengaturan</a></li>
              <li><a href="<?= $base_url ?>x-login.php?action=logout">Keluar</a></li>
            </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
