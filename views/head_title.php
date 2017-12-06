<?php 
    // Blog dan Post title
    // Mempunyai form search khusus untuk blog
 ?>
<div class="container-fluid header-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-sm-offset-1 col-md-7 col-md-offset-1">  
                <div class="title_page">
                <?php if(isset($title_a)){ ?>
                    <h1 itemprop="name"><?=$title_a;?></h1>
                <?php } ?>
                </div> 
            </div>
            <div class="col-sm-3 col-md-3">
                <div class="search-form">
                    <?php if(isset($title_a) && $title_a == 'Blog'){ ?>
                    <form action="<?= $base_url ?>blog" method="get" accept-charset="UTF-8">
                    <?php }else if(isset($title_a) && $title_a == 'Portofolio'){ ?>
                    <form action="<?= $base_url ?>portofolio" method="get" accept-charset="UTF-8">
                    <?php } ?>
                    <div class="input-group">
                      <input type="text" name="search" class="form-control">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                      </span>
                    </div>
                  </form>
                </div> 
            </div>
        </div>
    </div>
</div>