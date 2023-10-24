<?php
require 'vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// Create a Twig environment
$loader = new FilesystemLoader('View');
$twig = new Environment($loader);

$request = $_SERVER['REQUEST_URI'];
if (!isset($_SESSION)) {
    session_start();
}
if(isset($_SESSION['username']) and !isset($_COOKIE['profile']) and $_SERVER["REQUEST_METHOD"] !== "POST"){
    require 'Controller/auth.php';
}

switch ($request) {
    case '/':
        $template = $twig->load('home.html');
        echo $template->render();
        break;
    case '/register':
        if (!isset($_SESSION['username']))
        {
            $template = $twig->load('register.html');
            echo $template->render();
            
        }
        else
        {
            echo "Bạn đã login rồi mà";
        
        }break; 
    case '/login':
        if (!isset($_SESSION['username']))
        {
            $template = $twig->load('login.html');
            echo $template->render();       
        }
        else
        {
            echo "Bạn đã login rồi mà";
        }break;
    case '/logout':
        require 'Controller/logout.php';
        break;
    case '/admin':
        require ("Controller/admin.php");
        break;
    case '/search':
        if (!isset($_SESSION['username']))
        {
            $template = $twig->load('login.html');
            echo $template->render();       
        }
        else
        {
            $template = $twig->load('search.html');
            echo $template->render();    
        }break;
    case '/chat':
        if (!isset($_SESSION['username']))
        {
            $template = $twig->load('login.html');
            echo $template->render();       
        }
        else
        {
            require ("Controller/chatpage.php");   
        }
        break;
    default:
        // Handle default request or display 404 error
        header("HTTP/1.0 404 Not Found");
        echo 'Page not found';
        break;
}
