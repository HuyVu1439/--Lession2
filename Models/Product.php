<?php

require_once 'Models/Connect.php';
require 'Models/Product_Object.php';

class Product
{
    // private int $id;
    // private string $productName;
    // private int $idCategory;
    // private string $image;

    // //Tạo getter và setter
    // public function get_ID(){
    //     return $this->id;
    // }

    // public function set_ID($var){
    //     return $this->id = $var;
    // }

    // public function get_ProductName(){
    //     return $this->productName;
    // }

    // public function set_ProductName($var){
    //     return $this->productName = $var;
    // }

    // public function get_IDCategoty(){
    //     return $this->idCategory;
    // }

    // public function set_IDCategoty($var){
    //     return $this->idCategory = $var;
    // }

    // public function get_Image(){
    //     return $this->image;
    // }

    // public function set_Image($var){
    //     return $this->image = $var;
    // }

    //Lấy tất cả Product
    public function all()
    {
        
        $sql = "SELECT products.* FROM products 
        JOIN categories ON products.IDCategory = categories.ID";
        $result = (new Connect())->select($sql);

        $arr = [];
        foreach($result as $row){
            $object = new Product_Object($row['ID'], $row['ProductName'], $row['IDCategory'], $row['Image']);

            $arr[] = $object;
        }


        return $arr;
    }
    //Thêm mới 1 Product
    public function create($productName,$categoryID,$productImage): void{

        $prodImg = $productImage;
        

        //đổi tên file trước khi upload
        $filename = $prodImg['name'];
        $filename = explode('.',$filename);

        $ext = end($filename);

        $new_file = md5(uniqid()).'.'.$ext;

        move_uploaded_file($prodImg['tmp_name'],'Images/'.$new_file);

        $object = new Product_Object(0,$productName,$categoryID,$new_file);

        $sql = "insert into products (ProductName,IDCategory,Image) values('{$object->get_ProductName()}','{$object->get_IDCategoty()}','{$object->get_Image()}')";

        (new Connect())->execute($sql);
        header("Location: index.php?action=productIndex");
    }
    //Tìm ID Product muốn sửa
    public function find($editId)
    {
      

        $sql = "SELECT * FROM products WHERE ID = '$editId'";
        $result = (new Connect())->select($sql);

        $row = mysqli_fetch_array($result);

        
            $object = new Product_Object($editId, $row['ProductName'],$row['IDCategory'],$row['Image']);

        return $object;
    }
    //Sửa 1 Product
    public function update($productID,$productName,$categoryID,$productImage): void{

        $prodImg = $productImage;
        

        //đổi tên file trước khi upload
        $filename = $prodImg['name'];
        $filename = explode('.',$filename);

        $ext = end($filename);

        $new_file = md5(uniqid()).'.'.$ext;

        move_uploaded_file($prodImg['tmp_name'],'Images/'.$new_file);

        $object = new Product_Object($productID,$productName,$categoryID,$new_file);

        $sql = "update products set ProductName = '{$object->get_ProductName()}', IDCategory = '{$object->get_IDCategoty()}', Image = '{$object->get_Image()}' where ID = '$productID'";
        // die($sql);
        (new Connect())->execute($sql);
        header("Location: index.php?action=productIndex");
    }
    //Xoá 1 Product
    public function destroy($delID): void
    {

        $sql = "delete from products where ID = '$delID'";

        (new Connect())->execute($sql);
        header("Location: index.php?action=productIndex");
    }
}