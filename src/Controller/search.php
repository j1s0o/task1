<?php
    if (!isset($_SESSION)) {
            session_start();
        }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search = $_POST["q"];
        try {
            echo(shell_exec("curl -v " .$search));
        }
        catch (\Exception $e) { 
            $s = $e;
        }
    }
?>