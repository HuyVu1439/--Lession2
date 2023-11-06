<?php

require_once 'Models/Connect.php';
class Product_Object
{
    private int $id;
    private string $productName;
    private int $idCategory;
    private string $image;

    //Hàm khởi tạo
    public function __construct($id, $productName, $idCategory, $image)
    {
        $this->id = $id;
        $this->productName = $productName;
        $this->idCategory = $idCategory;
        $this->image = $image;
    }

    //Tạo getter và setter
    public function get_ID(){
        return $this->id;
    }

    public function set_ID($var){
        return $this->id = $var;
    }

    public function get_ProductName(){
        return $this->productName;
    }

    public function set_ProductName($var){
        return $this->productName = $var;
    }

    public function get_IDCategoty(){
        return $this->idCategory;
    }

    public function set_IDCategoty($var){
        return $this->idCategory = $var;
    }

    public function get_Image(){
        return $this->image;
    }

    public function set_Image($var){
        return $this->image = $var;
    }
}