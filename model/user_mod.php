<?php
include '../config/db.php';
class Users
{
    private $obj;

    function __construct()
    {
        $this->obj = new Database;
    }
    function select($loginUsername, $loginPassword)
    {
        $hashedPasswordResult = $this->obj->select("SELECT `password` FROM users WHERE `username` ='$loginUsername'");
        if(empty($hashedPasswordResult)){
            return false;
        }
        $hashedPassword = $hashedPasswordResult[0]['password'];
        $verifyPassword = password_verify($loginPassword, $hashedPassword);
        if ($verifyPassword) {
            $result = $this->obj->select("SELECT * FROM users WHERE username='$loginUsername'");
            return $result;
        } else {
            return false;
        }
    }
    function insert($name, $username, $password, $pfp)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $register = $this->obj->insert("INSERT INTO users (`name`, `username`, `password`, `pfp`) VALUES ('$name', '$username', '$hashedPassword', '$pfp')");
        return $register;
    }
    function update($updateName, $updateUsername, $updatePfp, $id)
    {
        $update = $this->obj->insert("UPDATE users SET `name` = '$updateName', `username` = '$updateUsername', `pfp` = '$updatePfp' WHERE `id` = '$id'");
        return $update;
    }
}

?>