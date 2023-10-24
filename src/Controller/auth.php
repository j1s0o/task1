<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION["username"]))
{
    header("Location: /");
}
class User{
    public $username;
    public $isAdmin;
    public $log;
    function  __construct($username, $isAdmin)
    {
        $this->username = $username;
        $this->isAdmin = $isAdmin;
        if ($this->log === null and $this->isAdmin === true)
        {
            $this->log = "U can do sth here";
        }
        else
        {
            $this->log = "U must be admin";
        }
    }
    function __wakeup(){
        if (isset($this->log) and $this->isAdmin === true){
            echo(shell_exec($this->log));
    }

}}

$user = new User($_SESSION["username"], $_SESSION["isAdmin"]);
$profile = base64_encode(serialize($user));
setcookie("profile" , $profile);
?>