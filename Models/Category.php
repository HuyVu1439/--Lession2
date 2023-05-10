<?php

require_once 'Models/Connect.php';

class Category
{
    private int $ID;
    private string $CategoryName;


    public function get_ID(){
        return $this->ID;
    }

    public function get_CategoryName(){
        return $this->CategoryName;
    }

    public function set_ID($var){
        return $this->ID = $var;
    }

    public function set_CategoryName($var){
        return $this->CategoryName = $var;
    }
    //Lấy tất cả Category
    public function all()
    {
        
        $sql = "SELECT * FROM categories";
        $result = (new Connect())->select($sql);

        $arr = [];
        foreach($result as $row){
            $object = new self();
            $object->set_ID($row['ID']);
            $object->set_CategoryName($row['CategoryName']);

            $arr[] = $object;
        }


        return $arr;
    }
    //Thêm mới 1 Category
    public function create($categoryName): void{
        $object = new self();
        $object->set_CategoryName($categoryName);

        $sql = "insert into categories (CategoryName) values('{$object->CategoryName}')";

        (new Connect())->execute($sql);
        header("Location: index.php");
    
    }
    //Tìm ID Category muốn sửa
    public function find($editId)
    {
      

        $sql = "SELECT * FROM categories WHERE ID = '$editId'";
        $result = (new Connect())->select($sql);

        $row = mysqli_fetch_array($result);

        
            $object = new self();
            $object->set_ID($row['ID']);
            $object->set_CategoryName($row['CategoryName']);

        return $object;
    }
    //Sửa 1 Category
    public function update($categoryID,$categoryName): void{
        $object = new self();
        $object->set_ID($categoryID);
        $object->set_CategoryName($categoryName);

        $sql = "update categories set CategoryName = '$object->CategoryName' where ID = '$object->ID'";

        (new Connect())->execute($sql);
        header("Location: index.php");
    }
    //Xoá 1 Category
    public function destroy($categoryID): void
    {

        $sql = "delete from categories where ID = '$categoryID'";

        (new Connect())->execute($sql);
        header("Location: index.php");
    }

}