<?php
    require_once("Model/db.php");
    require 'vendor/autoload.php'; // Import Twig
    $loader = new \Twig\Loader\FilesystemLoader('View');
    $twig = new \Twig\Environment($loader);

    if (!isset($_SESSION)) {
        session_start();
    }
    $sql = "SELECT * FROM cmt";
    $result = $db->query($sql);
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $messages[] = $row; // Thêm dữ liệu từ kết quả truy vấn vào mảng
        }
    }

    $template = $twig->load('chatpage.html');
    echo $template->render(['messages' => $messages]);
?>