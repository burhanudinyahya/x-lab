<?php 
require_once "core/init.php";

if(isset($_POST['submit'])){

    $id_a       = $_SESSION['id'];
    $canonical  = $_SESSION['url_con'];
    $isi_komen  = trim($_POST['isi_komen']);
    $nama       = trim($_POST['nama']);
    $email      = trim($_POST['email']);
    $web_url    = trim($_POST['web_url']);

    if(!empty($isi_komen) && !empty($nama) && !empty($email)){
        if(add_comment($id_a, $nama, $email, $web_url, $isi_komen)){
            $message = 'Komentar telah terkirim';
            $_SESSION['message'] = $message;
            header('Location: '.$canonical);
            unset($_SESSION['id']);
            unset($_SESSION['url_con']);
            exit;
        }else{
            $message = 'Any wrong while send a comment';
            $_SESSION['message'] = $message;
        }
    }else{
        $message = 'Nama, Email dan Komentar harus disi!';
        $_SESSION['message'] = $message;
    }
}

?>