<?php

class BaseModel
{
    public function __construct()
    {
        $this->connect = new PDO("mysql:host=localhost;dbname=php1;charset=utf8", "root", "");
    }

    //Phương thức hiện thị dữ liệu

    public function all()
    {

        $query = "SELECT * FROM $this->table";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    //Phương thức xóa dữ liệu

    public function delete($id)
    {
        $query = "DELETE FROM $this->table WHERE id = '$id'";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
    }


    //Phương thức lấy id để thực hiện cho câu lệnh update và delete
    public function getId($id)
    {
        $query = "SELECT * FROM $this->table WHERE id = '$id'";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }
}
var_dump(new BaseModel());