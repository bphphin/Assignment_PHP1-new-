<?php
require_once("../classes/baseModel.php");
class Pets extends BaseModel
{
    var $table = "pets";

    //Methods tạo mới

    public function new($typeID, $petName, $petType, $petAge, $petWeight, $petImage)
    {
        $query = "INSERT INTO $this->table (typeID,petName,petType,petAge,petWeight,petImage) VALUES('$typeID','$petName','$petType','$petAge','$petWeight','$petImage')";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
    }

    //Methods update dữ liệu

    public function update($id, $typeID, $petName, $petType, $petAge, $petWeight, $petImage)
    {
        $query = "UPDATE $this->table SET typeID='$typeID',petName='$petName',petType='$petType',petAge='$petAge',petWeight='$petWeight',petImage='$petImage' WHERE id = '$id'";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
    }

    //Methods hiển thị dữ liệu
    public function getAll()
    {
        $query = "SELECT $this->table.id, $this->table.petName, $this->table.petType, $this->table.petAge, $this->table.petWeight,$this->table.petImage,types.typeName FROM pets LEFT JOIN types ON $this->table.typeID=types.id";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}