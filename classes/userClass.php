<?php
require_once("../classes/baseModel.php");
class Users extends BaseModel
{
    var $table = "users";

    //Phương thức đăng nhập

    public function logIn($email, $password)
    {
        $query = "Select * from " . $this->table . " where email = '$email' and password = '$password' LIMIT 1";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }

    //Phương thức đăng ký
    public function signUp($username, $email, $password)
    {
        $query = "Insert into " . $this->table . " (username, email, password) values ('$username','$email','$password')";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
    }
}