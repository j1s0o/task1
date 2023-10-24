<?php
    require_once("../Model/db.php");
    if (!isset($_SESSION)) {
        session_start();
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $comment = $_POST["comment"];
        $username = $_SESSION["username"];
        $sql = "INSERT INTO cmt (username, comment) VALUES ('$username', '$comment')";
        if ($db->query($sql) === TRUE) {
            $lastInsertedId = $db->insert_id;
            header("Location: /chat");
            echo "Comment thành công";
        } else {
            echo "Comment thất bại: " . $db->error;
        }
    }
?>