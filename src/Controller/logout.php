<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_SESSION['username'])){
        // xoa cac bien trong session
        session_unset();
        // huy session
        if (isset($_COOKIE['profile'])){
            setcookie("profile", "", time()-3600);
        }
        session_destroy();
        header('Location: /');
        exit();
    }
    else{
        header('Location: /login');
        exit();
    }
?>