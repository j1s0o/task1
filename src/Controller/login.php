<?php
    require_once("../Model/db.php");
    
    if (!isset($_SESSION)) {
        session_start();
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        if (preg_match('/prob| |\(\)/i', $username) || preg_match('/prob| |\(\)/i', $password)) {
            exit("What a u doing🤣");
        }
        else{
            $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $result = $db->query($sql);
        }
        if ($result->num_rows > 0) {
            http_response_code(302);
            $_SESSION["username"] = $username;
            if ($username === "admin"){
                $_SESSION["isAdmin"]= True;
            }
            else{
                $_SESSION["isAdmin"] = False;
            }

            header("Location: /");
            echo "Đăng nhập thành công!";
        } else {
            header("Location: /login");
            echo "Đăng nhập thất bại. Vui lòng kiểm tra lại tên đăng nhập và mật khẩu.";            
        }
    }

?>