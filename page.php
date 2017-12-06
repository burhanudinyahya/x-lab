<?php 
    require_once "core/init.php";
    if(isset($_GET['slug'])){
        if($post = view_post_slug($_GET['slug'])){
            require_once "content-single.php";
        }else{
            require_once "404.php";
        }
    }else{
        require_once "404.php";
    }
?>