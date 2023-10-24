<?php
    require_once("../Model/db.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($db->query($sql) === TRUE) {
            $lastInsertedId = $db->insert_id;
            header("Location: /login",302);
            echo "Đăng ký tài khoản thành công!";
        } else {
            echo "Đăng ký tài khoản thất bại: " . $db->error;
        }
    }

?>