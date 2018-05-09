<?php 
    require_once "core/init.php";

    $request_uri    = explode('/', $_SERVER['REQUEST_URI']);
    $slug_id        = $request_uri[2];
    $exp_slug_id    = explode('-', $slug_id);
    $id             = $exp_slug_id[count($exp_slug_id) - 1];
    $slug           = str_replace('-'.$id,'',$slug_id);
    
    if(isset( $request_uri[2] )){
        if($post = view_post_slug($id, $slug)){
            require_once "content-single.php";
        }else{
            require_once "404.php";
        }
    }else{
        require_once "404.php";
    }
?>