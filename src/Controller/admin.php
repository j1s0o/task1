<?php
require("auth.php");
if (isset($_COOKIE["profile"])) {
    $data = unserialize(base64_decode($_COOKIE["profile"]));
    if ($data->username === "admin" and $data->isAdmin === true) {
        require 'vendor/autoload.php'; // Import Twig
        $loader = new \Twig\Loader\FilesystemLoader('View');
        $twig = new \Twig\Environment($loader);
    
        require_once("Model/db.php");
        $sql = "Select * from users";
        $result = $db->query($sql);
    
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $userData[] = $row; // Thêm dữ liệu từ kết quả truy vấn vào mảng
            }
        }
    
        $template = $twig->load('admin.html');
        echo $template->render(['userData' => $userData]);
    }
    else{
        echo($data->log);
    }
}

?>