<?php
require_once("../classes/baseModel.php");
class Types extends BaseModel
{
    var $table = "types";
    //Phương thức thêm mới
    public function new($typeName)
    {
        $query = "INSERT INTO $this->table(typeName) VALUES ('$typeName')";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
    }
    //Phương thức update

    public function update($id, $typeName, $type)
    {
        $query = "UPDATE $this->table SET typeName = '$typeName',type = '$type' WHERE id = '$id'";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
    }
}