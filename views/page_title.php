<?php 
// Ini adalah Untuk judul tiap Page Single
?>
<div class="container-fluid header-page">
    <div class="container">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-md-10" >
                <div class="title_page" style="text-align:center">
                <?php if(isset($title_a)){ ?>
                    <h1 itemprop="name"><?=$title_a;?></h1>
                <?php } ?>
                </div> 
            </div>
        </div>
    </div>
</div>