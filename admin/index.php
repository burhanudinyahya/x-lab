<?php 
$page_title = 'Dashboard';
	require_once "core/init.php";
	require_once "views/header.php"; 
	require_once "views/navbar.php";
    require_once "views/sidebar.php"; 
  $visitors = urutkanVisitor();
  $populars = popularVisited();
?>

<div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
    <h2 class="page-header">Dashboard</h2>
      <!-- validasi message -->
      <?php if(isset($_SESSION['message'])) : ?>
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert"  aria-label="Close">
              <span aria-hidden="true">&times;</span>
        </button>
          <?=$_SESSION['message']; ?>
      </div>
      <?php endif; ?> 
      <p>Best Visitor</p>
      <?php while($rows = mysqli_fetch_assoc($visitors)): 

          echo $rows['asal_muasal'].'<br>';
          echo $rows['jumlah'].'<br>';
          endwhile;
      ?>
      <br>
      <p>Popular Post</p>
      <?php while($rows = mysqli_fetch_assoc($populars)): 

          echo $rows['tujuan'].'<br>';
          echo $rows['jumlah'].'<br>';
          $parseUrl = parse_url($rows['tujuan']);
          // print_r($parseUrl);
          endwhile;
      ?>
</div>

    </div>
</div>

<?php 
    unset($_SESSION['message']);
	require_once "views/footer.php";
?>